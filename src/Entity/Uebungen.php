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

    #[ORM\Column]
    private ?int $plan_id = null;

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

    public function getPlanId(): ?int
    {
        return $this->plan_id;
    }

    public function setPlanId(int $plan_id): static
    {
        $this->plan_id = $plan_id;

        return $this;
    }
}
