<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 07.12.2014
 * Time: 15:08
 */

namespace FHBingen\Bundle\MHBBundle\PHP;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * Class UserRepository
 *
 * wird verwendet um den Login via Email-Adresse zu ermöglichen
 *
 * @package FHBingen\Bundle\MHBBundle\PHP
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{
    /**
     * @param string $username
     *
     * @return UserInterface
     * @throws \Doctrine\ORM\NonUniqueResultException
     *
     * @inheritDoc UserProviderInterface
     */
    public function loadUserByUsername($username)
    {
        $q = $this
            ->createQueryBuilder('u')
            //->where('u.username = :username OR u.Email = :email')
            ->where('u.email = :email')
            //->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery();

        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active FHBingenMHBBundle:Dozent object identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    /**
     * @param UserInterface $user
     *
     * @return null|UserInterface
     *
     * @inheritDoc UserProviderInterface
     */
    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }


        //getID() in Dozent.php behalten
        //return $this->find($user->getId());
        return $this->find($user->getDozentenID());
    }

    /**
     * @param string $class
     *
     * @return bool
     *
     * @inheritDoc UserProviderInterface
     */
    public function supportsClass($class)
    {
        return $this->getEntityName() === $class || is_subclass_of($class, $this->getEntityName());
    }
}