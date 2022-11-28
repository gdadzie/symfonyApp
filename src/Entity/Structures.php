<?php

namespace App\Entity;

use App\Repository\StructuresRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructuresRepository::class)]
class Structures
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\ManyToOne(inversedBy: 'structure_id')]
    private ?user $user_id = null;

    #[ORM\ManyToOne(inversedBy: 'structures')]
    public ?Apiclients $apiclients_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getUserId(): ?user
    {
        return $this->user_id;
    }

    public function setUserId(?user $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getApiclientsId(): ?Apiclients
    {
        return $this->apiclients_id;
    }

    public function setApiclientsId(?Apiclients $apiclients_id): self
    {
        $this->apiclients_id = $apiclients_id;

        return $this;
    }
}
