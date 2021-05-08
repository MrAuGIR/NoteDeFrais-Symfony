<?php

namespace App\Entity;

use App\Repository\KilometricRangeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KilometricRangeRepository::class)
 */
class KilometricRange
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $rangeMin;

    /**
     * @ORM\Column(type="integer")
     */
    private $rangeMax;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity=GroupVehicleCat::class, inversedBy="kilometricRanges")
     */
    private $groupVehicleCat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRangeMin(): ?int
    {
        return $this->rangeMin;
    }

    public function setRangeMin(int $rangeMin): self
    {
        $this->rangeMin = $rangeMin;

        return $this;
    }

    public function getRangeMax(): ?int
    {
        return $this->rangeMax;
    }

    public function setRangeMax(int $rangeMax): self
    {
        $this->rangeMax = $rangeMax;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getGroupVehicleCat(): ?GroupVehicleCat
    {
        return $this->groupVehicleCat;
    }

    public function setGroupVehicleCat(?GroupVehicleCat $groupVehicleCat): self
    {
        $this->groupVehicleCat = $groupVehicleCat;

        return $this;
    }
}
