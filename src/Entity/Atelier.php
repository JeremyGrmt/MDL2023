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

    #[ORM\ManyToMany(targetEntity: theme::class, inversedBy: 'ateliers')]
    private Collection $theme;

    #[ORM\ManyToMany(targetEntity: vacation::class, inversedBy: 'ateliers')]
    private Collection $vacation;

    #[ORM\ManyToMany(targetEntity: InscritionAtelier::class, mappedBy: 'atelier')]
    private Collection $inscritionAteliers;

    public function __construct()
    {
        $this->theme = new ArrayCollection();
        $this->vacation = new ArrayCollection();
        $this->inscritionAteliers = new ArrayCollection();
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
     * @return Collection<int, InscritionAtelier>
     */
    public function getInscritionAteliers(): Collection
    {
        return $this->inscritionAteliers;
    }

    public function addInscritionAtelier(InscritionAtelier $inscritionAtelier): self
    {
        if (!$this->inscritionAteliers->contains($inscritionAtelier)) {
            $this->inscritionAteliers->add($inscritionAtelier);
            $inscritionAtelier->addAtelier($this);
        }

        return $this;
    }

    public function removeInscritionAtelier(InscritionAtelier $inscritionAtelier): self
    {
        if ($this->inscritionAteliers->removeElement($inscritionAtelier)) {
            $inscritionAtelier->removeAtelier($this);
        }

        return $this;
    }
}
