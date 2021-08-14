<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        // return $this->json([
        //     'message' => 'Welcome to your new controller!',
        //     'path' => 'src/Controller/MainController.php',
        // ]);
        return new Response('<h1>Hello man</h1>');
    }

     /**
     * @Route("/custom/{name}", name="custom")
     * @param Request $request
     * @return Response
     */
    public function custom(Request $request, $name) {
        $roll = $request->get('roll');
        return new Response("<p>this is custom route</p>". $roll);
    }
}
