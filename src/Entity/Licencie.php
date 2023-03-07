<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Licencie
 *
 * @ORM\Table(name="LICENCIE", uniqueConstraints={@ORM\UniqueConstraint(name="uq_club", columns={"NUMLICENCE"})})
 * @ORM\Entity
 */
class Licencie
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="LICENCIE_ID_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="NUMLICENCE", type="integer", nullable=false)
     */
    private $numlicence;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=70, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="PRENOM", type="string", length=70, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE1", type="string", length=255, nullable=false)
     */
    private $adresse1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE2", type="string", length=255, nullable=true)
     */
    private $adresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="CP", type="string", length=6, nullable=false, options={"fixed"=true})
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="VILLE", type="string", length=70, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="TEL", type="string", length=14, nullable=false, options={"fixed"=true})
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="MAIL", type="string", length=100, nullable=true)
     */
    private $mail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEADHESION", type="date", nullable=false)
     */
    private $dateadhesion;

    /**
     * @var int
     *
     * @ORM\Column(name="IDCLUB", type="integer", nullable=false)
     */
    private $idclub;

    /**
     * @var int
     *
     * @ORM\Column(name="IDQUALITE", type="integer", nullable=false)
     */
    private $idqualite;


}
