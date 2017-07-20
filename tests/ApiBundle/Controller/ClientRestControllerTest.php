<?php
namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Récupération et envoie des clients.
 * @author Thomas
 *
 */
class ClientRestControllerTest extends WebTestCase
{
	private  $token  = "035bfa664103eb9f9deac17d44a51218a434b4ab5b5cfcbb38a7e60424458206";
	private $login = "toto";
	private $password = "tata";


	/**
	 * Test with valid toke
	 * @return string
	 */
	public function testWithValidToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/clients?token='.$this->token);
		$this->assertEquals(200,$client->getResponse()->getStatusCode());
		$this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));
		return $client->getResponse()->getContent();
	}
	
	/**
	 * Token invalid
	 */
	public function testWithWrongToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/clients?token=token');
		$this->assertEquals(403,$client->getResponse()->getStatusCode());
	}
	/**
	 * Token null
	 */
	public function testWithNullToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/clients?token=null');
		$this->assertEquals(403,$client->getResponse()->getStatusCode());
	}
	/**
	 * Token sans valeur
	 */
	public function testWithTokenWithoutValue()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/clients?token=');
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
	}
	/**
	 * Sans token
	 */
	public function testWithoutToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/clients');
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
	}
	
	/**
	 * @depends testWithValidToken
	 */
	public function testJsonResponse($content)
	{
		$contentDecoded = json_decode($content, true);
		$client = $contentDecoded[0];
	
		$this->assertArrayHasKey('id',$client);
		$this->assertArrayHasKey('intitule', $client);
		$this->assertArrayHasKey('adresse', $client);
		$this->assertArrayHasKey('ville', $client);
		$this->assertArrayHasKey('tel', $client);
		$this->assertArrayHasKey('mail', $client);
		$this->assertArrayHasKey('estimations', $client);
	}
}
