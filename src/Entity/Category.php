<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
#[ApiResource]
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['vehicle_read'])]
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=TaxHorsePower::class)
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['vehicle_read'])]
    private $taxHorsePower;

    /**
     * @ORM\ManyToOne(targetEntity=TypeVehicle::class, inversedBy="categories")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['vehicle_read'])]
    private $typeVehicle;

    /**
     * @ORM\OneToMany(targetEntity=Scale::class, mappedBy="category")
     */
    #[Groups(['vehicle_read'])]
    private $scales;

    /**
     * @ORM\OneToMany(targetEntity=Vehicle::class, mappedBy="category")
     */
    private $vehicles;

    public function __construct()
    {
        $this->scales = new ArrayCollection();
        $this->vehicles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaxHorsePower(): ?TaxHorsePower
    {
        return $this->taxHorsePower;
    }

    public function setTaxHorsePower(?TaxHorsePower $taxHorsePower): self
    {
        $this->taxHorsePower = $taxHorsePower;

        return $this;
    }

    public function getTypeVehicle(): ?TypeVehicle
    {
        return $this->typeVehicle;
    }

    public function setTypeVehicle(?TypeVehicle $typeVehicle): self
    {
        $this->typeVehicle = $typeVehicle;

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
            $scale->setCategory($this);
        }

        return $this;
    }

    public function removeScale(Scale $scale): self
    {
        if ($this->scales->removeElement($scale)) {
            // set the owning side to null (unless already changed)
            if ($scale->getCategory() === $this) {
                $scale->setCategory(null);
            }
        }

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
}
