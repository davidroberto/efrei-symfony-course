<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{

    #[Route('/categories')]
    public function renderListCategoriesPage() {

        $categories = [
            1 => [
                'id' => 1,
                'title' => 'Catégorie 1',
            ],
            2 => [
                'id' => 2,
                'title' => 'Catégorie 2',
            ],
            3 => [
                'id' => 3,
                'title' => 'Catégorie 3',
            ],
        ];
        
        return $this->render('listCategories.html.twig', [
            'categories' => $categories,
        ]);

    }


}
