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
	private  $token  = "e966223a1cfa25e8955d4c2331386818c09a8f859cddd7e0cc93e7d1dfe91b8a";
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
