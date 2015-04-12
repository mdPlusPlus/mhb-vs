<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 12.04.2015
 * Time: 20:01
 */

namespace FHBingen\Bundle\MHBBundle\EntityListener;

use Doctrine\ORM\Event\LifecycleEventArgs;

//use Doctrine\ORM\Event\PreUpdateEventArgs;
//use Doctrine\ORM\Event\PreFlushEventArgs;
use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Entity\Veranstaltung;

class AngebotListener
{
//    public function prePersist(Angebot $angebot, LifecycleEventArgs $args)
//    {
//    }

//    public function postPersist(Angebot $angebot, LifecycleEventArgs $args)
//    {
//    }

//    public function preUpdate(Angebot $angebot, PreUpdateEventArgs $args)
//    {
//    }

//    public function postUpdate(Angebot $angebot, LifecycleEventArgs $args)
//    {
//    }

//    public function postRemove(Angebot $angebot, LifecycleEventArgs $args)
//    {
//    }

    public function preRemove(Angebot $angebot, LifecycleEventArgs $args)
    {
//        $em = $args->getEntityManager();
//        foreach ($angebot->getVeranstaltung() as $veranstaltung) {
//            $veranstaltung = new Veranstaltung();
//
//            //wenn nur noch ein Angebot existiert und dieses gelöscht wird -> Veranstaltung expiren
//            if ($veranstaltung->getAngebot()->count() == 1) {
//                $veranstaltung->setStatus('expired');
//                $veranstaltung->setErstellungsdatum(new \DateTime());
//            }
//
//            $em->persist($veranstaltung);
//        }
//        $em->flush();
        //TODO: preRemove
    }

//    public function preFlush(Angebot $angebot, PreFlushEventArgs $args)
//    {
//    }

//    public function postLoad(Angebot $angebot, LifecycleEventArgs $args)
//    {
//    }
}