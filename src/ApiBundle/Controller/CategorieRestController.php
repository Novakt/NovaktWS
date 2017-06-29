<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class CategorieRestController extends BaseController
{

	/**
	 * /GET /categories
	 * Retourne la liste des catégories et de leurs produits
	 * @param Request $request
	 */
	public function getCategorieAction(Request $request)
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
		$categories = $this->getCategories();
		
		// RETURN
		$response->setStatusCode(Response::HTTP_OK);
		return $categories;
	}
	
	/**
	 * Récupère les catégories en bdd.
	 */
	private function getCategories() {
		
		$categories = $this->getDoctrine()
		->getRepository('ApiBundle:Categorie')
		->findAll();
		
		return $categories;
	}
}