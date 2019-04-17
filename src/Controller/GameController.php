<?php

namespace App\Controller;

use App\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\PlayType;
use App\Repository\GameRepository;
use \DateTime;

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
        $form = $this->createForm(PlayType::class, [
            'round'=> $lastId[0]->getId(),
            /** la mise par défault est égale à 10% du montant total du compte en banque de l'utilisateur */
            'mise'=> ( $this->getUser()->getAmount() * (0.10) ),
        ]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            //-------------------------Déduction de mise----------------------------------------
            $newAmount = $this->getUser()->getAmount() - $data['mise'];
            $this->getUser()->setAmount($newAmount);
            //--------------------------Game---------------------------------------
            $game = new Game();
            $game->addUser($this->getUser());
            $game->setStarted(\DateTime::class);
            //--------------------------Doctrine---------------------------------------
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($this->getUser());
            $entityManager->persist($game);
            try {
                $entityManager->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
            }
            $msg = 'Votre mise à bien été prise en compte';

            return $this->redirectToRoute('game_play',['message' => $msg]);
        }

        return $this->render('game/play.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
