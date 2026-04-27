<?php

namespace App\Entity;

use App\Repository\SubFactionVersionRepository;
use Doctrine\ORM\Mapping as ORM;
#[ORM\Entity(repositoryClass: SubFactionVersionRepository::class)]
#[ORM\UniqueConstraint(name: "uniq_subfaction_version", columns: ["sub_faction_id", "game_version_id"])]
class SubFactionVersion
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: SubFaction::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private SubFaction $subFaction;

    #[ORM\ManyToOne(targetEntity: GameVersion::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private GameVersion $gameVersion;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $rules = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $bonuses = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $restrictions = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $modifiers = null;

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

    public function getSubFaction(): SubFaction
    {
        return $this->subFaction;
    }

    public function setSubFaction(SubFaction $subFaction): void
    {
        $this->subFaction = $subFaction;
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

    public function getModifiers(): ?array
    {
        return $this->modifiers;
    }

    public function setModifiers(?array $modifiers): void
    {
        $this->modifiers = $modifiers;
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