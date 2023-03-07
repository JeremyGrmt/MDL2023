<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table(name="CLUB")
 * @ORM\Entity
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="CLUB_ID_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NOM", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="ADRESSE1", type="string", length=60, nullable=false)
     */
    private $adresse1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ADRESSE2", type="string", length=60, nullable=true)
     */
    private $adresse2;

    /**
     * @var string
     *
     * @ORM\Column(name="CP", type="string", length=5, nullable=false, options={"fixed"=true})
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="VILLE", type="string", length=60, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="TEL", type="string", length=14, nullable=false, options={"fixed"=true})
     */
    private $tel;


}
