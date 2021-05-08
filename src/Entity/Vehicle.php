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
    private $distanceCurrYear;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $DistanceLastYear;

    /**
     * @ORM\ManyToOne(targetEntity=VehicleCategory::class, inversedBy="vehicles")
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

    public function getDistanceCurrYear(): ?int
    {
        return $this->distanceCurrYear;
    }

    public function setDistanceCurrYear(?int $distanceCurrYear): self
    {
        $this->distanceCurrYear = $distanceCurrYear;

        return $this;
    }

    public function getDistanceLastYear(): ?int
    {
        return $this->DistanceLastYear;
    }

    public function setDistanceLastYear(?int $DistanceLastYear): self
    {
        $this->DistanceLastYear = $DistanceLastYear;

        return $this;
    }

    public function getCategory(): ?VehicleCategory
    {
        return $this->category;
    }

    public function setCategory(?VehicleCategory $category): self
    {
        $this->category = $category;

        return $this;
    }
}
