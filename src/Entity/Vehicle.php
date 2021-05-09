<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 */
#[ApiResource]
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $imma;

    /**
     * @ORM\Column(type="string", length=155, nullable=true)
     */
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $totalDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $distanceCurrYer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $distanceLastYear;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="vehicles")
     */
    private $category;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImma(): ?string
    {
        return $this->imma;
    }

    public function setImma(string $imma): self
    {
        $this->imma = $imma;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(?string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getTotalDistance(): ?int
    {
        return $this->totalDistance;
    }

    public function setTotalDistance(?int $totalDistance): self
    {
        $this->totalDistance = $totalDistance;

        return $this;
    }

    public function getDistanceCurrYer(): ?int
    {
        return $this->distanceCurrYer;
    }

    public function setDistanceCurrYer(?int $distanceCurrYer): self
    {
        $this->distanceCurrYer = $distanceCurrYer;

        return $this;
    }

    public function getDistanceLastYear(): ?int
    {
        return $this->distanceLastYear;
    }

    public function setDistanceLastYear(?int $distanceLastYear): self
    {
        $this->distanceLastYear = $distanceLastYear;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }
}
