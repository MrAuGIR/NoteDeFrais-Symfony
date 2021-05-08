<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\GroupVehicleCatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GroupVehicleCatRepository::class)
 */
#[ApiResource]
class GroupVehicleCat
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
     * @ORM\OneToMany(targetEntity=VehicleCategory::class, mappedBy="groupVehicle")
     */
    private $vehicleCategories;

    public function __construct()
    {
        $this->vehicleCategories = new ArrayCollection();
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
     * @return Collection|VehicleCategory[]
     */
    public function getVehicleCategories(): Collection
    {
        return $this->vehicleCategories;
    }

    public function addVehicleCategory(VehicleCategory $vehicleCategory): self
    {
        if (!$this->vehicleCategories->contains($vehicleCategory)) {
            $this->vehicleCategories[] = $vehicleCategory;
            $vehicleCategory->setGroupVehicle($this);
        }

        return $this;
    }

    public function removeVehicleCategory(VehicleCategory $vehicleCategory): self
    {
        if ($this->vehicleCategories->removeElement($vehicleCategory)) {
            // set the owning side to null (unless already changed)
            if ($vehicleCategory->getGroupVehicle() === $this) {
                $vehicleCategory->setGroupVehicle(null);
            }
        }

        return $this;
    }
}
