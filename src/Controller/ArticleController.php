<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    #[Route('/list-articles', name: 'list_articles')]
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


    #[Route('/articles/{id}', name: 'single_article')]
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

    #[Route('/create-article', name: 'create_article')]
    public function renderCreateArticlePage(Request $request) {

        // Récupérer les données envoyées en POST
        // si y'en a

        if ($request->isMethod('POST')) {
            dump('form envoyé'); die;
        }


        return $this->render("createArticle.html.twig");
    }

}
