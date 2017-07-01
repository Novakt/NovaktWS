<?php


namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ClientRestController extends BaseController
{

	/**
	 * /GET /clients
	 * Retourne la liste des clients d'un commercial
	 * @param Request $request
	 */
	public function getClientsAction(Request $request)
	{
		$response = new Response();
		// GET TOKEN
		$this->token = $request->query->get('token');

		// VERIF TOKEN
		// Si le paramètre reçu est inconnu/invalide
		if($this->token == null)  {
			$response->setStatusCode(Response::HTTP_BAD_REQUEST);
			$response->setContent("Paramètre(s) reçu(s) invalide(s)");
			return $response;
			}

		// Si token invalide : accès refusé

		if(!$this->isValid()) {
		 $response->setStatusCode(Response::HTTP_FORBIDDEN);
			$response->setContent("Connexion refusee, veuillez vous authentifier avec un token valide");
			return $response;
			}

		//GET  CATEGORIES ET PRODUITS
		$clients = null;
		$idCommercial = $this->getIdCommercial();
		if($idCommercial != null || $idCommercial != 0) {
			$clients = $this->getClientsByIdCommercial($idCommercial);
		}else {
			$response->setStatusCode(Response::HTTP_BAD_REQUEST);
			$response->setContent("Erreur lors de la récupération de l'identifiant du commercial");
		}
		// RETURN
		$response->setStatusCode(Response::HTTP_OK);
		return $clients;
	}
	
	public function postClientAction(Request $request) 
	{
		$response = new Response();

		// GET TOKEN
		$this->token = $request->query->get('token');
		
		//GET JSON
		$clients = json_decode($request->request->get("clients"),true);
		
		// Si les paramètres reçus sont inconnu/invalide
		if($this->token == null || $clients == null)  {
			$response->setStatusCode(Response::HTTP_BAD_REQUEST);
			$response->setContent("Paramètre(s) reçu(s) invalide(s)");
			return $response;
		}
		
		// VERIF TOKEN
		// Si token invalide : accès refusé
		
		/*if(!$this->isValid()) {
		 $response->setStatusCode(Response::HTTP_FORBIDDEN);
		 $response->setContent("Connexion refusee, veuillez vous authentifier avec un token valide");
		 return $response;
		 }*/
		

		
		//Verif datas ?
		// Insert / update Datas
		
		return "Hello";
		
	}

	/**
	 * Récupère les catégories en bdd.
	 */
	private function getIdCommercial() {

		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery('SELECT c.id   FROM ApiBundle:Commercial c WHERE c.token = :token')
		->setParameter('token', $this->token);
			
		$commercial = $query->getResult();
		return $commercial["0"]["id"];
	
	}
	
	private function getClientsByIdCommercial($idCommercial) {
		$repositoryClient = $this->getDoctrine()->getRepository('ApiBundle:Client');
		$clients = $repositoryClient->findByCommercial($idCommercial);
		return $clients;
	}
}