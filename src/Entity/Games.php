<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: GamesRepository::class)]
class Games
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['game:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['game:read'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $version = null;

    #[ORM\Column(length: 255)]
    private ?string $editor = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    #[Groups(['game:read'])]
    private ?Army $army = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): ?static
    {
        $this->name = $name;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): ?static
    {
        $this->version = $version;

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(string $editor): ?static
    {
        $this->editor = $editor;

        return $this;
    }

    public function getArmy(): ?Army
    {
        return $this->army;
    }

    public function setArmy(?Army $army): static
    {
        $this->army = $army;

        return $this;
    }
}
