<?php

namespace App\Controller;

use App\Entity\Article;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/index")
 */
class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_index", methods={"GET"})
     * @param Request $request
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function index(Request $request, ArticleRepository $articleRepository): Response
    {
        $page               = $request->query->get('page') ? : 1 ;
        $articles           = $articleRepository->orderArticle($page);
        $totalPosts         = count($articleRepository->findAll());
        $maxPages           = ceil($totalPosts / 5);

        return $this->render('article/index.html.twig', [
            'articles'      => $articles,
            'maxPages'      => $maxPages,
        ]);
    }

    /**
     * @Route("/{id}", name="article_show", methods={"GET"})
     */
    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }
}
