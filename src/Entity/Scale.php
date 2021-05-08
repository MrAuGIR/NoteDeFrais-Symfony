<?php

namespace App\Entity;

use App\Repository\ScaleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScaleRepository::class)
 */
class Scale
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $coef;

    /**
     * @ORM\Column(type="integer")
     */
    private $offset;

    /**
     * @ORM\ManyToOne(targetEntity=KilometricRange::class)
     */
    private $kilometricRange;

    /**
     * @ORM\ManyToOne(targetEntity=VehicleCategory::class, inversedBy="scales")
     */
    private $vehicleCategory;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoef(): ?float
    {
        return $this->coef;
    }

    public function setCoef(float $coef): self
    {
        $this->coef = $coef;

        return $this;
    }

    public function getOffset(): ?int
    {
        return $this->offset;
    }

    public function setOffset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function getKilometricRange(): ?KilometricRange
    {
        return $this->kilometricRange;
    }

    public function setKilometricRange(?KilometricRange $kilometricRange): self
    {
        $this->kilometricRange = $kilometricRange;

        return $this;
    }

    public function getVehicleCategory(): ?VehicleCategory
    {
        return $this->vehicleCategory;
    }

    public function setVehicleCategory(?VehicleCategory $vehicleCategory): self
    {
        $this->vehicleCategory = $vehicleCategory;

        return $this;
    }
}
