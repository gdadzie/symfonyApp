<?php

namespace App\Entity;

use App\Repository\ApiClientsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiClientsRepository::class)]
class ApiClients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_secret = null;

    #[ORM\Column(length: 255)]
    private ?string $client_name = null;

    #[ORM\Column]
    private ?bool $_active = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $short_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $full_description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dpo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $technical_contact = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commercial_contact = null;

    #[ORM\OneToOne(mappedBy: 'apiclients_id', cascade: ['persist', 'remove'])]
    private ?ApiClientsGrants $apiClientsGrants = null;

    #[ORM\OneToOne(inversedBy: 'apiClients', cascade: ['persist', 'remove'])]
    private ?User $user_id = null;

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

    public function getClientSecret(): ?string
    {
        return $this->client_secret;
    }

    public function setClientSecret(?string $client_secret): self
    {
        $this->client_secret = $client_secret;

        return $this;
    }

    public function getClientName(): ?string
    {
        return $this->client_name;
    }

    public function setClientName(string $client_name): self
    {
        $this->client_name = $client_name;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->_active;
    }

    public function setActive(bool $_active): self
    {
        $this->_active = $_active;

        return $this;
    }

    public function getShortDescription(): ?string
    {
        return $this->short_description;
    }

    public function setShortDescription(?string $short_description): self
    {
        $this->short_description = $short_description;

        return $this;
    }

    public function getFullDescription(): ?string
    {
        return $this->full_description;
    }

    public function setFullDescription(?string $full_description): self
    {
        $this->full_description = $full_description;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(?string $logo_url): self
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getDpo(): ?string
    {
        return $this->dpo;
    }

    public function setDpo(?string $dpo): self
    {
        $this->dpo = $dpo;

        return $this;
    }

    public function getTechnicalContact(): ?string
    {
        return $this->technical_contact;
    }

    public function setTechnicalContact(?string $technical_contact): self
    {
        $this->technical_contact = $technical_contact;

        return $this;
    }

    public function getCommercialContact(): ?string
    {
        return $this->commercial_contact;
    }

    public function setCommercialContact(?string $commercial_contact): self
    {
        $this->commercial_contact = $commercial_contact;

        return $this;
    }

    public function getApiClientsGrants(): ?ApiClientsGrants
    {
        return $this->apiClientsGrants;
    }

    public function setApiClientsGrants(?ApiClientsGrants $apiClientsGrants): self
    {
        // unset the owning side of the relation if necessary
        if ($apiClientsGrants === null && $this->apiClientsGrants !== null) {
            $this->apiClientsGrants->setApiclientsId(null);
        }

        // set the owning side of the relation if necessary
        if ($apiClientsGrants !== null && $apiClientsGrants->getApiclientsId() !== $this) {
            $apiClientsGrants->setApiclientsId($this);
        }

        $this->apiClientsGrants = $apiClientsGrants;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }
}
