<?php
/**
 * Created by PhpStorm.
 * User: Mischa
 * Date: 26.04.2015
 * Time: 14:37
 */

namespace FHBingen\Bundle\MHBBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DozentControllerTest extends WebTestCase
{
    public function whatTheFuckTest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/restricted/dozent/eigeneModule');

        $form = $crawler->selectButton('speichern')->form();
    }
}