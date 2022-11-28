<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    public ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    public ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'user_id', targetEntity: Apiclients::class)]
    private Collection $apiclients;

    public function __construct()
    {
        $this->apiclients = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }



    public function __toString() {
        return $this->getUserIdentifier();
    }

    /**
     * @return Collection<int, Apiclients>
     */
    public function getApiclients(): Collection
    {
        return $this->apiclients;
    }

    public function addApiclient(Apiclients $apiclient): self
    {
        if (!$this->apiclients->contains($apiclient)) {
            $this->apiclients->add($apiclient);
            $apiclient->setUserId($this);
        }

        return $this;
    }

    public function removeApiclient(Apiclients $apiclient): self
    {
        if ($this->apiclients->removeElement($apiclient)) {
            // set the owning side to null (unless already changed)
            if ($apiclient->getUserId() === $this) {
                $apiclient->setUserId(null);
            }
        }

        return $this;
    }

}
