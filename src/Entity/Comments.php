<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publish_date;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     */
    private $censored;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Articles", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $article_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCensored(): ?bool
    {
        return $this->censored;
    }

    public function setCensored(bool $censored): self
    {
        $this->censored = $censored;

        return $this;
    }

    public function getArticleId(): ?Articles
    {
        return $this->article_id;
    }

    public function setArticleId(Articles $article_id): self
    {
        $this->article_id = $article_id;

        return $this;
    }
}
