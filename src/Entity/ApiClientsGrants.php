<?php

namespace App\Entity;

use App\Repository\ApiClientsGrantsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiClientsGrantsRepository::class)]
class ApiClientsGrants
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $install_id = null;

    #[ORM\Column]
    private ?bool $active = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $perms = null;

    #[ORM\Column(nullable: true)]
    private ?int $branch_id = null;

    #[ORM\OneToOne(inversedBy: 'apiClientsGrants', cascade: ['persist', 'remove'])]
    private ?ApiClients $apiclients_id = null;

    #[ORM\OneToMany(mappedBy: 'apiclientsgrants_id', targetEntity: ApiInstallPerm::class)]
    private Collection $apiInstallPerms;

    public function __construct()
    {
        $this->apiInstallPerms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    public function setClientId(?string $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getInstallId(): ?int
    {
        return $this->install_id;
    }

    public function setInstallId(?int $install_id): self
    {
        $this->install_id = $install_id;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

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

    public function getApiclientsId(): ?ApiClients
    {
        return $this->apiclients_id;
    }

    public function setApiclientsId(?ApiClients $apiclients_id): self
    {
        $this->apiclients_id = $apiclients_id;

        return $this;
    }

    /**
     * @return Collection<int, ApiInstallPerm>
     */
    public function getApiInstallPerms(): Collection
    {
        return $this->apiInstallPerms;
    }

    public function addApiInstallPerm(ApiInstallPerm $apiInstallPerm): self
    {
        if (!$this->apiInstallPerms->contains($apiInstallPerm)) {
            $this->apiInstallPerms->add($apiInstallPerm);
            $apiInstallPerm->setApiclientsgrantsId($this);
        }

        return $this;
    }

    public function removeApiInstallPerm(ApiInstallPerm $apiInstallPerm): self
    {
        if ($this->apiInstallPerms->removeElement($apiInstallPerm)) {
            // set the owning side to null (unless already changed)
            if ($apiInstallPerm->getApiclientsgrantsId() === $this) {
                $apiInstallPerm->setApiclientsgrantsId(null);
            }
        }

        return $this;
    }
}
