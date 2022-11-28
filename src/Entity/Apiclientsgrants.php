<?php

namespace App\Entity;

use App\Repository\ApiclientsgrantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiclientsgrantsRepository::class)]
class Apiclientsgrants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $install_id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $perms = null;

    #[ORM\Column(nullable: true)]
    private ?int $branch_id = null;

    #[ORM\OneToOne(inversedBy: 'apiclientsgrants', cascade: ['persist', 'remove'])]
    private ?Apiclients $apiclients_id = null;

    #[ORM\OneToMany(mappedBy: 'apiclientgrants_id', targetEntity: Apiinstallperm::class)]
    private Collection $apiinstallperms;

    public function __construct()
    {
        $this->apiinstallperms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isInstallId(): ?bool
    {
        return $this->install_id;
    }

    public function setInstallId(bool $install_id): self
    {
        $this->install_id = $install_id;

        return $this;
    }

    public function getPerms(): ?string
    {
        return $this->perms;
    }

    public function setPerms(?string $perms): self
    {
        $this->perms = $perms;

        return $this;
    }

    public function getBranchId(): ?int
    {
        return $this->branch_id;
    }

    public function setBranchId(?int $branch_id): self
    {
        $this->branch_id = $branch_id;

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

    /**
     * @return Collection<int, Apiinstallperm>
     */
    public function getApiinstallperms(): Collection
    {
        return $this->apiinstallperms;
    }

    public function addApiinstallperm(Apiinstallperm $apiinstallperm): self
    {
        if (!$this->apiinstallperms->contains($apiinstallperm)) {
            $this->apiinstallperms->add($apiinstallperm);
            $apiinstallperm->setApiclientgrantsId($this);
        }

        return $this;
    }

    public function removeApiinstallperm(Apiinstallperm $apiinstallperm): self
    {
        if ($this->apiinstallperms->removeElement($apiinstallperm)) {
            // set the owning side to null (unless already changed)
            if ($apiinstallperm->getApiclientgrantsId() === $this) {
                $apiinstallperm->setApiclientgrantsId(null);
            }
        }

        return $this;
    }
}
