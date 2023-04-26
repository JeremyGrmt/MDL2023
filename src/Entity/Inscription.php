<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    private ?Chambre $chambre = null;

    #[ORM\ManyToOne(inversedBy: 'inscriptions')]
    private ?Restauration $restauration = null;

    #[ORM\ManyToMany(targetEntity: atelier::class, inversedBy: 'inscriptions')]
    private Collection $atelier;

    public function __construct()
    {
        $this->atelier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getChambre(): ?Chambre
    {
        return $this->chambre;
    }

    public function setChambre(?Chambre $chambre): self
    {
        $this->chambre = $chambre;

        return $this;
    }

    public function getRestauration(): ?Restauration
    {
        return $this->restauration;
    }

    public function setRestauration(?Restauration $restauration): self
    {
        $this->restauration = $restauration;

        return $this;
    }

    /**
     * @return Collection<int, atelier>
     */
    public function getAtelier(): Collection
    {
        return $this->atelier;
    }

    public function addAtelier(atelier $atelier): self
    {
        if (!$this->atelier->contains($atelier)) {
            $this->atelier->add($atelier);
        }

        return $this;
    }

    public function removeAtelier(atelier $atelier): self
    {
        $this->atelier->removeElement($atelier);

        return $this;
    }
}
