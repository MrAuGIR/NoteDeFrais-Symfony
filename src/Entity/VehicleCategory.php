<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehicleCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VehicleCategoryRepository::class)
 */
#[ApiResource]
class VehicleCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=155)
     */
    private $label;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=Vehicle::class, mappedBy="category")
     */
    private $vehicles;

    /**
     * @ORM\ManyToOne(targetEntity=GroupVehicleCat::class, inversedBy="vehicleCategories")
     */
    private $groupVehicle;

    /**
     * @ORM\OneToMany(targetEntity=Scale::class, mappedBy="vehicleCategory")
     */
    private $scales;

    public function __construct()
    {
        $this->vehicles = new ArrayCollection();
        $this->scales = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

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

    /**
     * @return Collection|Vehicle[]
     */
    public function getVehicles(): Collection
    {
        return $this->vehicles;
    }

    public function addVehicle(Vehicle $vehicle): self
    {
        if (!$this->vehicles->contains($vehicle)) {
            $this->vehicles[] = $vehicle;
            $vehicle->setCategory($this);
        }

        return $this;
    }

    public function removeVehicle(Vehicle $vehicle): self
    {
        if ($this->vehicles->removeElement($vehicle)) {
            // set the owning side to null (unless already changed)
            if ($vehicle->getCategory() === $this) {
                $vehicle->setCategory(null);
            }
        }

        return $this;
    }

    public function getGroupVehicle(): ?GroupVehicleCat
    {
        return $this->groupVehicle;
    }

    public function setGroupVehicle(?GroupVehicleCat $groupVehicle): self
    {
        $this->groupVehicle = $groupVehicle;

        return $this;
    }

    /**
     * @return Collection|Scale[]
     */
    public function getScales(): Collection
    {
        return $this->scales;
    }

    public function addScale(Scale $scale): self
    {
        if (!$this->scales->contains($scale)) {
            $this->scales[] = $scale;
            $scale->setVehicleCategory($this);
        }

        return $this;
    }

    public function removeScale(Scale $scale): self
    {
        if ($this->scales->removeElement($scale)) {
            // set the owning side to null (unless already changed)
            if ($scale->getVehicleCategory() === $this) {
                $scale->setVehicleCategory(null);
            }
        }

        return $this;
    }
}
