<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Hateoas\UrlGenerator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as UrlGeneratorInterfaceAlias;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;


#[Route('/api/game')]
final class GamesController extends AbstractController
{
    #[Route('/', name: 'app_games', methods: ['GET'])]
    public function indexGames(GameRepository $gameRepository, SerializerInterface $serializer): JsonResponse
    {
        $game = $gameRepository->findAll();
        $game = $serializer->serialize($game, 'json', SerializationContext::create()->setGroups(['game:read']));

        return new JsonResponse($game,Response::HTTP_OK,['accept' => 'json'],true);
    }

    #[Route('/{id}', name: 'app_show_games', methods: ['GET'])]
    public function showGames(Game $game, SerializerInterface $serializer): JsonResponse
    {
        $game = $serializer->serialize($game, 'json',['groups' => 'game:read']);

        return new JsonResponse($game,Response::HTTP_OK,['accept' => 'json'],true);
    }

    #[Route('/', name: 'app_add_games', methods: ['POST'])]
    public function addGames(Request $request,
                             SerializerInterface $serializer,
                             EntityManagerInterface $entityManager,
                             UrlGeneratorInterface $urlGenerator
    ): JsonResponse
    {
        $game = $serializer->deserialize($request->getContent(), Game::class, 'json');
        $entityManager->persist($game);
        $entityManager->flush();

        $gameJson = $serializer->serialize($game, 'json', ['groups' => 'game:read']);
        $location = $urlGenerator->generate('app_show_games', [
            'id' => $game->getId()
        ], UrlGeneratorInterfaceAlias::ABSOLUTE_URL);

        return new JsonResponse($gameJson, Response::HTTP_CREATED,['Location' => $location],true);
    }

    #[Route('/{id}', name: 'app_delete_games', methods: ['DELETE'])]
    public function deleteGames(Game $game, EntityManagerInterface $entityManager): JsonResponse
    {
        $entityManager->remove($game);
        $entityManager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
