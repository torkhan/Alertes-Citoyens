<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MotifRepository")
 */
class Motif
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Votre message ne doit pas contenir de caractères spéciaux")
     */
    private $motifType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Destinataire", mappedBy="idMotif", orphanRemoval=true)
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

    public function getMotifType(): ?string
    {
        return $this->motifType;
    }

    public function setMotifType(?string $motifType): self
    {
        $this->motifType = $motifType;

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
            $destinataire->setIdMotif($this);
        }

        return $this;
    }

    public function removeDestinataire(Destinataire $destinataire): self
    {
        if ($this->destinataires->contains($destinataire)) {
            $this->destinataires->removeElement($destinataire);
            // set the owning side to null (unless already changed)
            if ($destinataire->getIdMotif() === $this) {
                $destinataire->setIdMotif(null);
            }
        }

        return $this;
    }
}
