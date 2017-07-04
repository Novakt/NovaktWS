<?php
namespace ApiBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BaseController extends Controller
{
	protected $token;
	protected $idUser;
	/**
	 * Test si le token est valide
	 * @return boolean
	 */
	protected function isValid(){
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery('SELECT c.id, c.dateToken FROM ApiBundle:Commercial c WHERE c.token = :token')
		->setParameter('token', $this->token);

		$result = $query->getResult();
		// Si le token n'existe pas
		if(empty($result)) {
			return false;
		}

		$this->idUser = $result["0"]["id"];

		// Comparaison de la date
		$dateToken = new \DateTime($result[0]["dateToken"]->format('Y-m-d H:i:s'));
		$now = new \DateTime(date('Y-m-d H:i:s'));
		$interval = $dateToken->diff($now)->format('%d');
		/*if($interval > 7) {
			return false;
		}*/
		return true;
	}
	/**
	 * Format une date reçu en DateTime
	 * @param string $date
	 * @return boolean|\DateTime
	 */
	protected function createDate($date) {

		//$dateformat = \DateTime::createFromFormat('j:m:Y:H:i',$date);
	    $dateformat = \DateTime::createFromFormat('Y-m-d',$date);
		var_dump($dateformat);
		if($dateformat == false) {
			return false;
		}
		return $dateformat;
	}

	/**
	 * Génération string random
	 * @param string $length
	 * @return string
	 */
	protected function generateString($length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$string = '';

		for ($i = 0; $i < $length; $i++) {
			$string .= $characters[mt_rand(0, strlen($characters) - 1)];
		}
		return $string;
	}
}