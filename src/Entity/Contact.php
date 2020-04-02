<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux '!?;=. autorisés")
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux '!?;=. autorisés")
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\Regex(pattern="/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", message="Votre mail doit être au format xxxx@yyyy.zz")
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux '!?;=. autorisés")
     */
    private $message;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/[a-zA-Z0-9,. \""éèêçàùï=;!?]+$/", message="Le champs ne doit pas contenir de caractères spéciaux '!?;=. autorisés")
     */
    private $sujet;

    /**
     * @ORM\Column(type="datetime")
     */

    private $dateEnvoi;

    public function __construct()
    {
        $this->dateEnvoi = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getSujet(): ?string
    {
        return $this->sujet;
    }

    public function setSujet(string $sujet): self
    {
        $this->sujet = $sujet;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): self
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }
}
