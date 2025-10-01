<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CategoriesController extends AbstractController
{

    #[Route('/categories', name: 'list_categories')]
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

    #[Route('/create-category', name: 'create_category')]
    public function renderCreateCategoryPage(Request $request, EntityManagerInterface $entityManager) {


        $title = null;

        if ($request->isMethod('POST')) {
            $title = $request->request->get('title');

            $category = new Category();
            $category->setTitle($title);

            $entityManager->persist($category);
            $entityManager->flush();
        }


        return $this->render('createCategory.html.twig', [
            'title' => $title,
        ]);

    }


}
