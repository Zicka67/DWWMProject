<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dt_resa = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dt_cours = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Cours $cours = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 250)]
    private ?string $payement_method = null;

    #[ORM\OneToOne(mappedBy: 'reservation', cascade: ['persist', 'remove'])]
    private ?Payement $payement = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDtResa(): ?\DateTimeInterface
    {
        return $this->dt_resa;
    }

    public function setDtResa(\DateTimeInterface $dt_resa): self
    {
        $this->dt_resa = $dt_resa;

        return $this;
    }

    public function getDtCours(): ?\DateTimeInterface
    {
        return $this->dt_cours;
    }

    public function setDtCours(\DateTimeInterface $dt_cours): self
    {
        $this->dt_cours = $dt_cours;

        return $this;
    }

    public function getCours(): ?Cours
    {
        return $this->cours;
    }

    public function setCours(?Cours $cours): self
    {
        $this->cours = $cours;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPayement(): ?Payement
    {
        return $this->payement;
    }

    public function setPayement(Payement $payement): self
    {
        // set the owning side of the relation if necessary
        if ($payement->getReservation() !== $this) {
            $payement->setReservation($this);
        }

        $this->payement = $payement;

        return $this;
    }

    public function getPayementMethod(): ?string
    {
        return $this->payement_method;
    }

    public function setPayementMethod(string $payement_method): self
    {
        $this->payement_method = $payement_method;

        return $this;
    }
}
