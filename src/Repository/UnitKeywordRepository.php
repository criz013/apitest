<?php

namespace App\Repository;

use App\Entity\UnitKeyword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UnitKeywordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnitKeyword::class);
    }

    public function findKeywordsByUnit(int $unitId): array
    {
        return $this->createQueryBuilder('uk')
            ->select('k')
            ->join('uk.keyword', 'k')
            ->andWhere('uk.unit = :unit')
            ->setParameter('unit', $unitId)
            ->orderBy('k.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findUnitsByKeyword(int $keywordId): array
    {
        return $this->createQueryBuilder('uk')
            ->join('uk.unit', 'u')
            ->addSelect('u')
            ->andWhere('uk.keyword = :keyword')
            ->setParameter('keyword', $keywordId)
            ->getQuery()
            ->getResult();
    }

    public function unitHasKeyword(int $unitId, string $keywordName): bool
    {
        return (bool) $this->createQueryBuilder('uk')
            ->join('uk.keyword', 'k')
            ->select('1')
            ->andWhere('uk.unit = :unit')
            ->andWhere('k.name = :name')
            ->setParameter('unit', $unitId)
            ->setParameter('name', $keywordName)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findUnitsByKeywords(array $keywordIds): array
    {
        return $this->createQueryBuilder('uk')
            ->join('uk.unit', 'u')
            ->addSelect('u')
            ->andWhere('uk.keyword IN (:keywords)')
            ->setParameter('keywords', $keywordIds)
            ->groupBy('u.id')
            ->getQuery()
            ->getResult();
    }
}