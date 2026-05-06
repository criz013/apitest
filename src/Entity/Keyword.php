<?php

namespace App\Entity;

use App\Repository\KeywordRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: KeywordRepository::class)]
class Keyword
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private string $name;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $type = null; // ex: "unit", "faction", "rule"

    #[ORM\Column(type: "boolean")]
    private bool $isGlobal = true;

    #[ORM\ManyToOne(targetEntity: Game::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Game $game;

    #[ORM\OneToMany(targetEntity: FactionKeyword::class, mappedBy: "keyword", orphanRemoval: true)]
    private Collection $factionKeywords;

    #[ORM\OneToMany(targetEntity: UnitKeyword::class, mappedBy: "keyword", orphanRemoval: true)]
    private Collection $unitKeywords;

    public function __construct()
    {
        $this->factionKeywords = new ArrayCollection();
        $this->unitKeywords = new ArrayCollection();
    }
    #[ORM\Column(type: "json", nullable: true)]
    private ?array $metadata = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function isGlobal(): bool
    {
        return $this->isGlobal;
    }

    public function setIsGlobal(bool $isGlobal): void
    {
        $this->isGlobal = $isGlobal;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(?array $metadata): void
    {
        $this->metadata = $metadata;
    }
}