<?php

namespace App\Repository;

use App\Entity\UnitVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UnitVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnitVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnitVersion[] findAll()
 * @method UnitVersion[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnitVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnitVersion::class);
    }
}
