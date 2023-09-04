<?php

namespace App\Entity;

use App\Repository\PayementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementRepository::class)]
class Payement
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
private ?string $montant = null;

#[ORM\Column(type: Types::DATETIME_MUTABLE)]
private ?\DateTimeInterface $dt_payement = null;

#[ORM\OneToOne(inversedBy: 'payement', cascade: ['persist', 'remove'])]
#[ORM\JoinColumn(nullable: false)]
private ?Reservation $reservation = null;

public function getId(): ?int
{
    return $this->id;
}

public function getMontant(): ?string
{
    return $this->montant;
}

public function setMontant(string $montant): self
{
    $this->montant = $montant;

    return $this;
}

public function getDtPayement(): ?\DateTimeInterface
{
    return $this->dt_payement;
}

public function setDtPayement(\DateTimeInterface $dt_payement): self
{
    $this->dt_payement = $dt_payement;

    return $this;
}

public function getReservation(): ?Reservation
{
    return $this->reservation;
}

public function setReservation(Reservation $reservation): self
{
    $this->reservation = $reservation;

    return $this;
}
}
