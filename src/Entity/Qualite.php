<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Qualite
 *
 * @ORM\Table(name="QUALITE")
 * @ORM\Entity
 */
class Qualite
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="QUALITE_ID_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBELLEQUALITE", type="string", length=50, nullable=false)
     */
    private $libellequalite;


}
