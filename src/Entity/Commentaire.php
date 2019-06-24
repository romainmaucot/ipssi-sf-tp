<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentaireRepository")
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Joueur", inversedBy="commentaires")
     */
    private $id_joueur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Conference", inversedBy="commentaires")
     */
    private $id_conference;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publish_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdJoueur(): ?Joueur
    {
        return $this->id_joueur;
    }

    public function setIdJoueur(?Joueur $id_joueur): self
    {
        $this->id_joueur = $id_joueur;

        return $this;
    }

    public function getIdConference(): ?Conference
    {
        return $this->id_conference;
    }

    public function setIdConference(?Conference $id_conference): self
    {
        $this->id_conference = $id_conference;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublishDate(): ?\DateTimeInterface
    {
        return $this->publish_date;
    }

    public function setPublishDate(\DateTimeInterface $publish_date): self
    {
        $this->publish_date = $publish_date;

        return $this;
    }
}
