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
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateDebutIntervention;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateFinIntervention;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeIntervention", inversedBy="interventions")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idTypeIntervention;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getContenuMessage(): ?string
    {
        return $this->contenuMessage;
    }

    /**
     * @param string|null $contenuMessage
     * @return $this
     */
    public function setContenuMessage(?string $contenuMessage): self
    {
        $this->contenuMessage = $contenuMessage;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    /**
     * @param \DateTimeInterface|null $dateEnvoi
     * @return $this
     */
    public function setDateEnvoi(?\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatutMessage()
    {
        return $this->statutMessage;
    }

    /**
     * @param $statutMessage
     * @return $this
     */
    public function setStatutMessage($statutMessage): self
    {
        $this->statutMessage = $statutMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage1(): ?string
    {
        return $this->image1;
    }

    /**
     * @param string|null $image1
     * @return $this
     */
    public function setImage1(?string $image1): self
    {
        $this->image1 = $image1;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage2(): ?string
    {
        return $this->image2;
    }

    /**
     * @param string|null $image2
     * @return $this
     */
    public function setImage2(?string $image2): self
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getImage3(): ?string
    {
        return $this->image3;
    }

    /**
     * @param string|null $image3
     * @return $this
     */
    public function setImage3(?string $image3): self
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateModificationMessage(): ?\DateTimeInterface
    {
        return $this->dateModificationMessage;
    }

    /**
     * @param \DateTimeInterface|null $dateModificationMessage
     * @return $this
     */
    public function setDateModificationMessage(?\DateTimeInterface $dateModificationMessage): self
    {
        $this->dateModificationMessage = $dateModificationMessage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCommentaireMessage(): ?string
    {
        return $this->commentaireMessage;
    }

    /**
     * @param string|null $commentaireMessage
     * @return $this
     */
    public function setCommentaireMessage(?string $commentaireMessage): self
    {
        $this->commentaireMessage = $commentaireMessage;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getIdUtilisateur(): ?User
    {
        return $this->idUtilisateur;
    }

    /**
     * @param User|null $idUtilisateur
     * @return $this
     */
    public function setIdUtilisateur(?User $idUtilisateur): self
    {
        $this->idUtilisateur = $idUtilisateur;

        return $this;
    }

    /**
     * @return TypeMessage|null
     */
    public function getIdTypeMessage(): ?TypeMessage
    {
        return $this->idTypeMessage;
    }

    /**
     * @param TypeMessage|null $idTypeMessage
     * @return $this
     */
    public function setIdTypeMessage(?TypeMessage $idTypeMessage): self
    {
        $this->idTypeMessage = $idTypeMessage;

        return $this;
    }

    /**
     * @return Destinataire|null
     */
    public function getIdDestinataire(): ?Destinataire
    {
        return $this->idDestinataire;
    }

    /**
     * @param Destinataire|null $idDestinataire
     * @return $this
     */
    public function setIdDestinataire(?Destinataire $idDestinataire): self
    {
        $this->idDestinataire = $idDestinataire;

        return $this;
    }

    /**
     * @return Intervention|null
     */
    public function getIdIntervention(): ?Intervention
    {
        return $this->idIntervention;
    }

    /**
     * @param Intervention|null $idIntervention
     * @return $this
     */
    public function setIdIntervention(?Intervention $idIntervention): self
    {
        $this->idIntervention = $idIntervention;

        return $this;
    }

    /**
     * @return TypeIntervention|null
     */
    public function getIdTypeIntervention(): ?TypeIntervention
    {
        return $this->idTypeIntervention;
    }

    /**
     * @param TypeIntervention|null $idTypeIntervention
     * @return $this
     */
    public function setIdTypeIntervention(?TypeIntervention $idTypeIntervention): self
    {
        $this->idTypeIntervention = $idTypeIntervention;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateDebutIntervention(): ?\DateTimeInterface
    {
        return $this->dateDebutIntervention;
    }

    /**
     * @param \DateTimeInterface|null $dateDebutIntervention
     * @return $this
     */
    public function setDateDebutIntervention(?\DateTimeInterface $dateDebutIntervention): self
    {
        $this->dateDebutIntervention = $dateDebutIntervention;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDateFinIntervention(): ?\DateTimeInterface
    {
        return $this->dateFinIntervention;
    }

    /**
     * @param \DateTimeInterface|null $dateFinIntervention
     * @return $this
     */
    public function setDateFinIntervention(?\DateTimeInterface $dateFinIntervention): self
    {
        $this->dateFinIntervention = $dateFinIntervention;

        return $this;
    }
}
