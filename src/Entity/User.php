<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un compte existe déjà avec cette adresse mail')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(length: 180, unique: true)]
private ?string $email = null;

#[ORM\Column]
private array $roles = [];

/**
 * @var string The hashed password
 */
#[ORM\Column]
private ?string $password = null;

#[ORM\OneToMany(mappedBy: 'user', targetEntity: Reservation::class)]
private Collection $reservations;

#[ORM\Column(type: 'boolean')]
private $isVerified = false;

#[ORM\Column(length: 255)]
private ?string $pseudo = null;

public function __construct()
{
    $this->reservations = new ArrayCollection();
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

/**
 * @return Collection<int, Reservation>
 */
public function getReservations(): Collection
{
    return $this->reservations;
}

public function addReservation(Reservation $reservation): self
{
    if (!$this->reservations->contains($reservation)) {
        $this->reservations->add($reservation);
        $reservation->setUser($this);
    }

    return $this;
}

public function removeReservation(Reservation $reservation): self
{
    if ($this->reservations->removeElement($reservation)) {
        // set the owning side to null (unless already changed)
        if ($reservation->getUser() === $this) {
            $reservation->setUser(null);
        }
    }

    return $this;
}

public function isVerified(): bool
{
    return $this->isVerified;
}

public function setIsVerified(bool $isVerified): self
{
    $this->isVerified = $isVerified;

    return $this;
}

public function getPseudo(): ?string
{
    return $this->pseudo;
}

public function setPseudo(string $pseudo): self
{
    $this->pseudo = $pseudo;

    return $this;
}

public function __toString(): string
{
    return $this->getUserIdentifier();
}

public function anonymizeReservations(): void {
    foreach ($this->reservations as $reservation) {
        $reservation->setUserFirstname('Compte supprimé');
        $reservation->setUserLastname('Compte supprimé');
        $reservation->setUserPhone('0000000000');
        $reservation->setUserAdress('Adresse supprimée');
    }
}


}
