<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatsRepository::class)]
class Stats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $weight = null;

    #[ORM\Column]
    private ?float $sets = null;

    #[ORM\Column]
    private ?int $repetitions = null;

    #[ORM\Column]
    private ?int $uebung_id = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRepetitions(): ?int
    {
        return $this->repetitions;
    }

    public function setRepetitions(int $repetitions): static
    {
        $this->repetitions = $repetitions;

        return $this;
    }

    public function getUebungId(): ?int
    {
        return $this->uebung_id;
    }

    public function setUebungId(int $uebung_id): static
    {
        $this->uebung_id = $uebung_id;

        return $this;
    }
}
