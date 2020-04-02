<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeDestinataireRepository")
 */
class TypeDestinataire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le type  ne doit pas contenir de caractères spéciaux")
     */
    private $destinataireType;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Destinataire", mappedBy="idTypeDestinataire", orphanRemoval=true)
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

    public function getDestinataireType(): ?string
    {
        return $this->destinataireType;
    }

    public function setDestinataireType(?string $destinataireType): self
    {
        $this->destinataireType = $destinataireType;

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
            $destinataire->setIdTypeDestinataire($this);
        }

        return $this;
    }

    public function removeDestinataire(Destinataire $destinataire): self
    {
        if ($this->destinataires->contains($destinataire)) {
            $this->destinataires->removeElement($destinataire);
            // set the owning side to null (unless already changed)
            if ($destinataire->getIdTypeDestinataire() === $this) {
                $destinataire->setIdTypeDestinataire(null);
            }
        }

        return $this;
    }
}
