<?php

namespace App\Entity;

use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiFilter;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\QualiteRepository;
use Symfony\Component\Serializer\Annotation\Groups;
#[ApiResource(operations: [new Get(normalizationContext: ['groups' => 'qualite:item']), new GetCollection(normalizationContext: ['groups' => 'qualite:list'])], paginationEnabled: false)]
#[ORM\Table(name: "QUALITE")]
#[ORM\Entity(repositoryClass: QualiteRepository::class)]
class Qualite
{
    #[ORM\Column(name: "ID", type: "integer", nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "SEQUENCE")]
    #[ORM\SequenceGenerator(sequenceName: "QUALITE_ID_seq", allocationSize: 1, initialValue: 1)]
    #[Groups(['qualite:list', 'qualite:item'])]
    private $id;
    #[ORM\Column(name: "LIBELLEQUALITE", type: "string", length: 50, nullable: false)]
    #[Groups(['qualite:list', 'qualite:item'])]
    private $libellequalite;
    public function getId() : ?int
    {
        return $this->id;
    }
    public function getLibellequalite() : ?string
    {
        return $this->libellequalite;
    }
    public function setLibellequalite(string $libellequalite) : self
    {
        $this->libellequalite = $libellequalite;
        return $this;
    }
}
