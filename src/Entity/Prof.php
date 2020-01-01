<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProfRepository")
 */
class Prof
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $classe;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Etudient", mappedBy="examen")
     */
    private $etudients;

    public function __construct()
    {
        $this->etudients = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMatiere(): ?string
    {
        return $this->matiere;
    }

    public function setMatiere(string $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }

    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Collection|Etudient[]
     */
    public function getEtudients(): Collection
    {
        return $this->etudients;
    }

    public function addEtudient(Etudient $etudient): self
    {
        if (!$this->etudients->contains($etudient)) {
            $this->etudients[] = $etudient;
            $etudient->setExamen($this);
        }

        return $this;
    }

    public function removeEtudient(Etudient $etudient): self
    {
        if ($this->etudients->contains($etudient)) {
            $this->etudients->removeElement($etudient);
            // set the owning side to null (unless already changed)
            if ($etudient->getExamen() === $this) {
                $etudient->setExamen(null);
            }
        }

        return $this;
    }
    public function __toString(){
        return $this->nom;
        
}
}