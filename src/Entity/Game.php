<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    #[Groups(["game:read", "game:version:read", "faction:read"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["game:read", "game:version:read", "faction:read"])]
    private string $name;

    #[ORM\Column(type: "text", nullable: true)]
    #[Groups(["game:read"])]
    private ?string $description = null;

    #[ORM\Column]
    #[Groups(["game:read"])]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column(length: 255)]
    #[Groups(["game:read"])]
    private ?string $slug = null;

    #[ORM\ManyToOne(targetEntity: Publisher::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    #[Groups(["game:read"])]
    private Publisher $publisher;

    #[ORM\OneToMany(targetEntity: GameVersion::class, mappedBy: 'game')]
    #[Groups(["game:read"])]
    private Collection $gameVersions;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->gameVersions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getPublisher(): Publisher
    {
        return $this->publisher;
    }

    public function setPublisher(Publisher $publisher): void
    {
        $this->publisher = $publisher;
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

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
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

    public function getGameVersions(): Collection
    {
        return $this->gameVersions;
    }

    public function setGameVersions(Collection $gameVersions): void
    {
        $this->gameVersions = $gameVersions;
    }

}
