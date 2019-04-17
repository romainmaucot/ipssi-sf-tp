<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\PlayType;
use App\Repository\GameRepository;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index()
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * /**
     * @Route("/game/play", name="game_play")
     * @param GameRepository $gameRepository
     * @param Request $request
     * @return Response
     */
    public function play(GameRepository $gameRepository, Request $request) : Response
    {
        $lastId = $gameRepository->findLast();
        if(!$lastId){
          throw new Exception('Il n\'y a pas de jeux');
        }
        $form = $this->createForm(PlayType::class, ['round'=> $lastId[0]->getId()]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            //-------------------------Mise----------------------------------------
            $newAmount = $this->getUser()->getAmount() - $data['mise'];
            $this->getUser()->setAmount($newAmount);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($this->getUser());
            $entityManager->flush();
            //-----------------------------------------------------------------


            return $this->redirectToRoute('game_play');
        }

        return $this->render('game/play.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
