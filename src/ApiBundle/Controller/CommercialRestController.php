<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CommercialRestController extends BaseController
{
	private $_salt = "1A%A3";
	/**
	 * /GET /categories
	 * Connecte un commercial à l'application
	 * @param Request $request
	 */
	public function postLoginAction(Request $request)
	{
		/**
		 * Get request items *
		 */
		$username = $request->request->get ( 'username' );
		$password = $request->request->get ( 'password' );
		$token = $request->request->get ( 'token' );
		$commercial = null;
		$em = $this->getDoctrine()->getManager();
		$repository = $em->getRepository('ApiBundle:Commercial');
		/**
		 * Si username ou password est null on renvoit une erreur BAD REQUEST*
		 */
		if (($username == null || $password == null) && $token == null) {
			$response = new Response ();
			$response->setStatusCode ( Response::HTTP_BAD_REQUEST );
			$response->headers->set ( 'Content-Type', 'application/json' );
			return $response;
			// SI on reçoit le token
		} elseif ($username == null && $password == null && $token != null) {
			
			/**
			 * Récupération de l'utilisateur en base de données*
			 */
			
			$commercial = $repository->findOneByToken($token);
			
		} elseif ($username != null && $password != null) {
			$req = "SELECT c.id,c.token, c.dateToken FROM ApiBundle:Commercial c WHERE c.login = :username AND c.password = :password";
		
			/** Récupération de l'utilisateur en base de données**/
			$em = $this->getDoctrine()->getManager();
			$query = $em->createQuery($req)
			->setParameter('username', $username)
			->setParameter('password', $password);
			$commercial = $query->getOneOrNullResult();
			
			$commercial = $repository->findOneByToken($commercial["token"]);
			
		}
		/**
		 * S'il n'existe pas on renvoit une erreur NOT FOUND *
		 */
		if ($commercial == null) {
			$response = new Response ();
			$response->setStatusCode ( Response::HTTP_NOT_FOUND );
			return $commercial;
			exit;
		}
		//var_dump($commercial);
		$com = $em->getRepository ( "ApiBundle:Commercial" )->find($commercial->getId());
		$now = new \DateTime ();
		
		if($com->getToken() == null) {
			$token = $this->generateToken ();
			
			$com->setToken($token);
			$com->setDateToken($now);
			$em->persist ($com);
			$em->flush ();
			return $com->getToken();
		}
		$date_token = $com->getDateToken();
		$token_new = $this->generateToken ();
		$interval = $date_token->diff ( $now );
		$days = $interval->format ( '%R%a' );
		if ($days >= 30) {
			$com->setToken($token);
			$com->setDateToken($now);
			$em->persist ($com);
			$em->flush ();
			return $com->getToken();
		}
		return $com;
	}
	/**
	 * Générer la token d'Authentification.
	 * *
	 */
	private function generateToken() {
		$mdp = "";
		$caract = "abcdefghijklmnopqrstuvwyxz0123456789@!:;,§/?*µ$=+";
		for($nbrPasswd = 1; $nbrPasswd <= 1; $nbrPasswd ++) {
			for($i = 1; $i <= 8; $i ++) {
				$nbr = strlen ( $caract );
				$nbr = mt_rand ( 0, ($nbr - 1) );
				$mdp .= $caract [$nbr];
			}
		}
		return $this->generateHash ( $mdp );
	}
	/**
	 * Générate hash
	 * @param unknown $password
	 * @return string
	 */
	private function generateHash($password) {
		$pass = hash ( 'sha256', $this->_salt . $password . $this->_salt );
		return $pass;
	}
	/**
	 * Récupère les catégories en bdd.
	 */
	private function getChantiers() {

		$chantiers = $this->getDoctrine()
		->getRepository('ApiBundle:Chantier')
		->findAll();

		return $chantiers;
	}
}