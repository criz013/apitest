<?php

namespace App\Repository;

use App\Entity\SubFaction;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SubFaction|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubFaction|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubFaction[] findAll()
 * @method SubFaction[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubFactionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubFaction::class);
    }
}
