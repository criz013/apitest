<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\UniqueConstraint(name: "uniq_unit_version", columns: ["unit_id", "game_version_id"])]
class UnitVersion
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Unit::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Unit $unit;

    #[ORM\ManyToOne(targetEntity: GameVersion::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private GameVersion $gameVersion;

    #[ORM\Column]
    private int $points;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $stats = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $rules = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $options = null;
}