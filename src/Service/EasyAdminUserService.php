<?php
// src/Service/EasyAdminUserService.php

namespace App\Service;

use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EasyAdminUserService
{
    private $email;
    private $password;
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getUserPasswordHasher(): ?string
    {
        return 'Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface';
    }
    
    public function getUserMenu(): UserMenu
    {
        return UserMenu::new()
            ->displayUserName(true)
            ->setName($this->getEmail())
            ->setGravatarEmail($this->getEmail())
            ->addMenuItems([
                // ...
            ]);
    }

    public function getPasswordHasherName(): ?string
    {
        return null;
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        $this->password = null;
    }

    public function setPasswordEncoded(string $password): void
    {
        $this->password = $this->passwordEncoder->encodePassword($this, $password);
    }

    public function checkPassword(string $password): bool
    {
        return $this->passwordEncoder->isPasswordValid($this, $password);
    }
}