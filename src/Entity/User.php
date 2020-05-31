<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNaissance;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity=Commentaire::class, mappedBy="user", orphanRemoval=true)
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="userCreate", orphanRemoval=true)
     */
    private $evenementCréeate;

    /**
     * @ORM\ManyToMany(targetEntity=Evenement::class, inversedBy="usersJoin")
     */
    private $evenementJoin;

    public function __construct()
    {
        $this->commentaire = new ArrayCollection();
        $this->evenementCréeate = new ArrayCollection();
        $this->evenementJoin = new ArrayCollection();
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
    public function getUsername(): string
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
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->dateNaissance;
    }

    public function setDateNaissance(\DateTimeInterface $dateNaissance): self
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->ville;
    }

    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * @return Collection|Commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setUser($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->contains($commentaire)) {
            $this->commentaire->removeElement($commentaire);
            // set the owning side to null (unless already changed)
            if ($commentaire->getUser() === $this) {
                $commentaire->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenementCréeate(): Collection
    {
        return $this->evenementCréeate;
    }

    public function addEvenementCrEate(Evenement $evenementCrEate): self
    {
        if (!$this->evenementCréeate->contains($evenementCrEate)) {
            $this->evenementCréeate[] = $evenementCrEate;
            $evenementCrEate->setUserCreate($this);
        }

        return $this;
    }

    public function removeEvenementCrEate(Evenement $evenementCrEate): self
    {
        if ($this->evenementCréeate->contains($evenementCrEate)) {
            $this->evenementCréeate->removeElement($evenementCrEate);
            // set the owning side to null (unless already changed)
            if ($evenementCrEate->getUserCreate() === $this) {
                $evenementCrEate->setUserCreate(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenementJoin(): Collection
    {
        return $this->evenementJoin;
    }

    public function addEvenementJoin(Evenement $evenementJoin): self
    {
        if (!$this->evenementJoin->contains($evenementJoin)) {
            $this->evenementJoin[] = $evenementJoin;
        }

        return $this;
    }

    public function removeEvenementJoin(Evenement $evenementJoin): self
    {
        if ($this->evenementJoin->contains($evenementJoin)) {
            $this->evenementJoin->removeElement($evenementJoin);
        }

        return $this;
    }
}
