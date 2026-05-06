<?php

namespace App\Repository;

use App\Entity\FactionKeyword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FactionKeywordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactionKeyword::class);
    }

    public function findByFaction(int $factionId): array
    {
        return $this->createQueryBuilder('fk')
            ->join('fk.keyword', 'k')
            ->addSelect('k')
            ->andWhere('fk.faction = :faction')
            ->setParameter('faction', $factionId)
            ->orderBy('k.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findKeywordsByFaction(int $factionId): array
    {
        return $this->createQueryBuilder('fk')
            ->select('k')
            ->join('fk.keyword', 'k')
            ->andWhere('fk.faction = :faction')
            ->setParameter('faction', $factionId)
            ->orderBy('k.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function exists(int $factionId, int $keywordId): bool
    {
        return (bool) $this->createQueryBuilder('fk')
            ->select('1')
            ->andWhere('fk.faction = :faction')
            ->andWhere('fk.keyword = :keyword')
            ->setParameter('faction', $factionId)
            ->setParameter('keyword', $keywordId)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
