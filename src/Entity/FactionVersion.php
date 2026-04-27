<?php

namespace App\Entity;

use App\Repository\FactionVersionRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: FactionVersionRepository::class)]
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

    public function getFaction(): Faction
    {
        return $this->faction;
    }

    public function setFaction(Faction $faction): void
    {
        $this->faction = $faction;
    }

    public function getGameVersion(): GameVersion
    {
        return $this->gameVersion;
    }

    public function setGameVersion(GameVersion $gameVersion): void
    {
        $this->gameVersion = $gameVersion;
    }

    public function getRules(): ?array
    {
        return $this->rules;
    }

    public function setRules(?array $rules): void
    {
        $this->rules = $rules;
    }

    public function getBonuses(): ?array
    {
        return $this->bonuses;
    }

    public function setBonuses(?array $bonuses): void
    {
        $this->bonuses = $bonuses;
    }

    public function getRestrictions(): ?array
    {
        return $this->restrictions;
    }

    public function setRestrictions(?array $restrictions): void
    {
        $this->restrictions = $restrictions;
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