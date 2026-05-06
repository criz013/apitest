<?php

namespace App\Repository;

use App\Entity\Keyword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class KeywordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Keyword::class);
    }

    public function findByGame(int $gameId): array
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.game = :game')
            ->setParameter('game', $gameId)
            ->orderBy('k.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findGlobalByGame(int $gameId): array
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.game = :game')
            ->andWhere('k.isGlobal = true')
            ->setParameter('game', $gameId)
            ->orderBy('k.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function search(string $term, int $gameId): array
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.game = :game')
            ->andWhere('k.name LIKE :term')
            ->setParameter('game', $gameId)
            ->setParameter('term', '%' . $term . '%')
            ->orderBy('k.name', 'ASC')
            ->getQuery()
            ->getResult();
    }
}