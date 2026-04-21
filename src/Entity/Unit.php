<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class Unit
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Faction::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Faction $faction;

    #[ORM\Column(length: 255)]
    private string $name;
}