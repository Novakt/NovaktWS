<?php
namespace ApiBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Récupération des chantiers.
 * @author Thomas
 *
 */
class CommercialRestControllerTest extends WebTestCase
{
	private  $token  = "e966223a1cfa25e8955d4c2331386818c09a8f859cddd7e0cc93e7d1dfe91b8a";
	private $login = "toto";
	private $password = "tata";
	

	/**
	 * Test with valid logins
	 * @return string
	 */
	public function testAuthWithValidLogins()
	{
		$client = static::createClient();
		$datas = array(
				"username" => $this->login,
				"password" => $this->password
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(200,$client->getResponse()->getStatusCode());
		$this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));
		return $client->getResponse()->getContent();
	}

	/**
	 * Test with invalid logins
	 * @return string
	 */
	public function testAuthWithWrongLogins()
	{
		$client = static::createClient();
		$datas = array(
				"username" => "ygyg",
				"password" => "ghj"
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(204,$client->getResponse()->getStatusCode());
		return $client->getResponse()->getContent();
	}
	/**
	 * Test with empty logins
	 * @return string
	 */
	public function testAuthWithEmptyLogins()
	{
		$client = static::createClient();
		$datas = array(
				"username" => "",
				"password" => ""
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
		return $client->getResponse()->getContent();
	}
	/**
	 * Test with null logins
	 * @return string
	 */
	public function testAuthWithNullLogins()
	{
		$client = static::createClient();
		$datas = array(
				"username" => null,
				"password" => null
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
		return $client->getResponse()->getContent();
	}
	/**
	 * Test with valid token
	 * @return string
	 */
	public function testAuthWithValidToken()
	{
		$client = static::createClient();
		$datas = array(
				"token" => $this->token
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(200,$client->getResponse()->getStatusCode());
		$this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));
		return $client->getResponse()->getContent();
	}
	/**
	 * Test with invalid token
	 * @return string
	 */
	public function testAuthWithWrongToken()
	{
		$client = static::createClient();
		$datas = array(
				"token" => "token"
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(204,$client->getResponse()->getStatusCode());
		return $client->getResponse()->getContent();
	}
	/**
	 * Test with invalid token
	 * @return string
	 */
	public function testAuthWithEmptyToken()
	{
		$client = static::createClient();
		$datas = array(
				"token" => ""
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
		return $client->getResponse()->getContent();
	}
	/**
	 * Test with invalid token
	 * @return string
	 */
	public function testAuthWithNullToken()
	{
		$client = static::createClient();
		$datas = array(
				"token" => null
		);
		$client->request("POST", "api/logins",$datas);
		$this->assertEquals(400,$client->getResponse()->getStatusCode());
		return $client->getResponse()->getContent();
	}
}
