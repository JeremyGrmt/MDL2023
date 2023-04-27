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
    private ?Restauration $restauration = null;

    #[ORM\ManyToMany(targetEntity: atelier::class, inversedBy: 'inscriptions')]
    private Collection $atelier;

    #[ORM\OneToMany(mappedBy: 'inscription', targetEntity: Nuite::class)]
    private Collection $nuites;

    public function __construct()
    {
        $this->atelier = new ArrayCollection();
        $this->nuites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getRestaurer(): ?Restauration
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

    /**
     * @return Collection<int, Nuite>
     */
    public function getNuites(): Collection
    {
        return $this->nuites;
    }

    public function addNuite(Nuite $nuite): self
    {
        if (!$this->nuites->contains($nuite)) {
            $this->nuites->add($nuite);
            $nuite->setInscription($this);
        }

        return $this;
    }

    public function removeNuite(Nuite $nuite): self
    {
        if ($this->nuites->removeElement($nuite)) {
            // set the owning side to null (unless already changed)
            if ($nuite->getInscription() === $this) {
                $nuite->setInscription(null);
            }
        }

        return $this;
    }
}