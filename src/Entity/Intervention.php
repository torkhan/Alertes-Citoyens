<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InterventionRepository")
 */
class Intervention
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom d'intervention ne doit pas contenir de caractères spéciaux")
     */
    private $nomIntervention;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom de rue ne doit pas contenir de caractères spéciaux")
     */
    private $rueIntervention;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom de ville ne doit pas contenir de caractères spéciaux")
     */
    private $villeIntervention;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $longitude;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $latitude;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDebutIntervention;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFinIntervention;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $commentaireIntervention;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModificationIntervention;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeIntervention", inversedBy="interventions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idTypeIntervention;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="idIntervention", orphanRemoval=true)
     */
    private $messages;

    public function __construct()
    {
        $this->messages = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomIntervention(): ?string
    {
        return $this->nomIntervention;
    }

    public function setNomIntervention(?string $nomIntervention): self
    {
        $this->nomIntervention = $nomIntervention;

        return $this;
    }

    public function getRueIntervention(): ?string
    {
        return $this->rueIntervention;
    }

    public function setRueIntervention(?string $rueIntervention): self
    {
        $this->rueIntervention = $rueIntervention;

        return $this;
    }

    public function getVilleIntervention(): ?string
    {
        return $this->villeIntervention;
    }

    public function setVilleIntervention(?string $villeIntervention): self
    {
        $this->villeIntervention = $villeIntervention;

        return $this;
    }

    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    public function setLongitude(?string $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    public function setLatitude(?string $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getDateDebutIntervention(): ?\DateTimeInterface
    {
        return $this->dateDebutIntervention;
    }

    public function setDateDebutIntervention(?\DateTimeInterface $dateDebutIntervention): self
    {
        $this->dateDebutIntervention = $dateDebutIntervention;

        return $this;
    }

    public function getDateFinIntervention(): ?\DateTimeInterface
    {
        return $this->dateFinIntervention;
    }

    public function setDateFinIntervention(?\DateTimeInterface $dateFinIntervention): self
    {
        $this->dateFinIntervention = $dateFinIntervention;

        return $this;
    }

    public function getCommentaireIntervention(): ?string
    {
        return $this->commentaireIntervention;
    }

    public function setCommentaireIntervention(?string $commentaireIntervention): self
    {
        $this->commentaireIntervention = $commentaireIntervention;

        return $this;
    }

    public function getDateModificationIntervention(): ?\DateTimeInterface
    {
        return $this->dateModificationIntervention;
    }

    public function setDateModificationIntervention(?\DateTimeInterface $dateModificationIntervention): self
    {
        $this->dateModificationIntervention = $dateModificationIntervention;

        return $this;
    }

    public function getIdTypeIntervention(): ?TypeIntervention
    {
        return $this->idTypeIntervention;
    }

    public function setIdTypeIntervention(?TypeIntervention $idTypeIntervention): self
    {
        $this->idTypeIntervention = $idTypeIntervention;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setIdIntervention($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getIdIntervention() === $this) {
                $message->setIdIntervention(null);
            }
        }

        return $this;
    }


}
