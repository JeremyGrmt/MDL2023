<?php

namespace App\Entity;

use App\Entity\Chambre;
use App\Repository\HotelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HotelRepository::class)]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $adresse = null;

    #[ORM\Column]
    private ?int $cp = null;

    #[ORM\Column(length: 50)]
    #[ORM\Regex(pattern:"/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/", message:"Le mail n'est pas bon")]
    private ?string $mail = null;

    #[ORM\Column(length: 20)]
    private ?string $nom = null;

    #[ORM\Column(length: 10)]
    #[ORM\Regex(pattern:"/^(\+33|0)[1-9](\d{2}){4}$/", message:"Le numéro n'est pas bon")]
    private ?string $tel = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 10)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;
    #[ORM\OneToMany(mappedBy: 'hotel', targetEntity: Chambre::class)]
    private Collection $chambres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
    
    /**
     * @return Collection<int, chambre>
     */
    public function getChambre(): Collection
    {
        return $this->Chambre;
    }

    public function addChambre(Chambre $chambre): self
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres->add($chambre);
            $chambre->setHotel($this);
        }

        return $this;
    }

    public function removeChambre(Chambre $chambre): self
    {
        if ($this->chambres->removeElement($chambre)) {
            // set the owning side to null (unless already changed)
            if ($chambre->getChambre() === $this) {
                $chambre->setHotel(null);
            }
        }

        return $this;
    }
}
