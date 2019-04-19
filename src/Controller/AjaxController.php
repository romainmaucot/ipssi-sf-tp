<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Repository\ArticleRepository;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax/active", name="ajax_active")
     * @param ArticleRepository $articleRepository
     * @param Request $request
     * @return Response
     */
    public function active(ArticleRepository $articleRepository, Request $request) : Response
    {
        $id         = $request->get('idarticle');

        if ($id) {
            return new Response('No article found', 300);
        }
        $article    = $articleRepository->find($id);

        $isCensored = $article->getCensored();
        $article->setCensored($isCensored ? false : true);

        return new Response('OK', 200);
    }
}
