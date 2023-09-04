<?php

namespace App\Entity;

use App\Repository\UnavailableDateRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UnavailableDateRepository::class)]
class UnavailableDate
{
#[ORM\Id]
#[ORM\GeneratedValue]
#[ORM\Column]
private ?int $id = null;

#[ORM\ManyToOne]
private ?Cours $course = null;

#[ORM\Column]
private ?bool $all_courses = null;

#[ORM\Column(type: Types::DATE_MUTABLE)]
private ?\DateTimeInterface $date = null;

#[ORM\Column]
private ?bool $all_day = null;

#[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
private ?\DateTimeInterface $slot = null;

public function getId(): ?int
{
    return $this->id;
}

public function getCourse(): ?Cours
{
    return $this->course;
}

public function setCourse(?Cours $course): self
{
    $this->course = $course;

    return $this;
}

public function isAllCourses(): ?bool
{
    return $this->all_courses;
}

public function setAllCourses(bool $all_courses): self
{
    $this->all_courses = $all_courses;

    return $this;
}

public function getDate(): ?\DateTimeInterface
{
    return $this->date;
}

public function setDate(\DateTimeInterface $date): self
{
    $this->date = $date;

    return $this;
}

public function isAllDay(): ?bool
{
    return $this->all_day;
}

public function setAllDay(bool $all_day): self
{
    $this->all_day = $all_day;

    return $this;
}

public function getSlot(): ?\DateTimeInterface
{
    return $this->slot;
}

public function setSlot(?\DateTimeInterface $slot): self
{
    $this->slot = $slot;

    return $this;
}
}
