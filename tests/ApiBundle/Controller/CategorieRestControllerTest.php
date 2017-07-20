<?php
namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Récupération des catégories et leurs produits
 * @author Thomas
 *
 */
class CategorieRestControllerTest extends WebTestCase
{
	private  $token  = "035bfa664103eb9f9deac17d44a51218a434b4ab5b5cfcbb38a7e60424458206";
	/**
	 * Token valide
	 */
	public function testWithValidToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/categorie?token='.$this->token);
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
		$crawler = $client->request('GET', 'api/categorie?token=token');
		$this->assertEquals(403,$client->getResponse()->getStatusCode());
	}
	/**
	 * Token null
	 */
	public function testWithNullToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/categorie?token=null');
		$this->assertEquals(403,$client->getResponse()->getStatusCode());
	}
	/**
	 * Token sans valeur
	 */
	public function testWithTokenWithoutValue()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/categorie?token=');
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
	}
	/**
	 * Sans token
	 */
	public function testWithoutToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/categorie');
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
	}
	
	/**
	 * @depends testWithValidToken
	 */
	public function testJsonResponse($content)
	{
		$contentDecoded = json_decode($content, true);
		$category = $contentDecoded[0];
		
		$this->assertArrayHasKey('id',$category);
		$this->assertArrayHasKey('nom', $category);
		$this->assertArrayHasKey('lien_image', $category);
		$this->assertArrayHasKey('produits', $category);
	}
}
