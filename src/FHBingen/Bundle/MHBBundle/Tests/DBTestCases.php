<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 12.05.2015
 * Time: 15:53
 */

namespace FHBingen\Bundle\MHBBundle\Tests\Controller;
use PHPUnit_Extensions_Database_TestCase;
use PDO;
use DomAssertions;

class DBTestCase extends PHPUnit_Extensions_Database_TestCase
{

    final public function getConnection()
    {
        $connection = new PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);

        return $this->createDefaultDBConnection($connection, $GLOBALS['DB_DBNAME']);
    }

    public function getSetUpOperation()
    {
//        return new \PHPUnit_Extensions_Database_Operation_Composite(
//            array(
//                new TruncateOperation(true),
//                \PHPUnit_Extensions_Database_Operation_Factory::INSERT()
//            )
//        );
    }

    public function getDataSet()
    {
        return $this->createFlatXMLDataSet(dirname(__FILE__).'/mhb.xml');
    }

}