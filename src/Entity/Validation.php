<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ValidationRepository")
 */
class Validation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $etatValidation;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Destinataire", mappedBy="idValidation", orphanRemoval=true)
     */
    private $destinataires;

    public function __construct()
    {
        $this->destinataires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEtatValidation(): ?string
    {
        return $this->etatValidation;
    }

    public function setEtatValidation(?string $etatValidation): self
    {
        $this->etatValidation = $etatValidation;

        return $this;
    }

    /**
     * @return Collection|Destinataire[]
     */
    public function getDestinataires(): Collection
    {
        return $this->destinataires;
    }

    public function addDestinataire(Destinataire $destinataire): self
    {
        if (!$this->destinataires->contains($destinataire)) {
            $this->destinataires[] = $destinataire;
            $destinataire->setIdValidation($this);
        }

        return $this;
    }

    public function removeDestinataire(Destinataire $destinataire): self
    {
        if ($this->destinataires->contains($destinataire)) {
            $this->destinataires->removeElement($destinataire);
            // set the owning side to null (unless already changed)
            if ($destinataire->getIdValidation() === $this) {
                $destinataire->setIdValidation(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->etatValidation;
    }
}
