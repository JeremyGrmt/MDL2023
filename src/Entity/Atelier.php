<?php

namespace App\Entity;

use App\Repository\AtelierRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelleAtelier = null;

    #[ORM\Column]
    private ?int $nbPlacesMaxi = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleAtelier(): ?string
    {
        return $this->libelleAtelier;
    }

    public function setLibelleAtelier(string $libelleAtelier): self
    {
        $this->libelleAtelier = $libelleAtelier;

        return $this;
    }

    public function getNbPlacesMaxi(): ?int
    {
        return $this->nbPlacesMaxi;
    }

    public function setNbPlacesMaxi(int $nbPlacesMaxi): self
    {
        $this->nbPlacesMaxi = $nbPlacesMaxi;

        return $this;
    }
}
