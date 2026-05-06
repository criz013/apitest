<?php

namespace App\Entity;

use App\Repository\FactionKeywordRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
#[ORM\Entity(repositoryClass: FactionKeywordRepository::class)]
class FactionKeyword
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Faction::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Faction $faction;

    #[ORM\ManyToOne(targetEntity: Keyword::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Keyword $keyword;

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

    public function getKeyword(): Keyword
    {
        return $this->keyword;
    }

    public function setKeyword(Keyword $keyword): void
    {
        $this->keyword = $keyword;
    }

}