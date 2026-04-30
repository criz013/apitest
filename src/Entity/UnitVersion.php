<?php

namespace App\Entity;

use App\Repository\UnitVersionRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: UnitVersionRepository::class)]
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

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $points = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $stats = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $rules = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $options = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getUnit(): Unit
    {
        return $this->unit;
    }

    public function setUnit(Unit $unit): void
    {
        $this->unit = $unit;
    }

    public function getGameVersion(): GameVersion
    {
        return $this->gameVersion;
    }

    public function setGameVersion(GameVersion $gameVersion): void
    {
        $this->gameVersion = $gameVersion;
    }
    public function getStats(): ?array
    {
        return $this->stats;
    }

    public function setStats(?array $stats): void
    {
        $this->stats = $stats;
    }

    public function getRules(): ?array
    {
        return $this->rules;
    }

    public function setRules(?array $rules): void
    {
        $this->rules = $rules;
    }

    public function getOptions(): ?array
    {
        return $this->options;
    }

    public function setOptions(?array $options): void
    {
        $this->options = $options;
    }

    public function getPoints(): ?array
    {
        return $this->points;
    }

    public function setPoints(?array $points): void
    {
        $this->points = $points;
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