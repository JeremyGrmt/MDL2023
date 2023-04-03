<?php

namespace App\Entity;

use App\Repository\InscritionAtelierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscritionAtelierRepository::class)]
class InscritionAtelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: atelier::class, inversedBy: 'inscritionAteliers')]
    private Collection $atelier;

    #[ORM\ManyToMany(targetEntity: inscription::class, inversedBy: 'inscritionAteliers')]
    private Collection $inscription;

    public function __construct()
    {
        $this->atelier = new ArrayCollection();
        $this->inscription = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
     * @return Collection<int, inscription>
     */
    public function getInscription(): Collection
    {
        return $this->inscription;
    }

    public function addInscription(inscription $inscription): self
    {
        if (!$this->inscription->contains($inscription)) {
            $this->inscription->add($inscription);
        }

        return $this;
    }

    public function removeInscription(inscription $inscription): self
    {
        $this->inscription->removeElement($inscription);

        return $this;
    }
}
