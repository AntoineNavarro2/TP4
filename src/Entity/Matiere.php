<?php

namespace App\Entity;

use App\Repository\MatiereRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MatiereRepository::class)
 */
class Matiere
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1000)
     */
    private $intitule;

    /**
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @ORM\ManyToOne(targetEntity=Intervenant::class, inversedBy="yes")
     */
    private $fk_intervenat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matieres;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIntitule(): ?string
    {
        return $this->intitule;
    }

    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(int $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getFkIntervenat(): ?Intervenant
    {
        return $this->fk_intervenat;
    }

    public function setFkIntervenat(?Intervenant $fk_intervenat): self
    {
        $this->fk_intervenat = $fk_intervenat;

        return $this;
    }

    public function getMatieres(): ?string
    {
        return $this->matieres;
    }

    public function setMatieres(string $matieres): self
    {
        $this->matieres = $matieres;

        return $this;
    }
}
