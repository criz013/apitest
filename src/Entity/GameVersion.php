<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity]
class GameVersion
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Game::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Game $game;

    #[ORM\Column(length: 100)]
    private string $name;

    #[ORM\Column(type: "date", nullable: true)]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $rules = null;
}