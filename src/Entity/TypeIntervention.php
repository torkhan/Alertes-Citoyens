<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TypeInterventionRepository")
 */
class TypeIntervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux  ")

     */
    private $interventionType;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Intervention", mappedBy="idTypeIntervention", orphanRemoval=true)
     */
    private $interventions;

    public function __construct()
    {
        $this->interventions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInterventionType(): ?string
    {
        return $this->interventionType;
    }

    public function setInterventionType(?string $interventionType): self
    {
        $this->interventionType = $interventionType;

        return $this;
    }

    /**
     * @return Collection|Intervention[]
     */
    public function getInterventions(): Collection
    {
        return $this->interventions;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->interventions->contains($intervention)) {
            $this->interventions[] = $intervention;
            $intervention->setIdTypeIntervention($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        if ($this->interventions->contains($intervention)) {
            $this->interventions->removeElement($intervention);
            // set the owning side to null (unless already changed)
            if ($intervention->getIdTypeIntervention() === $this) {
                $intervention->setIdTypeIntervention(null);
            }
        }

        return $this;
    }
}
