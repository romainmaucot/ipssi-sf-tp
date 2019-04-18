<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;
use App\Form\PlayType;
use App\Repository\GameRepository;
use App\Manager\UserManager;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function index() : Response
    {
        return $this->render('game/index.html.twig', [
            'controller_name' => 'GameController',
        ]);
    }

    /**
     * @Route("/game/play", name="game_play")
     * @param GameRepository $gameRepository
     * @param Request $request
     * @return Response
     */
    public function play(GameRepository $gameRepository, Request $request) : Response
    {
        $lastId = $gameRepository->findLast();
        if (!$lastId) {
            throw new Exception('Il n\'y a pas de jeux');
        }

        $game = new Game();
        $cases = $game->getCases();
        $aCases = [];
        foreach ($cases as $row) {
            $aCases[ $row->getNumber() ] = $row->getColor();
        }
        $form = $this->createForm(PlayType::class, [
            'round'=> $lastId[0]->getId(),
            /** la mise par défault est égale à 10% du montant total du compte en banque de l'utilisateur */
            'mise'=>  ($this->getUser() ? $this->getUser()->getAmount() : 0 ) * (0.10),
            'numero'=> $aCases,
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            if (!$this->getUser()) {
                return $this->redirectToRoute('game_play', ['message' => 'Vous n\'ête pas connecté']);
            }
            //-------------------------Déduction de mise----------------------------------------
            $newAmount = ($this->getUser()->getAmount()) - ($data['mise']);
            $this->getUser()->setAmount($newAmount);
            //--------------------------Prépare la mise pour la prochaine partie-----------------------------------
            $userManager = new UserManager();
            $numero = $userManager->getNumber($this->getUser()->getNextBet()).$data['case'];
            $mise   = $userManager->getMise($this->getUser()->getNextBet()).$data['mise'];
            $this->getUser()->setNextBet($numero.'-'.$mise);

            //--------------------------Game---------------------------------------
            $game->addUser($this->getUser());
            $game->setStarted(new \DateTime('now'));
            //--------------------------Doctrine---------------------------------------
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($this->getUser());
            $entityManager->persist($game);
            try {
                $entityManager->flush();
            } catch (Exception $e) {
                echo 'Caught exception: ', $e->getMessage(), "\n";
            }
            $msg = 'Vous avez misé '.$data['mise'].' $ '.'pour la prochaine partie. Le montant de table s\'élevra à '.$userManager->tableGain().'. Vous jouer pour un gain potentiel de '.'$foo';

            return $this->redirectToRoute('game_play', ['message' => $msg]);
        }

        return $this->render('game/play.html.twig', [
            'form' => $form->createView(),
            'cases' => $cases ? : []
        ]);
    }

    /**
     * @Route("/game/run", name="game_run")
     */
    public function run(UserRepository $userRepository) : Response
    {
        $game = new Game();
        $cases = $game->getCases();


        $userManager = new UserManager();
        $aPlayer =  $userRepository->nextPlayers();
        //----------------Lance la roue-------------------
        $finalResult = $cases[array_rand($cases, 1)];
        //------------------------------------------------
        if (!is_null($aPlayer)) {
            $result = [];
            foreach ($aPlayer as $player) {
                $numCase    = $userManager->getNumber($player->getNextBet());
                $betAmount  = $userManager->getMise($player->getNextBet());

                $numCase = array_filter(explode(',', $numCase));
                $betAmount = array_filter(explode(',', $betAmount));

                foreach ($numCase as $key => $case) {
                    if ($case == $finalResult->getNumber() && $cases[$case]->getColor() == $finalResult->getColor()) {
                        $result[$player->getId()] = 'à Gagné '.$betAmount[$key].' x...';
                    } else {
                        $result[$player->getId()] = 'à Perdu ';
                    }
                }
            }
        }

        return $this->render('game/result.html.twig', ['result' => $result]);
    }

    /**
     * @Route("/game/mail", name="game_mail")
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function sendMAil( \Swift_Mailer $mailer)
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('loryleticee@gmail.com')
            ->setTo('loryleticee@gmail.com')
            ->setBody(
                $this->renderView(
                    'game/play.html.twig',
                    ['name' => 'rvtveveveve']
                )
            )
        ;
        $mailer->send($message);

        return $this->render('game/play.html.twig');
    }
}
