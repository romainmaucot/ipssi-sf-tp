<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\CaseRoulette;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GameRepository")
 */
class Game
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $started;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", inversedBy="games")
     */
    private $users;

    /**
     * @ORM\Column(type="integer")
     */
    private $Amount;

    /**
     * @ORM\Column(type="integer")
     */
    private $bet;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStarted(): ?\DateTimeInterface
    {
        return $this->started;
    }

    public function setStarted(\DateTimeInterface $started): self
    {
        $this->started = $started;

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
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
        }

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->Amount;
    }

    public function setAmount(int $Amount): self
    {
        $this->Amount = $Amount;

        return $this;
    }

    public function getCases(): array
    {
        $casesNumber = [32,15,19,4,21,2,25,17,34,6,27,13,36,11,30,8,
            23,10,5,24,16,33,1,20,14,31,9,22,18,29,7,28,12,35,3,26];

        $cases = [new CaseRoulette(0, 'Vert')];
        $isOdd = true;
        foreach ($casesNumber as $num)
        {
            $cases[] = new CaseRoulette($num, $isOdd ? 'Rouge' : 'Noir');
            $isOdd = !$isOdd;
        }

        return $cases;
    }

    public function getBet(): ?int
    {
        return $this->bet;
    }

    public function setBet(int $bet): self
    {
        $this->bet = $bet;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
