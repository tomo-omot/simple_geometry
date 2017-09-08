<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $content = 'Hello World!

<br>
Join us as we explore triangles and circles!
';

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains($content, $client->getResponse()->getContent());
    }
}
