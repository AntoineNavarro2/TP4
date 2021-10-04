<?php

namespace App\Entity;

use App\Repository\IntervenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=IntervenantRepository::class)
 */
class Intervenant
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $specialiteprofessionnelle;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="fk_intervenat")
     */
    private $yes;

    public function __construct()
    {
        $this->yes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getSpecialiteprofessionnelle(): ?string
    {
        return $this->specialiteprofessionnelle;
    }

    public function setSpecialiteprofessionnelle(?string $specialiteprofessionnelle): self
    {
        $this->specialiteprofessionnelle = $specialiteprofessionnelle;

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getYes(): Collection
    {
        return $this->yes;
    }

    public function addYe(Matiere $ye): self
    {
        if (!$this->yes->contains($ye)) {
            $this->yes[] = $ye;
            $ye->setFkIntervenat($this);
        }

        return $this;
    }

    public function removeYe(Matiere $ye): self
    {
        if ($this->yes->removeElement($ye)) {
            // set the owning side to null (unless already changed)
            if ($ye->getFkIntervenat() === $this) {
                $ye->setFkIntervenat(null);
            }
        }

        return $this;
    }
}
