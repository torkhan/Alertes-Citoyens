<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass="App\Repository\DestinataireRepository")
 */


class Destinataire
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
    private $prenomDestinataire;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux ")
     */
    private $nomDestinataire;

    /**

     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Regex(pattern="/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", message="Votre mail doit être au format xxxx@yyyy.zz")
     */
    private $adresseMailDestinataire;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Assert\Regex(pattern="/^0[6-7]([-. \/]?[0-9]{2}){4}$/", message="Votre numéro doit être un portable (06 ou 07) et contenir 10 chiffres séparé de '.', de '-' ou d'espaces")
     */
    private $numeroTelephoneDestinataire;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Assert\Regex(pattern="/^[1-9]{1,5}([-. \/])?+([a-zA-Z]{0,3})?$/", message="Votre numéro de rue doit contenir au minimum 1 chiffre, au maximun 5 suivi si besoin de 'bis ou 'ter'")

     */
    private $numeroRueDestinataire;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux '!?;=. autorisés")
     */
    private $nomRueDestinataire1;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux '!?;=. autorisés")
     */
    private $nomRueDestinataire2;



    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $okMailDestinataire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $okSmsDestinataire;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * message = "Veuillez accepter les conditions d'utilisation"
     */
    private $accordRgpdDestinataire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateEnregistrementDestinataire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateValidationDestinataire;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModificationDestinataire;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $statutDestinataire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeDestinataire", inversedBy="destinataires")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idTypeDestinataire;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Validation", inversedBy="destinataires")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idValidation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Adresse", inversedBy="destinataires")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idAdresse;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Motif", inversedBy="destinataires")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idMotif;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="idDestinataire", orphanRemoval=true)
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

    public function getPrenomDestinataire(): ?string
    {
        return $this->prenomDestinataire;
    }

    public function setPrenomDestinataire(?string $prenomDestinataire): self
    {
        $this->prenomDestinataire = $prenomDestinataire;

        return $this;
    }

    public function getNomDestinataire(): ?string
    {
        return $this->nomDestinataire;
    }

    public function setNomDestinataire(?string $nomDestinataire): self
    {
        $this->nomDestinataire = $nomDestinataire;

        return $this;
    }

    public function getAdresseMailDestinataire(): ?string
    {
        return $this->adresseMailDestinataire;
    }

    public function setAdresseMailDestinataire(?string $adresseMailDestinataire): self
    {
        $this->adresseMailDestinataire = $adresseMailDestinataire;

        return $this;
    }

    public function getNumeroTelephoneDestinataire(): ?string
    {
        return $this->numeroTelephoneDestinataire;
    }

    public function setNumeroTelephoneDestinataire(?string $numeroTelephoneDestinataire): self
    {
        $this->numeroTelephoneDestinataire = $numeroTelephoneDestinataire;

        return $this;
    }

    public function getNumeroRueDestinataire(): ?string
    {
        return $this->numeroRueDestinataire;
    }

    public function setNumeroRueDestinataire(?string $numeroRueDestinataire): self
    {
        $this->numeroRueDestinataire = $numeroRueDestinataire;

        return $this;
    }

    public function getNomRueDestinataire1(): ?string
    {
        return $this->nomRueDestinataire1;
    }

    public function setNomRueDestinataire1(?string $nomRueDestinataire1): self
    {
        $this->nomRueDestinataire1 = $nomRueDestinataire1;

        return $this;
    }

    public function getNomRueDestinataire2(): ?string
    {
        return $this->nomRueDestinataire2;
    }

    public function setNomRueDestinataire2(?string $nomRueDestinataire2): self
    {
        $this->nomRueDestinataire2 = $nomRueDestinataire2;

        return $this;
    }



    public function getOkMailDestinataire()
    {
        return $this->okMailDestinataire;
    }

    public function setOkMailDestinataire($okMailDestinataire): self
    {
        $this->okMailDestinataire = $okMailDestinataire;

        return $this;
    }

    public function getOkSmsDestinataire()
    {
        return $this->okSmsDestinataire;
    }

    public function setOkSmsDestinataire($okSmsDestinataire): self
    {
        $this->okSmsDestinataire = $okSmsDestinataire;

        return $this;
    }
    public function getAccordRgpdDestinataire()
    {
        return $this->accordRgpdDestinataire;
    }

    public function setAccordRgpdDestinataire($accordRgpdDestinataire): self
    {
        $this->accordRgpdDestinataire = $accordRgpdDestinataire;

        return $this;
    }

    public function getDateEnregistrementDestinataire(): ?\DateTimeInterface
    {
        return $this->dateEnregistrementDestinataire;
    }

    public function setDateEnregistrementDestinataire(?\DateTimeInterface $dateEnregistrementDestinataire): self
    {
        $this->dateEnregistrementDestinataire = $dateEnregistrementDestinataire;

        return $this;
    }

    public function getDateValidationDestinataire(): ?\DateTimeInterface
    {
        return $this->dateValidationDestinataire;
    }

    public function setDateValidationDestinataire(?\DateTimeInterface $dateValidationDestinataire): self
    {
        $this->dateValidationDestinataire = $dateValidationDestinataire;

        return $this;
    }

    public function getDateModificationDestinataire(): ?\DateTimeInterface
    {
        return $this->dateModificationDestinataire;
    }

    public function setDateModificationDestinataire(?\DateTimeInterface $dateModificationDestinataire): self
    {
        $this->dateModificationDestinataire = $dateModificationDestinataire;

        return $this;
    }

    public function getStatutDestinataire()
    {
        return $this->statutDestinataire;
    }

    public function setStatutDestinataire($statutDestinataire): self
    {
        $this->statutDestinataire = $statutDestinataire;

        return $this;
    }

    public function getIdTypeDestinataire(): ?TypeDestinataire
    {
        return $this->idTypeDestinataire;
    }

    public function setIdTypeDestinataire(?TypeDestinataire $idTypeDestinataire): self
    {
        $this->idTypeDestinataire = $idTypeDestinataire;

        return $this;
    }

    public function getIdValidation(): ?Validation
    {
        return $this->idValidation;
    }

    public function setIdValidation(?Validation $idValidation): self
    {
        $this->idValidation = $idValidation;

        return $this;
    }

    public function getIdAdresse(): ?Adresse
    {
        return $this->idAdresse;
    }

    public function setIdAdresse(?Adresse $idAdresse): self
    {
        $this->idAdresse = $idAdresse;

        return $this;
    }

    public function getIdMotif(): ?Motif
    {
        return $this->idMotif;
    }

    public function setIdMotif(?Motif $idMotif): self
    {
        $this->idMotif = $idMotif;

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
            $message->setIdDestinataire($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getIdDestinataire() === $this) {
                $message->setIdDestinataire(null);
            }
        }

        return $this;
    }

}
