<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoryRepository")
 */
class History
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_start;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_end;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\People")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cve_people;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Films")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cve_film;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTimeInterface $date_start): self
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): self
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCvePeople(): ?People
    {
        return $this->cve_people;
    }

    public function setCvePeople(?People $cve_people): self
    {
        $this->cve_people = $cve_people;

        return $this;
    }

    public function getCveFilm(): ?Films
    {
        return $this->cve_film;
    }

    public function setCveFilm(?Films $cve_film): self
    {
        $this->cve_film = $cve_film;

        return $this;
    }
}
