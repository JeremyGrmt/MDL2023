<?php

namespace App\Entity;

use App\Repository\CompteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: CompteRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Compte implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;


    #[ORM\OneToOne(mappedBy: 'compte', cascade: ['persist', 'remove'])]
    private ?Licencie $licencie = null;

    #[ORM\OneToOne(inversedBy: 'compte', cascade: ['persist', 'remove'])]
    private ?Inscription $inscription = null;

    #[ORM\Column(length: 255)]
    private ?string $numlicence = null;

    public function __construct()
    {
    }
    /**
     * define the id of the user
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * define the id of the user
     *
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     *  define the email of the user
     *
     * @param string $email
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_LICENCIE
        $roles[] = 'ROLE_LICENCIE';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    /**
     * check if the user is verified
     */
    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    /**
     * define if the user is verified
     *
     * @param bool $isVerified
     * @return self
     */
    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * Get the value of licencie
     */
    public function getLicencie(): ?Licencie
    {
        return $this->licencie;
    }

    /**
     * Set the value of licencie
     *
     * @return  self
     */
    public function setLicencie(?Licencie $licencie): self
    {
        // unset the owning side of the relation if necessary
        if ($licencie === null && $this->licencie !== null) {
            $this->licencie->setCompte(null);
        }

        // set the owning side of the relation if necessary
        if ($licencie !== null && $licencie->getCompte() !== $this) {
            $licencie->setCompte($this);
        }

        $this->licencie = $licencie;

        return $this;
    }

    /**
     * Get the value of inscription
     */
    public function getInscription(): ?Inscription
    {
        return $this->inscription;
    }

    public function setInscription(?Inscription $inscription): self
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getNumlicence(): ?string
    {
        return $this->numlicence;
    }

    public function setNumlicence(string $numlicence): self
    {
        $this->numlicence = $numlicence;

        return $this;
    }
}