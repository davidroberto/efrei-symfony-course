<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{

    #[Route('/')]
    public function renderHomePage() {
       return new Response('<h1>Bonjour Efrei</h1>', 200);
    }

}
