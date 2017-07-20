<?php
namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Récupération des chantiers.
 * @author Thomas
 *
 */
class ChantierRestControllerTest extends WebTestCase
{
	private  $token  = "035bfa664103eb9f9deac17d44a51218a434b4ab5b5cfcbb38a7e60424458206";
	/**
	 * Token valide
	 */
	public function testWithValidToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/chantier?token='.$this->token);
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
		$crawler = $client->request('GET', 'api/chantier?token=token');
		$this->assertEquals(403,$client->getResponse()->getStatusCode());
	}
	/**
	 * Token null
	 */
	public function testWithNullToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/chantier?token=null');
		$this->assertEquals(403,$client->getResponse()->getStatusCode());
	}
	/**
	 * Token sans valeur
	 */
	public function testWithTokenWithoutValue()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/chantier?token=');
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
	}
	/**
	 * Sans token
	 */
	public function testWithoutToken()
	{
		$client = static::createClient();
		$crawler = $client->request('GET', 'api/chantier');
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
	}

	/**
	 * @depends testWithValidToken
	 */
	public function testJsonResponse($content)
	{
		$contentDecoded = json_decode($content, true);
		$chantier = $contentDecoded[0];

		$this->assertArrayHasKey('id',$chantier);
		$this->assertArrayHasKey('nom', $chantier);
		$this->assertArrayHasKey('lien_image', $chantier);
		$this->assertArrayHasKey('secteur', $chantier);
		$this->assertArrayHasKey('surface', $chantier);
		$this->assertArrayHasKey('type_chantier', $chantier);
		$this->assertArrayHasKey('type_batiment', $chantier);
		$this->assertArrayHasKey('temperature_moyenne', $chantier);
		$this->assertArrayHasKey('lieu', $chantier);
		$this->assertArrayHasKey('description', $chantier);
		$this->assertArrayHasKey('annees_batiment', $chantier);
	}
}
