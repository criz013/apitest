<?php

namespace App\Repository;

use App\Entity\FactionVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FactionVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactionVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactionVersion[] findAll()
 * @method FactionVersion[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactionVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FactionVersion::class);
    }
}
