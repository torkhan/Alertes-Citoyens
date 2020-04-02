<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ServiceRepository")
 */
class Service
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom du service ne doit pas contenir de caractères spéciaux")
     */
    private $nomService;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le numéro de rue ne doit pas contenir de caractères spéciaux")
     */
    private $numeroRueService;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom de rue ne doit pas contenir de caractères spéciaux")
     */
    private $nomRueService1;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom de rue ne doit pas contenir de caractères spéciaux")
     */
    private $nomRueService2;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le code postal ne doit pas contenir de caractères spéciaux")
     */
    private $cpService;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom de ville ne doit pas contenir de caractères spéciaux")
     */
    private $villeService;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Assert\Regex(pattern="/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", message="Votre mail doit être au format xxxx@yyyy.zz")
     */
    private $adresseMailService;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     * @Assert\Regex(pattern="/^0[1-9]([-. \/]?[0-9]{2}){4}$/", message="Votre numéro doit contenir 10 chiffres séparé de '.', de '-' ou d'espaces")
     */
    private $numeroTelephoneService;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le nom de ville ne doit pas contenir de caractères spéciaux")
     */
    private $commentaireService;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateModificationService;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeService", inversedBy="services")
     * @ORM\JoinColumn(nullable=true)
     */
    private $idTypeService;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="idService", orphanRemoval=true)
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomService(): ?string
    {
        return $this->nomService;
    }

    public function setNomService(?string $nomService): self
    {
        $this->nomService = $nomService;

        return $this;
    }

    public function getNumeroRueService(): ?string
    {
        return $this->numeroRueService;
    }

    public function setNumeroRueService(?string $numeroRueService): self
    {
        $this->numeroRueService = $numeroRueService;

        return $this;
    }

    public function getNomRueService1(): ?string
    {
        return $this->nomRueService1;
    }

    public function setNomRueService1(?string $nomRueService1): self
    {
        $this->nomRueService1 = $nomRueService1;

        return $this;
    }

    public function getNomRueService2(): ?string
    {
        return $this->nomRueService2;
    }

    public function setNomRueService2(?string $nomRueService2): self
    {
        $this->nomRueService2 = $nomRueService2;

        return $this;
    }

    public function getCpService(): ?string
    {
        return $this->cpService;
    }

    public function setCpService(?string $cpService): self
    {
        $this->cpService = $cpService;

        return $this;
    }

    public function getVilleService(): ?string
    {
        return $this->villeService;
    }

    public function setVilleService(?string $villeService): self
    {
        $this->villeService = $villeService;

        return $this;
    }

    public function getAdresseMailService(): ?string
    {
        return $this->adresseMailService;
    }

    public function setAdresseMailService(?string $adresseMailService): self
    {
        $this->adresseMailService = $adresseMailService;

        return $this;
    }

    public function getNumeroTelephoneService(): ?string
    {
        return $this->numeroTelephoneService;
    }

    public function setNumeroTelephoneService(?string $numeroTelephoneService): self
    {
        $this->numeroTelephoneService = $numeroTelephoneService;

        return $this;
    }

    public function getCommentaireService(): ?string
    {
        return $this->commentaireService;
    }

    public function setCommentaireService(?string $commentaireService): self
    {
        $this->commentaireService = $commentaireService;

        return $this;
    }

    public function getDateModificationService(): ?\DateTimeInterface
    {
        return $this->dateModificationService;
    }

    public function setDateModificationService(?\DateTimeInterface $dateModificationService): self
    {
        $this->dateModificationService = $dateModificationService;

        return $this;
    }

    public function getIdTypeService(): ?TypeService
    {
        return $this->idTypeService;
    }

    public function setIdTypeService(?TypeService $idTypeService): self
    {
        $this->idTypeService = $idTypeService;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setIdService($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getIdService() === $this) {
                $user->setIdService(null);
            }
        }

        return $this;
    }


}
