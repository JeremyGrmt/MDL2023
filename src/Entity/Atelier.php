<?php

namespace App\Entity;

use App\Repository\AtelierRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AtelierRepository::class)]
class Atelier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $nbplaces = null;

    #[ORM\ManyToMany(targetEntity: Theme::class, inversedBy: 'ateliers')]
    private Collection $theme;

    #[ORM\ManyToMany(targetEntity: Vacation::class, inversedBy: 'ateliers')]
    private Collection $vacation;

    #[ORM\ManyToMany(targetEntity: Inscription::class, mappedBy: 'ateliers')]
    private Collection $inscriptions;


    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->vacation = new ArrayCollection();
        $this->inscriptions = new ArrayCollection();
    }


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

    public function getNbplaces(): ?int
    {
        return $this->nbplaces;
    }

    public function setNbplaces(int $nbplaces): self
    {
        $this->nbplaces = $nbplaces;


        return $this;
    }


    /**
     * @return Collection<int, theme>
     */
    public function getTheme(): Collection
    {
        return $this->theme;
    }

    public function addTheme(theme $theme): self
    {
        if (!$this->theme->contains($theme)) {
            $this->theme->add($theme);
        }

        return $this;
    }

    public function removeTheme(theme $theme): self
    {
        $this->theme->removeElement($theme);

        return $this;
    }

    /**
     * @return Collection<int, vacation>
     */
    public function getVacation(): Collection
    {
        return $this->vacation;
    }

    public function addVacation(vacation $vacation): self
    {
        if (!$this->vacation->contains($vacation)) {
            $this->vacation->add($vacation);
        }

        return $this;
    }

    public function removeVacation(vacation $vacation): self
    {
        $this->vacation->removeElement($vacation);

        return $this;
    }

    /**
     * @return Collection<int, Inscription>
     */
    public function getInscriptions(): Collection
    {
        return $this->inscriptions;
    }

    public function addInscription(Inscription $inscription): self
    {
        if (!$this->inscriptions->contains($inscription)) {
            $this->inscriptions->add($inscription);
            $inscription->addAtelier($this);
        }

        return $this;
    }

    public function removeInscription(Inscription $inscription): self
    {
        if ($this->inscriptions->removeElement($inscription)) {
            $inscription->removeAtelier($this);
        }

        return $this;
    }

}
