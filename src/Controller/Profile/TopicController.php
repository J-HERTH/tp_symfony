<?php
# src/Controller/Profile/TopicController.php

namespace App\Controller\Profile;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/profile")
 */
class TopicController extends AbstractController
{
    /**
     * @Route("/topic" , name="profile")
     */
    public function index()
    {


        $user = $this->getUser();

        return $this->render('profile/topic/index.html.twig', [
            'controller_name' => 'TopicController',
            'topics' => $user->getTopic(), // récupère toutes les annonces de l'utilisateur
        ]);
    }


}
