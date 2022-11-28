<?php

namespace App\Entity;

use App\Repository\ApiclientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApiclientsRepository::class)]
class Apiclients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_secret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $client_name = null;

    #[ORM\Column]
    private ?bool $active = null;

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
    private ?Apiclientsgrants $apiclientsgrants = null;

    #[ORM\ManyToOne(inversedBy: 'apiclients')]
    public ?user $user_id = null;

    #[ORM\OneToMany(mappedBy: 'apiclients_id', targetEntity: Structures::class)]
    public Collection $structures;

    public function __construct()
    {
        $this->structures = new ArrayCollection();
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

    public function setClientName(?string $client_name): self
    {
        $this->client_name = $client_name;

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



    public function getApiclientsgrants(): ?Apiclientsgrants
    {
        return $this->apiclientsgrants;
    }

    public function setApiclientsgrants(?Apiclientsgrants $apiclientsgrants): self
    {
        // unset the owning side of the relation if necessary
        if ($apiclientsgrants === null && $this->apiclientsgrants !== null) {
            $this->apiclientsgrants->setApiclientsId(null);
        }

        // set the owning side of the relation if necessary
        if ($apiclientsgrants !== null && $apiclientsgrants->getApiclientsId() !== $this) {
            $apiclientsgrants->setApiclientsId($this);
        }

        $this->apiclientsgrants = $apiclientsgrants;

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

    /**
     * @return Collection<int, Structures>
     */
    public function getStructures(): Collection
    {
        return $this->structures;
    }

    public function addStructure(Structures $structure): self
    {
        if (!$this->structures->contains($structure)) {
            $this->structures->add($structure);
            $structure->setApiclientsId($this);
        }

        return $this;
    }

    public function removeStructure(Structures $structure): self
    {
        if ($this->structures->removeElement($structure)) {
            // set the owning side to null (unless already changed)
            if ($structure->getApiclientsId() === $this) {
                $structure->setApiclientsId(null);
            }
        }

        return $this;
    }




}
