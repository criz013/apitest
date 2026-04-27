<?php

namespace App\Repository;

use App\Entity\GameVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameVersion[] findAll()
 * @method GameVersion[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameVersion::class);
    }
}
