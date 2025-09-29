<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    #[Route('/articles')]
    public function renderListArticlesPage() {

        // récupère mes articles en BDD
        $articlesFromDB = [
            1 => [
                'id' => 1,
                'title' => 'Article 1',
                'content' => 'Content Article 1',
                'is_published' => true,
            ],
            2 => [
                'id' => 2,
                'title' => 'Article 2',
                'content' => 'Content Article 2',
                'is_published' => false,
            ],
            3 => [
                'id' => 3,
                'title' => 'Article 3',
                'content' => 'Content Article 3',
                'is_published' => true,
            ]
        ];

        return $this->render("listArticles.html.twig", [
            'articles' => $articlesFromDB,
        ]);
    }

    // je place dans la route un parametre variable
    // c'est à dire qui peut être n'importe quelle valeur
    // ici je le nomme id
    #[Route('/articles/{id}')]
    // je demande à symfony de récupérer automatiquement
    // la valeur du paramete id dans l'url
    // et de le stocker dans la variable $id
    // donc si l'url demandée est /articles/213
    // alors $id sera égal à 213
    public function renderSingleArticlePage($id) {

        // simulation de requête de BDD
        $articlesFromDB = [
            1 => [
                'id' => 1,
                'title' => 'Article 1',
                'content' => 'Content Article 1',
            ],
            2 => [
                'id' => 2,
                'title' => 'Article 2',
                'content' => 'Content Article 2',
            ],
            3 => [
                'id' => 3,
                'title' => 'Article 3',
                'content' => 'Content Article 3',
            ]
        ];

        if (!array_key_exists($id, $articlesFromDB)) {
            return new Response('Article non trouvé', Response::HTTP_NOT_FOUND);
        }

        $article = $articlesFromDB[$id];

        return $this->render("singleArticle.html.twig", [
            'article' => $article,
        ]);

    }

}
