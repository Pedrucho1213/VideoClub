<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user;

    /**
     * @ORM\Column(type="text")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $role;

    /**
     * @ORM\Column(type="text")
     */
    private $photo_path;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\People", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $cve_people;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?string
    {
        return $this->user;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRole(): ?bool
    {
        return $this->role;
    }

    public function setRole(bool $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getPhotoPath(): ?string
    {
        return $this->photo_path;
    }

    public function setPhotoPath(string $photo_path): self
    {
        $this->photo_path = $photo_path;

        return $this;
    }

    public function getRegistre(): ?\DateTimeInterface
    {
        return $this->registre;
    }

    public function setRegistre(\DateTimeInterface $registre): self
    {
        $this->registre = $registre;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCvePeople(): ?People
    {
        return $this->cve_people;
    }

    public function setCvePeople(People $cve_people): self
    {
        $this->cve_people = $cve_people;

        return $this;
    }
}
