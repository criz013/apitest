<?php

namespace App\Entity;

use App\Repository\FactionRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: FactionRepository::class)]
class Faction
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    #[Groups(["faction:read", "faction:version:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["faction:read", "faction:version:read"])]
    private string $name;

    #[ORM\Column(type: "text", nullable: true)]
    #[Groups(["faction:read"])]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    #[Groups(["faction:read"])]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: Game::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(["faction:read"])]
    private Game $game;

    #[ORM\OneToMany(targetEntity: FactionKeyword::class, mappedBy: "faction", orphanRemoval: true)]
    private Collection $factionKeywords;

    public function __construct()
    {
        $this->factionKeywords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getGame(): Game
    {
        return $this->game;
    }

    public function setGame(Game $game): void
    {
        $this->game = $game;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    
}
