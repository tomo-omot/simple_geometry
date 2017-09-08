<?php

namespace HcsOmot\Geometry\ShapesBundle\Tests\Controller;

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
        $this->assertContains($content, $client->getResponse()->getContent());
    }
}
