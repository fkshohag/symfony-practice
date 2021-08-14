<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titile;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitile(): ?string
    {
        return $this->titile;
    }

    public function setTitile(string $titile): self
    {
        $this->titile = $titile;

        return $this;
    }
}
