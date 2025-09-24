<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController
{

    #[Route('/articles')]
    public function renderListArticlesPage() {

        return new Response('<h1>Liste des articles</h1>', 200);

    }

}
