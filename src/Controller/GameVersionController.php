<?php

namespace App\Controller;

use App\Entity\GameVersion;
use App\Repository\GameVersionRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/game-version')]
class GameVersionController extends AbstractController
{
    #[Route(path:"/", name:"game_version_index", methods:"GET")]
    public function index(GameVersionRepository $versionRepository, SerializerInterface $serializer)
    {
        $gameVersions = $versionRepository->findAll();
        $gameVersions = $serializer->serialize($gameVersions, 'json', ['groups' => 'game:version:read']);

        return new JsonResponse($gameVersions,Response::HTTP_OK,['accept' => 'json'],true);
    }

    #[Route('/{id}', name: 'game_version_show', methods: ['GET'])]
    public function showGames(GameVersion $gameVersion, SerializerInterface $serializer): JsonResponse
    {
        $gameVersion = $serializer->serialize($gameVersion, 'json',['groups' => 'game:version:read']);

        return new JsonResponse($gameVersion,Response::HTTP_OK,['accept' => 'json'],true);
    }
}