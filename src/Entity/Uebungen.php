<?php

namespace App\Entity;

use App\Repository\UebungenRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UebungenRepository::class)]
class Uebungen
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    #[ORM\Column]
    private ?float $sets = null;

    #[ORM\Column]
    private ?float $repetitions = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getSets(): ?float
    {
        return $this->sets;
    }

    public function setSets(float $sets): static
    {
        $this->sets = $sets;

        return $this;
    }

    public function getRepetitions(): ?float
    {
        return $this->repetitions;
    }

    public function setRepetitions(float $repetitions): static
    {
        $this->repetitions = $repetitions;

        return $this;
    }
}
