<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// je fais hériter ma classe de la classe AbstractController
// pour bénéficier de l'héritage et donc pouvoir utiliser les méthodes d'AbstractController
// AbstractController contient pleins de méthodes utilitaires pour les contrôleurs
// (réponse avec du twig, redirection facile etc)
class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function renderHomePage() {

        // j'utilise la méthode render pour récupérer le contenu du fichier twig
        // le transformer en HTML et renvoyer une réponse avec le HTML + un status 200
       return $this->render('home.html.twig');
    }

}
