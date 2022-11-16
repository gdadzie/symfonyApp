<?php

namespace App\Entity;

use App\Repository\ApiInstallPermRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiInstallPermRepository::class)]
class ApiInstallPerm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $branch_id = null;

    #[ORM\Column(nullable: true)]
    private ?int $install_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_id = null;

    #[ORM\Column]
    private ?int $members_read = null;

    #[ORM\Column]
    private ?bool $members_write = null;

    #[ORM\Column]
    private ?bool $members_add = null;

    #[ORM\Column]
    private ?bool $members_products_add = null;

    #[ORM\Column(nullable: true)]
    private ?int $members_payement_schedules_read = null;

    #[ORM\Column]
    private ?bool $members_satistiques_read = null;

    #[ORM\Column]
    private ?bool $members_subscription_read = null;

    #[ORM\Column]
    private ?bool $payement_schedules_read = null;

    #[ORM\Column]
    private ?bool $payement_schedules_write = null;

    #[ORM\ManyToOne(inversedBy: 'apiInstallPerms')]
    private ?ApiClientsGrants $apiclientsgrants_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBranchId(): ?string
    {
        return $this->branch_id;
    }

    public function setBranchId(?string $branch_id): self
    {
        $this->branch_id = $branch_id;

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

    public function getClientId(): ?string
    {
        return $this->client_id;
    }

    public function setClientId(?string $client_id): self
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getMembersRead(): ?int
    {
        return $this->members_read;
    }

    public function setMembersRead(int $members_read): self
    {
        $this->members_read = $members_read;

        return $this;
    }

    public function isMembersWrite(): ?bool
    {
        return $this->members_write;
    }

    public function setMembersWrite(bool $members_write): self
    {
        $this->members_write = $members_write;

        return $this;
    }

    public function isMembersAdd(): ?bool
    {
        return $this->members_add;
    }

    public function setMembersAdd(bool $members_add): self
    {
        $this->members_add = $members_add;

        return $this;
    }

    public function isMembersProductsAdd(): ?bool
    {
        return $this->members_products_add;
    }

    public function setMembersProductsAdd(bool $members_products_add): self
    {
        $this->members_products_add = $members_products_add;

        return $this;
    }

    public function getMembersPayementSchedulesRead(): ?int
    {
        return $this->members_payement_schedules_read;
    }

    public function setMembersPayementSchedulesRead(?int $members_payement_schedules_read): self
    {
        $this->members_payement_schedules_read = $members_payement_schedules_read;

        return $this;
    }

    public function isMembersSatistiquesRead(): ?bool
    {
        return $this->members_satistiques_read;
    }

    public function setMembersSatistiquesRead(bool $members_satistiques_read): self
    {
        $this->members_satistiques_read = $members_satistiques_read;

        return $this;
    }

    public function isMembersSubscriptionRead(): ?bool
    {
        return $this->members_subscription_read;
    }

    public function setMembersSubscriptionRead(bool $members_subscription_read): self
    {
        $this->members_subscription_read = $members_subscription_read;

        return $this;
    }

    public function isPayementSchedulesRead(): ?bool
    {
        return $this->payement_schedules_read;
    }

    public function setPayementSchedulesRead(bool $payement_schedules_read): self
    {
        $this->payement_schedules_read = $payement_schedules_read;

        return $this;
    }

    public function isPayementSchedulesWrite(): ?bool
    {
        return $this->payement_schedules_write;
    }

    public function setPayementSchedulesWrite(bool $payement_schedules_write): self
    {
        $this->payement_schedules_write = $payement_schedules_write;

        return $this;
    }

    public function getApiclientsgrantsId(): ?ApiClientsGrants
    {
        return $this->apiclientsgrants_id;
    }

    public function setApiclientsgrantsId(?ApiClientsGrants $apiclientsgrants_id): self
    {
        $this->apiclientsgrants_id = $apiclientsgrants_id;

        return $this;
    }
}
