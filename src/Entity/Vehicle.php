<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 */
#[ApiResource(
    normalizationContext:['groups' => ['vehicles_read']],
)]
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['vehicles_read'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    #[Groups(['vehicles_read'])]
    private $imma;

    /**
     * @ORM\Column(type="string", length=155, nullable=true)
     */
    #[Groups(['vehicles_read'])]
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Groups(['item_vehicle_read'])]
    private $totalDistance;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Groups(['item_vehicle_read'])]
    private $distanceCurrYer;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    #[Groups(['item_vehicle_read'])]
    private $distanceLastYear;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="vehicles")
     */
    #[Groups(['vehicles_read'])]
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
