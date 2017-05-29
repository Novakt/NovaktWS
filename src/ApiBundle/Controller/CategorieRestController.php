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
		// GET TOKEN
		$this->token = $request->query->get('token');
	
		// VERIF TOKEN
		// Si token invalide : accès refusé
		$response = new Response();
		$response->setStatusCode(Response::HTTP_FORBIDDEN);
		/*if(!$this->isValid()) {
			$response->setContent("Connexion refusee, veuillez vous authentifier avec un token valide");
			return $response;
		}*/
		
		//GET  CATEGORIES ET PRODUITS
		$categories = $this->getCategories();
		
		// RETURN
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