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
    public function alleModuleTest()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/restricted/dozent/eigeneModule');

        $this->assertGreaterThanOrEqual(
            0, $crawler->$beauftragteModule->count()
        );

        $this->assertGreaterThanOrEqual(
            1, $crawler->$mLehrende->count()
        );

        $this->assertGreaterThanOrEqual(
          1, $crawler->$stgZuModul->count()
        );

        $this->assertLessThanOrEqual(
          4, $crawler->$stgZuModul->count()
        );
    }

}