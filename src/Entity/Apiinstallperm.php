<?php

namespace App\Entity;

use App\Repository\ApiinstallpermRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiinstallpermRepository::class)]
class Apiinstallperm
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $branch_id = null;

    #[ORM\Column]
    private ?bool $install_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_id = null;

    #[ORM\Column]
    private ?bool $members_read = null;

    #[ORM\Column]
    private ?bool $members_write = null;

    #[ORM\Column]
    private ?bool $members_add = null;

    #[ORM\Column]
    private ?bool $members_products_add = null;

    #[ORM\Column]
    private ?bool $members_payment_schedules_read = null;

    #[ORM\Column]
    private ?bool $members_subcription_read = null;

    #[ORM\Column]
    private ?bool $payment_schedules_write = null;

    #[ORM\Column]
    private ?bool $payment_schedules_read = null;

    #[ORM\Column]
    private ?bool $payment_day_read = null;

    #[ORM\ManyToOne(inversedBy: 'apiinstallperms')]
    private ?Apiclientsgrants $apiclientgrants_id = null;

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

    public function isInstallId(): ?bool
    {
        return $this->install_id;
    }

    public function setInstallId(bool $install_id): self
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

    public function isMembersRead(): ?bool
    {
        return $this->members_read;
    }

    public function setMembersRead(bool $members_read): self
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

    public function isMembersPaymentSchedulesRead(): ?bool
    {
        return $this->members_payment_schedules_read;
    }

    public function setMembersPaymentSchedulesRead(bool $members_payment_schedules_read): self
    {
        $this->members_payment_schedules_read = $members_payment_schedules_read;

        return $this;
    }

    public function isMembersSubcriptionRead(): ?bool
    {
        return $this->members_subcription_read;
    }

    public function setMembersSubcriptionRead(bool $members_subcription_read): self
    {
        $this->members_subcription_read = $members_subcription_read;

        return $this;
    }

    public function isPaymentSchedulesWrite(): ?bool
    {
        return $this->payment_schedules_write;
    }

    public function setPaymentSchedulesWrite(bool $payment_schedules_write): self
    {
        $this->payment_schedules_write = $payment_schedules_write;

        return $this;
    }

    public function isPaymentSchedulesRead(): ?bool
    {
        return $this->payment_schedules_read;
    }

    public function setPaymentSchedulesRead(bool $payment_schedules_read): self
    {
        $this->payment_schedules_read = $payment_schedules_read;

        return $this;
    }

    public function isPaymentDayRead(): ?bool
    {
        return $this->payment_day_read;
    }

    public function setPaymentDayRead(bool $payment_day_read): self
    {
        $this->payment_day_read = $payment_day_read;

        return $this;
    }

    public function getApiclientgrantsId(): ?Apiclientsgrants
    {
        return $this->apiclientgrants_id;
    }

    public function setApiclientgrantsId(?Apiclientsgrants $apiclientgrants_id): self
    {
        $this->apiclientgrants_id = $apiclientgrants_id;

        return $this;
    }
}
