<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\NomClasseTable


class ServeurController extends AbstractController
{
    /**
     * @Route("/serveur", name="serveur")
     */
    public function index(): Response
    {
        return $this->render('serveur/index.html.twig', [
            'controller_name' => 'ServeurController',
        ]);
    }

     /**
     * @Route("/traitement", name="traitement")
     */
    public function traitement(Request $request): Response
    {
       //Récupère les informations de login
       $Login=$request->request->get("pseudo");
       $password=$request->request->get("password");

       if (($Login =="root") && ($password == "toor"))
       {
        $txt = "valide!";
       }
        else{
            $txt = "Non valide!";
        }
       
        return $this->render('serveur/traitement.html.twig', [
            'controller_name' => 'ServeurController',
            'login' => $Login,
            'password' => $password,
            'txt' => $txt,
        

            //Recherche de l'utilisateur dans la base de données
            $Utilisateur = $manager -> getRepository(Utilisateur)::findOneByLoginpassword$Login$password

            // vérification du mot de passe
            if ($utilisateur == null) {
                return new Response ("Utilisateur").$Login.$password"):
            }

           
        ]);
    

  
    }


}
