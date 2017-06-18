<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ChantierRestController extends BaseController
{

	/**
	 * /GET /categories
	 * Retourne la liste des chantier
	 * @param Request $request
	 */
	public function getChantierAction(Request $request)
	{
		$response = new Response();
		// GET TOKEN
		$this->token = $request->query->get('token');


		// VERIF TOKEN
		// Si le param�tre re�u est inconnu/invalide
		if($this->token == null)  {
			$response->setStatusCode(Response::HTTP_BAD_REQUEST);
			$response->setContent("Param�tre(s) re�u(s) invalide(s)");
			return $response;
		}

		// Si token invalide : acc�s refus�

		if(!$this->isValid()) {
		 $response->setStatusCode(Response::HTTP_FORBIDDEN);
			$response->setContent("Connexion refusee, veuillez vous authentifier avec un token valide");
			return $response;
			}

		//GET  CHANTIERS
		$chantiers = $this->getChantiers();

		// RETURN
		$response->setStatusCode(Response::HTTP_OK);
		return $chantiers;
	}

	/**
	 * R�cup�re les cat�gories en bdd.
	 */
	private function getChantiers() {

		$chantiers = $this->getDoctrine()
		->getRepository('ApiBundle:Chantier')
		->findAll();

		return $chantiers;
	}
}