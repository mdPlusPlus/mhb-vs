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

/**
 * Class Resources
 * @package FHBingen\Bundle\Entity
 * @ORM\Entity
 * @ORM\Table(name="resources")
 * @ORM\HasLifecycleCallbacks
 */
class Resources
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
     * message="Bitte eine Dateibeschreibung angeben")
     */
    private $titel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $path;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $size;

    /**
     * @Assert\NotBlank(
     * message="Bitte eine Datei auswählen"
     * )
     * @Assert\File(
     *     maxSize = "7M",
     *     maxSizeMessage = "Dateigröße überschritten. Bitte 7Mb maximal",
     *     mimeTypes = {"application/zip"},
     *     mimeTypesMessage = "Bitte nur ZIP Archive."
     * )
     */
    private $file;

    /**
     * @ORM\OneToOne(targetEntity="Projekt", inversedBy="resources")
     * @ORM\JoinColumn(name="projekt_id", referencedColumnName="ID_projekt")
     */
    private $projekt;

    private $temp;

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
            $this->setSize($this->getFile()->getClientSize());
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
            'Projektdateien.' . $this->getFile()->guessExtension()
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
            : $this->getUploadRootDir() . '/' . 'Projektdateien' . '.' . $this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir() . '/' . 'Projektdateien' . '.' . $this->path;
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
        return 'uploads/projectResources/' . $this->projekt->getIDProjekt() . '/';
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
     * Set titel
     *
     * @param string $titel
     * @return Resources
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;

        return $this;
    }

    /**
     * Get titel
     *
     * @return string
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return Resources
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return round(($this->size) / 1048576, 2) . ' MB';
    }
}
