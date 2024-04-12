<?php

namespace App\Entity;

use App\Repository\StatsRepository;
use Doctrine\DBAL\Types\Types;
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
    private ?float $setNr = null;

    #[ORM\Column]
    private ?int $repetitions = null;

    #[ORM\Column]
    private ?int $uebung_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

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

    public function getSetNr(): ?float
    {
        return $this->setNr;
    }

    public function setSetNr(float $setNr): static
    {
        $this->setNr = $setNr;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
