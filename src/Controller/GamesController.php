<?php

namespace App\Controller;

use App\Entity\Games;
use App\Repository\GamesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Hateoas\UrlGenerator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface as UrlGeneratorInterfaceAlias;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/games')]
final class GamesController extends AbstractController
{
    #[Route('/', name: 'app_games', methods: ['GET'])]
    public function indexGames(GamesRepository $gamesRepository, SerializerInterface $serializer): JsonResponse
    {
        $game = $gamesRepository->findAll();
        $games = $serializer->serialize($game, 'json', ['groups' => 'game:read']);

        return new JsonResponse($games,Response::HTTP_OK,['accept' => 'json'],true);
    }

    #[Route('/{id}', name: 'app_show_games', methods: ['GET'])]
    public function showGames(Games $game, SerializerInterface $serializer): JsonResponse
    {
        $game = $serializer->serialize($game, 'json', ['groups' => 'game:read']);

        return new JsonResponse($game,Response::HTTP_OK,['accept' => 'json'],true);
    }

    #[Route('/', name: 'app_add_games', methods: ['POST'])]
    public function addGames(Request $request,
                             SerializerInterface $serializer,
                             EntityManagerInterface $entityManager,
                             UrlGeneratorInterface $urlGenerator
    ): JsonResponse
    {
        $game = $serializer->deserialize($request->getContent(), Games::class, 'json');
        $entityManager->persist($game);
        $entityManager->flush();

        $gameJson = $serializer->serialize($game, 'json', ['groups' => 'game:read']);
        $location = $urlGenerator->generate('app_show_games', [
            'id' => $game->getId()
        ], UrlGeneratorInterfaceAlias::ABSOLUTE_URL);

        return new JsonResponse($gameJson, Response::HTTP_CREATED,['Location' => $location],true);
    }

    #[Route('/{id}', name: 'app_delete_games', methods: ['DELETE'])]
    public function deleteGames(Games $games, EntityManagerInterface $entityManager): JsonResponse
    {
        $entityManager->remove($games);
        $entityManager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
