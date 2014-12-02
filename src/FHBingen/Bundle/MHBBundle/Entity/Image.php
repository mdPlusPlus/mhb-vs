<?php
/**
 * Created by PhpStorm.
 * User: christian
 * Date: 21.06.14
 * Time: 10:55
 */
namespace FHBingen\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Context\ExecutionContext;
/**
 * Class Image
 * @package FHBingen\Bundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="image")
 * @ORM\HasLifecycleCallbacks
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(
     * message="Bitte eine Bildbeschreibung angeben")
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @Assert\Image(
     *     maxSize = "2M",
     *     maxSizeMessage = "Dateigröße überschritten. Bitte 2Mb maximal"
     *     )
     */
    private $file;

    /**
     * @ORM\ManyToOne(targetEntity="Projekt", inversedBy="images")
     * @ORM\JoinColumn(name="projekt_id", referencedColumnName="ID_projekt")
     */
    private $projekt;

    private $temp;

    public function __construct()
    {
        $this->setSalt(hash('sha512', $this->getWebPath()));
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
        // check if we have an old image path
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getFile()) {
            $this->path = $this->getFile()->guessExtension();
        }
    }

    /**
     * @param ExecutionContext $context
     *
     * @Assert\Callback
     */
    public function isFileUploaded(ExecutionContext $context)
    {
        if (null === $this->path and null === $this->temp) {
            $context->addViolationAt('file', 'Keine Datei gewählt.');
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getFile()) {
            return;
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->id . '.' . $this->getFile()->guessExtension()
        );

        $this->setFile(null);
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir() . '/' . $this->id . '.' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir() . '/' . $this->id . '.' . $this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/projectImages';
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp) && file_exists($this->temp) &&
            is_writable($this->temp)
        ) {

            unlink($this->temp);
        }
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Image
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Image
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set projekt
     *
     * @param \FHBingen\Bundle\Entity\Projekt $projekt
     * @return Image
     */
    public function setProjekt(\FHBingen\Bundle\Entity\Projekt $projekt = null)
    {
        $this->projekt = $projekt;

        return $this;
    }

    /**
     * Get projekt
     *
     * @return \FHBingen\Bundle\Entity\Projekt
     */
    public function getProjekt()
    {
        return $this->projekt;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Image
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }
}
