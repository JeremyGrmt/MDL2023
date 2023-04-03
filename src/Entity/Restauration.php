<?php

namespace App\Entity;

use App\Repository\RestaurationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurationRepository::class)]
class Restauration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_restauration = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDateRestauration(): ?\DateTimeInterface
    {
        return $this->date_restauration;
    }

    public function setDateRestauration(\DateTimeInterface $date_restauration): self
    {
        $this->date_restauration = $date_restauration;

        return $this;
    }
}
