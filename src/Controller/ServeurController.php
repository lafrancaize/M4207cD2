<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Utilisateur;



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
    public function traitement(Request $request,EntityManagerInterface $manager): Response
    {
       //Récupère les informations de login
       $Login=$request->request->get("pseudo");
       $password=$request->request->get("password");

       $response = $manager -> getRepository(Utilisateur::class)-> findOneBy([ 'Utilisateur' => 'txt']);
       if ($response==NULL){
           $traitement="L'utiliateur n'existe pas ";

       }else{
           $motdepasse=$response ->getPassword();
           if ($motdepasse==$password){
               $traitement="Mot de passe correct";
            
           }else {
               $traitement="Mot de passe incorrect";
           }
       }
       return $this->render('serveur/traitement.html.twig',[
           'controller_name '=>'ServerController',
           'login' => $login,
           'password'=>$password,
           'traitement'=> $traitement
       ]);
    }

}