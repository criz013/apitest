<?php

namespace App\Entity;

use App\Repository\UnitKeywordRepository;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Groups;
#[ORM\Entity(repositoryClass: UnitKeywordRepository::class)]
class UnitKeyword
{
    #[ORM\Id, ORM\GeneratedValue, ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Unit::class)]
    #[ORM\JoinColumn(nullable: false, onDelete: "CASCADE")]
    private Unit $unit;

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

    public function getUnit(): Unit
    {
        return $this->unit;
    }

    public function setUnit(Unit $unit): void
    {
        $this->unit = $unit;
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