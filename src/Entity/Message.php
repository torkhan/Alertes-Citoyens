<?php

namespace App\Entity;

use App\Form\InterventionType;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $contenuMessage;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateEnvoi;

    /**
     * @ORM\Column(type="blob", nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $statutMessage;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $image1;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $image2;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $image3;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModificationMessage;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux")
     */
    private $commentaireMessage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="messages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idUtilisateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeMessage", inversedBy="messages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idTypeMessage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Destinataire", inversedBy="messages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idDestinataire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Intervention", inversedBy="messages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idIntervention;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeIntervention", inversedBy="messages")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idTypeIntervention;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDebutIntervention;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFinIntervention;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenuMessage(): ?string
    {
        return $this->contenuMessage;
    }

    public function setContenuMessage(?string $contenuMessage): self
    {
        $this->contenuMessage = $contenuMessage;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(?\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    public function getStatutMessage()
    {
        return $this->statutMessage;
    }

    public function setStatutMessage($statutMessage): self
    {
        $this->statutMessage = $statutMessage;

        return $this;
    }

    public function getImage1(): ?string
    {
        return $this->image1;
    }

    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    public function getImage2(): ?string
    {
        return $this->image2;
    }

    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    public function getImage3(): ?string
    {
        return $this->image3;
    }

    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    public function getDateModificationMessage(): ?\DateTimeInterface
    {
        return $this->dateModificationMessage;
    }

    public function setDateModificationMessage(?\DateTimeInterface $dateModificationMessage): self
    {
        $this->dateModificationMessage = $dateModificationMessage;

        return $this;
    }

    public function getCommentaireMessage(): ?string
    {
        return $this->commentaireMessage;
    }

    public function setCommentaireMessage(?string $commentaireMessage): self
    {
        $this->commentaireMessage = $commentaireMessage;

        return $this;
    }

    public function getIdUtilisateur(): ?User
    {
        return $this->idUtilisateur;
    }

    public function setIdUtilisateur(?User $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    public function getIdTypeMessage(): ?TypeMessage
    {
        return $this->idTypeMessage;
    }

    public function setIdTypeMessage(?TypeMessage $idTypeMessage): self
    {
        $this->idTypeMessage = $idTypeMessage;

        return $this;
    }

    public function getIdDestinataire(): ?Destinataire
    {
        return $this->idDestinataire;
    }

    public function setIdDestinataire(?Destinataire $idDestinataire): self
    {
        $this->idDestinataire = $idDestinataire;

        return $this;
    }

    public function getIdIntervention(): ?Intervention
    {
        return $this->idIntervention;
    }

    public function setIdIntervention(?Intervention $idIntervention): self
    {
        $this->idIntervention = $idIntervention;

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
}
