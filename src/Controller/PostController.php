<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/post", name="post.")
     */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository): Response
    {
        $posts = $postRepository->findAll();;
        dd($posts);
        return $this->json([
            'data' => $posts,
            'status' => 200,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request) {
        $post = new Post();
        $post->setTitile("I am shohag");

        // Enity  manager
        $em = $this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();
        return  $this->json(['data'=> 'post created!']);
    }
}
