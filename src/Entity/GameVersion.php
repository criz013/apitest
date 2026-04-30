<?php

namespace App\Entity;

use App\Repository\GameVersionRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GameVersionRepository::class)]
class GameVersion
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    #[Groups(['game:version:read', 'game:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Groups(["game:version:read", 'game:read'])]
    private string $name;

    #[ORM\Column(type: "date", nullable: true)]
    #[Groups(["game:version:read"])]
    private ?\DateTimeInterface $releaseDate = null;

    #[ORM\Column(type: "json", nullable: true)]
    #[Groups(["game:version:read"])]
    private ?array $rules = null;

    #[ORM\Column(length: 255)]
    #[Groups(["game:version:read"])]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: Game::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(["game:version:read"])]
    private Game $game;

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

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(?\DateTimeInterface $releaseDate): void
    {
        $this->releaseDate = $releaseDate;
    }

    public function getRules(): ?array
    {
        return $this->rules;
    }

    public function setRules(?array $rules): void
    {
        $this->rules = $rules;
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