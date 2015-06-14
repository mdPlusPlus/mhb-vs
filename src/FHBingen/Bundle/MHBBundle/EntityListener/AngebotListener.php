<?php
/**
 * Created by PhpStorm.
 * User: mdPlusPlus
 * Date: 12.04.2015
 * Time: 20:01
 */

namespace FHBingen\Bundle\MHBBundle\EntityListener;

use Doctrine\ORM\EntityManager;
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
     * Default-Kürzel für Pflichtfächer ohne Fachgebiet (sollte es nach aktueller Implementation nie geben)
     */
    const KUERZEL_P_OHNE_FG = 'PF';

    /**
     * Default-Kürzel für Wahlpflichtfächer ohne Fachgebiet
     */
    const KUERZEL_WP_OHNE_FG = 'WP';

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

        $em = $args->getObjectManager();
        $modulcodezuweisung = $em->getRepository('FHBingenMHBBundle:Modulcodezuweisung')->findOneBy(array(
            'studiengang'   => $angebot->getStudiengang(),
            'fachgebiet'    => $angebot->getFachgebiet(),
            'veranstaltung' => $angebot->getVeranstaltung(),
        ));

        if (is_null($modulcodezuweisung)) {
            $neu = new Modulcodezuweisung();
            $neu->setStudiengang($angebot->getStudiengang());
            $neu->setFachgebiet($angebot->getFachgebiet());
            $neu->setVeranstaltung($angebot->getVeranstaltung());

            //TODO
        }
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

    //////

    /**
     * Gibt den für ein Angebot zu vergebenden Code zurück. Existiert bereits ein Code, wird dieser zurückgegeben.
     *
     */
    private function returnCodeForAngebot(EntityManager $em, Angebot $angebot)
    {
        //TODO: prüfen!
        /*
         * 2. nein -> existiert bereits ein Code für das Fachgebiet des Angebots? | ja -> gib Code zurück
         * 3. ja -> hole höchsten Code + 1 | nein -> erstelle Code mit 01
         * 4. gib Code zurück
         */

        $isWahlpflichtfach = false;
        if ($angebot->getAngebotsart() == 'Wahlpflichtfach') {
            $isWahlpflichtfach = true;
        }

        $hasFachgebiet = false;
        if (!is_null($angebot->getFachgebiet())) {
            $hasFachgebiet = true;
        }

        $codeToLookFor = $angebot->getStudiengang()->getKuerzel(); //z.B. 'B-IN'
        if ($hasFachgebiet) {
            if (!$isWahlpflichtfach) {
                $codeToLookFor = $codeToLookFor . '-' . $angebot->getFachgebiet()->getKuerzelP();
            } else {
                $codeToLookFor = $codeToLookFor . '-' . $angebot->getFachgebiet()->getKuerzelWP();
            }
        } else {
            if (!$isWahlpflichtfach) {
                $codeToLookFor = $codeToLookFor . '-' . $this::KUERZEL_P_OHNE_FG;
            } else {
                $codeToLookFor = $codeToLookFor . '-' . $this::KUERZEL_WP_OHNE_FG;
            }
        }

        $pattern = "'" . $codeToLookFor . "%'"; // z.B.: 'B-IN-WP%'

        $qb = $em->createQueryBuilder();

        $bisherigeCodes = $qb
            ->select('mcz.Code')
            ->from('FHBingenMHBBundle:Modulcodezuweisung', 'mcz')
            ->where($qb->expr()->like('mcz.Code', $pattern))
            ->orderBy('mcz.Code', 'DESC')
            ->getQuery()
            ->getResult();

        if (!empty($bisherigeCodes)) {
            $highestCode = $bisherigeCodes[0]['Code'];

            $oldSuffix = substr($highestCode, -2); //z.B. '09'
            $oldInt = intval($oldSuffix); //z.B. 9
            $newSuffix = '';
            $newInt = $oldInt + 1;
            if ($newInt >= 10 && $newInt <= 99) {
                //zweistellig
                $newSuffix = strval($newInt);
            } elseif ($newInt > 0 && $newInt < 10) {
                //1-9
                $newSuffix = '0' . strval($newInt); //0 vorne anhängen '9' -> '09'
            } else {
                //TODO: ERROR (sollte nicht vorkommen)
            }

            $newCode = str_replace($oldSuffix, $newSuffix, $highestCode);

            return $newCode;
        } else {
            //noch kein Code für diese Kombination aus Fachgebiet und Angebotsart vorhanden
            if ($hasFachgebiet) {
                if (!$isWahlpflichtfach) {
                    return $angebot->getStudiengang() . '-' . $angebot->getFachgebiet()->getKuerzelP() . '-01';
                } else {
                    return $angebot->getStudiengang() . '-' . $angebot->getFachgebiet()->getKuerzelWP() . '-01';
                }
            } else {
                if (!$isWahlpflichtfach) {
                    return $angebot->getStudiengang() . '-' . $this::KUERZEL_P_OHNE_FG . '-01';
                } else {
                    return $angebot->getStudiengang() . '-' . $this::KUERZEL_WP_OHNE_FG . '-01';
                }
            }
        }
    }
}