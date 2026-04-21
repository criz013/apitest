<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
#[ORM\UniqueConstraint(name: "uniq_faction_version", columns: ["faction_id", "game_version_id"])]
class FactionVersion
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Faction::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Faction $faction;

    #[ORM\ManyToOne(targetEntity: GameVersion::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private GameVersion $gameVersion;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $rules = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $bonuses = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $restrictions = null;
}