<?php

namespace App\Entity;

use App\Repository\InscriptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InscriptionRepository::class)]
class Inscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_inscription = null;

    #[ORM\ManyToMany(targetEntity: user::class, inversedBy: 'inscriptions')]
    private Collection $user_licence;

    #[ORM\ManyToMany(targetEntity: InscritionAtelier::class, mappedBy: 'inscription')]
    private Collection $inscritionAteliers;

    public function __construct()
    {
        $this->user_licence = new ArrayCollection();
        $this->inscritionAteliers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->date_inscription;
    }

    public function setDateInscription(\DateTimeInterface $date_inscription): self
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    /**
     * @return Collection<int, user>
     */
    public function getUserLicence(): Collection
    {
        return $this->user_licence;
    }

    public function addUserLicence(user $userLicence): self
    {
        if (!$this->user_licence->contains($userLicence)) {
            $this->user_licence->add($userLicence);
        }

        return $this;
    }

    public function removeUserLicence(user $userLicence): self
    {
        $this->user_licence->removeElement($userLicence);

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
            $inscritionAtelier->addInscription($this);
        }

        return $this;
    }

    public function removeInscritionAtelier(InscritionAtelier $inscritionAtelier): self
    {
        if ($this->inscritionAteliers->removeElement($inscritionAtelier)) {
            $inscritionAtelier->removeInscription($this);
        }

        return $this;
    }
}
