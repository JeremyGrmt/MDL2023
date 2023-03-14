<?php

namespace App\Entity;

use App\Repository\LicencieRepository;

use ApiPlatform\Metadata\Get;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiFilter;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    collectionOperations: ['get' => ['normalization_context' => ['groups' => 'licencie:list']]],
    itemOperations: ['get' => ['normalization_context' => ['groups' => 'licencie:item']]],
    paginationEnabled: false,
)]

#[ApiFilter(
    SearchFilter::class,
    properties: [
        'numlicense' => 'exact',
        'nom' => 'exact',
        'prenom' => 'exact',
        'adresse1' => 'exact',
        'adresse2' => 'exact',
        'cp' => 'exact',
        'ville' => 'exact',
        'tel' => 'exact',
        'mail' => 'exact',
        'dateadhesion' => 'exact',
        'idclub' => 'exact',
        'idqualite' => 'exact'
        
    ]
)]

    
#[ORM\Table(name: "LICENCIE")]
#[UniqueConstraint(name: "uq_club", columns: ["NUMLICENCE"])]
#[ORM\Entity(repositoryClass: LicencieRepository::class)]
class Licencie
{
    #[ORM\Column(name: "ID", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "SEQUENCE")]
    #[ORM\SequenceGenerator(sequenceName: "LICENCIE_ID_seq", allocationSize: 1, initialValue: 1)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $id;
    #[ORM\Column(name: "NUMLICENCE", type: "integer", nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $numlicence;
    #[ORM\Column(name: "NOM", type: "string", length: 70, nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $nom;
    #[ORM\Column(name: "PRENOM", type: "string", length: 70, nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $prenom;
    #[ORM\Column(name: "ADRESSE1", type: "string", length: 255, nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $adresse1;
    #[ORM\Column(name: "ADRESSE2", type: "string", length: 255, nullable: true)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $adresse2;
    #[ORM\Column(name: "CP", type: "string", length: 6, nullable: false, options: ["fixed" => true])]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $cp;
    #[ORM\Column(name: "VILLE", type: "string", length: 70, nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $ville;
    #[ORM\Column(name: "TEL", type: "string", length: 14, nullable: false, options: ["fixed" => true])]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $tel;
    #[ORM\Column(name: "MAIL", type: "string", length: 100, nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $mail;
    #[ORM\Column(name: "DATEADHESION", type: "datetime", nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $dateadhesion;
    #[ORM\Column(name: "IDCLUB", type: "integer", nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $idclub;
    #[ORM\Column(name: "IDQUALITE", type: "integer", nullable: false)]
    #[Groups(['licencie:list', 'licencie:item'])]
    private $idqualite;
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getNumlicence() : ?int
    {
        return $this->numlicence;
    }
    public function setNumlicence(int $numlicence) : self
    {
        $this->numlicence = $numlicence;
        return $this;
    }
    public function getNom() : ?string
    {
        return $this->nom;
    }
    public function setNom(string $nom) : self
    {
        $this->nom = $nom;
        return $this;
    }
    public function getPrenom() : ?string
    {
        return $this->prenom;
    }
    public function setPrenom(string $prenom) : self
    {
        $this->prenom = $prenom;
        return $this;
    }
    public function getAdresse1() : ?string
    {
        return $this->adresse1;
    }
    public function setAdresse1(string $adresse1) : self
    {
        $this->adresse1 = $adresse1;
        return $this;
    }
    public function getAdresse2() : ?string
    {
        return $this->adresse2;
    }
    public function setAdresse2(?string $adresse2) : self
    {
        $this->adresse2 = $adresse2;
        return $this;
    }
    public function getCp() : ?string
    {
        return $this->cp;
    }
    public function setCp(string $cp) : self
    {
        $this->cp = $cp;
        return $this;
    }
    public function getVille() : ?string
    {
        return $this->ville;
    }
    public function setVille(string $ville) : self
    {
        $this->ville = $ville;
        return $this;
    }
    public function getTel() : ?string
    {
        return $this->tel;
    }
    public function setTel(string $tel) : self
    {
        $this->tel = $tel;
        return $this;
    }
    public function getMail() : ?string
    {
        return $this->mail;
    }
    public function setMail(string $mail) : self
    {
        $this->mail = $mail;
        return $this;
    }
    public function getDateadhesion() : ?\DateTimeInterface
    {
        return $this->dateadhesion;
    }
    public function setDateadhesion(\DateTimeInterface $dateadhesion) : self
    {
        $this->dateadhesion = $dateadhesion;
        return $this;
    }
    public function getIdclub() : ?int
    {
        return $this->idclub;
    }
    public function setIdclub(int $idclub) : self
    {
        $this->idclub = $idclub;
        return $this;
    }
    public function getIdqualite() : ?int
    {
        return $this->idqualite;
    }
    public function setIdqualite(int $idqualite) : self
    {
        $this->idqualite = $idqualite;
        return $this;
    }
}
