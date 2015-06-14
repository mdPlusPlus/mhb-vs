<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 12.04.2015
 * Time: 20:01
 */

namespace FHBingen\Bundle\MHBBundle\EntityListener;

use Doctrine\ORM\Event\LifecycleEventArgs;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use Doctrine\ORM\Event\PreFlushEventArgs;
use FHBingen\Bundle\MHBBundle\Entity\Angebot;
use FHBingen\Bundle\MHBBundle\Entity\Modulcodezuweisung;

/**
 * Class AngebotListener
 *
 * @package FHBingen\Bundle\MHBBundle\EntityListener
 */
class AngebotListener
{
    /**
     * @param Angebot            $angebot
     * @param LifecycleEventArgs $args
     */
    public function prePersist(Angebot $angebot, LifecycleEventArgs $args)
    {
        //file_put_contents('angebot.log', 'prePersist' . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param Angebot            $angebot
     * @param LifecycleEventArgs $args
     */
    public function postPersist(Angebot $angebot, LifecycleEventArgs $args)
    {
        //file_put_contents('angebot.log', 'postPersist' . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param Angebot            $angebot
     * @param PreUpdateEventArgs $args
     */
    public function preUpdate(Angebot $angebot, PreUpdateEventArgs $args)
    {
        //file_put_contents('angebot.log', 'preUpdate' . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param Angebot            $angebot
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(Angebot $angebot, LifecycleEventArgs $args)
    {
        //file_put_contents('angebot.log', 'postUpdate' . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param Angebot            $angebot
     * @param LifecycleEventArgs $args
     */
    public function postRemove(Angebot $angebot, LifecycleEventArgs $args)
    {
        //file_put_contents('angebot.log', 'postRemove' . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param Angebot            $angebot
     * @param LifecycleEventArgs $args
     */
    public function preRemove(Angebot $angebot, LifecycleEventArgs $args)
    {
        //$entity = $args->getObject();
        $em = $args->getObjectManager();

        $isLastAngebot = false;
        if ($angebot->getVeranstaltung()->getAngebot()->count() == 1) {
            $isLastAngebot = true;
        }

        //logging
        /*
        if ($isLastAngebot) {
            $logString = 'Veranstaltung: "' . $angebot->getVeranstaltung() . '", Studiengang: "' . $angebot->getStudiengang() . '", isLastAngebot: true';
        } else {
            $logString = 'Veranstaltung: "' . $angebot->getVeranstaltung() . '", Studiengang: "' . $angebot->getStudiengang() . '", isLastAngebot: false';
        }
        file_put_contents('angebot.log', $logString . PHP_EOL, FILE_APPEND);
        */
        //

        //Kernfach-Entities
        $vertiefungsrichtungen = $angebot->getStudiengang()->getRichtung();
        $kernfaecherOfVeranstaltung = $em->getRepository('FHBingenMHBBundle:Kernfach')->findBy(array('veranstaltung' => $angebot->getVeranstaltung()->getModulID()));
        foreach ($kernfaecherOfVeranstaltung as $kernfach) {
            foreach ($vertiefungsrichtungen as $vertiefungsrichtung) {
                if ($kernfach->getVertiefung() == $vertiefungsrichtung) {
                    $em->remove($kernfach);
                }
            }
        }

        if ($isLastAngebot) {
            //Lehrende-Entities - Warum löschen wir die eigentlich?
            $lehrende = $angebot->getVeranstaltung()->getLehrende();
            foreach ($lehrende as $lehrender) {
                $em->remove($lehrender);
            }

            //Veranstaltung-Entity
            $angebot->getVeranstaltung()->setStatus('expired');
            $angebot->getVeranstaltung()->setErstellungsdatum(new \DateTime());
        }

        //Angebot-Entity
        //$em->remove($angebot);

        $em->flush();
    }

    /**
     * @param Angebot           $angebot
     * @param PreFlushEventArgs $args
     */
    public function preFlush(Angebot $angebot, PreFlushEventArgs $args)
    {
        //file_put_contents('angebot.log', 'preFlush' . PHP_EOL, FILE_APPEND);
    }

    /**
     * @param Angebot            $angebot
     * @param LifecycleEventArgs $args
     */
    public function postLoad(Angebot $angebot, LifecycleEventArgs $args)
    {
        //file_put_contents('angebot.log', 'postFlush' . PHP_EOL, FILE_APPEND);
    }
}