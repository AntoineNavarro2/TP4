<?php

namespace App\Controller;

use App\Entity\Intervenant;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IntervenantController extends AbstractController
{
    /**
     * @Route("/intervenant", name="intervenant")
     */

    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        // Création d’une instance
        $inter = new Intervenant();
        $inter->setNom("Leclerc");
        $inter->setSpecialiteprofessionnelle("Docteur en informatique");

        // informer Doctrine que l'on veut persister ces données (ne provoque pas de Query)
        $entityManager->persist($inter);
        /* exécution de la requête (i.e. the INSERT query). Quand cette méthode est appelée
        Doctrine vérifie parmi les objets qu’elle gère s’ils doivent être persistés dans la
        bdd. En l’occurrence, un nouvel enregistrement est créé (Doctrine est capable de
        déterminer si elle doit INSERT ou UPDATE votre entité*/
        $entityManager->flush();

        return new Response("Création d'un intervenant avec l'id".$inter->getId());



    }

    /**
     * @Route ("/intervenant/{id}", name="affiche_intervenant")
     */
    public function show($id)
    {
        $inter = $this->getDoctrine()
            ->getRepository( Intervenant::class )
            ->find($id);
        if(!$inter){
            throw $this->createAccessDeniedException(
                "pas d'intervenant pour cet id".$id
            );

        }
        return new Response( 'id numéro '.$id." ,Nom intervenant : ".$inter->getNom());
    }
}
