<?php

namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'api/categorie?token=e966223a1cfa25e8955d4c2331386818c09a8f859cddd7e0cc93e7d1dfe91b8a');		
		$this->assertEquals(200,$client->getResponse()->getStatusCode());
	}
}
