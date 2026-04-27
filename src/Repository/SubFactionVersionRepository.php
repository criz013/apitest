<?php

namespace App\Repository;

use App\Entity\SubFactionVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubFactionVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubFactionVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubFactionVersion[] findAll()
 * @method SubFactionVersion[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubFactionVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubFactionVersion::class);
    }
}
