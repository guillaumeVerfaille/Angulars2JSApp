<?php

// src/ListeAuteurBundle/Controller/AdvertController.php

namespace ListeAuteurBundle\Controller;
use ListeAuteurBundle\Entity\Auteur;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class AdvertController extends Controller
{
    public function indexAction()
    {
        $content = $this->get('templating')->render('ListeAuteurBundle:Advert:index.html.twig');
        return new Response($content);
        $Auteurs = new Auteur;
    }
     /**
     * @Route("/api/auteur")
     * @Method("GET")
     */
     //cette fonction est la fonction qui est appelée lorsque l'API reçoit une requête GET
    public function getAction()
    {
        //récupération de tous les auteurs dans la variable $auteurs
        $em = $this->getDoctrine()->getManager();
        $auteurs = $em->getRepository('ListeAuteurBundle:Auteur')->findAll();
        //Construction et envoie de la réponse
        $results = array();
        foreach ($auteurs as $auteur) {
            $results[] = array(
                'id' => $auteur->getId(),
                'nom' => $auteur->getNom(),
                'mail' => $auteur->getMail()
            );
        }

        return new JsonResponse($results);
    }
    /**
     * @Route("/api/auteur/{id}")
     * @Method("GET")
     */
	 //cette fonction est la fonction qui est appelée lorsque l'API reçoit une requête GET 
    public function getAuteurAction($id)
    {
		//récupération de l'auteur dont l'ID est $id dans la variable $auteur 
        $em = $this->getDoctrine()->getManager();
        $auteur = $em->getRepository('ListeAuteurBundle:Auteur')->findOneById($id);
		//Construction et envoie de la réponse
        $result = array();
        if ($auteur) {
            $result = array(
                'id' => $auteur->getId(),
                'nom' => $auteur->getNom(),
                'mail' => $auteur->getMail()
            );
        }

        return new JsonResponse($result);
    }
    
     /**
     * @Route("/api/auteur")
     * @Method("POST")
     */
     //cette fonction est la fonction qui est appelée lorsque l'API reçoit une  POST
    public function postAction(Request $request)
    {
		//récupération du nom et du mail de l'auteur reçu via la requête
        $nom = $request->get('nom');
        $mail = $request->get('mail');
        //Création de l'auteur avec son nom et de son mail
        $auteur = new Auteur();
        $auteur->setNom($nom)
            ->setMail($mail);
		//stockage de l'auteur dans la base de données
        $em = $this->getDoctrine()->getManager();
		$em->persist($auteur);
        $em->flush();
		//Construction et envoie de la réponse
        return new JsonResponse(array(
            'id' => $auteur->getId(),
            'nom' => $auteur->getNom(),
            'mail' => $auteur->getMail()
        ));
    }
    
    /**
     * @Route("/api/auteur/{id}")
     * @Method("DELETE")
     */
    //cette fonction est la fonction qui est appelée lorsque l'API reçoit une requête DELETE
    public function delAction($id)
    {
		//Récupération de l'auteur dont l'ID est $id dans la variable $auteur
        $em = $this->getDoctrine()->getManager();
        $auteur = $em->getRepository('ListeAuteurBundle:Auteur')->findOneById($id);
        $em->remove($auteur);//Suppression des données de l'auteur $auteur
        $em->flush();
		//Construction et envoie de la réponse
        return new JsonResponse(array());
    }
    
    /**
     * @Route("/api/auteur")
     * @Method("PUT")
     */
    //cette fonction est la fonction qui est appelée lorsque l'API reçoit une requête PUT
    public function putAction(Request $request)
    {
		//récupération de l'id, du nom et du mail de l'auteur reçu via la requête
        $id = $request->get('id');
        $nom = $request->get('nom');
        $mail = $request->get('mail');
		//Modification du nom et du mail de l'auteur dont l'id est $id
        $em = $this->getDoctrine()->getManager();
        $auteur = $em->getRepository('ListeAuteurBundle:Auteur')->findOneById($id);
		$auteur->setNom($nom)
            ->setMail($mail);
		$em->flush();
		//Construction et envoie de la réponse
        return new JsonResponse(array(
            'id' => $auteur->getId(),
            'nom' => $auteur->getNom(),
            'mail' => $auteur->getMail()
        ));
    }
    
}