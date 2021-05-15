<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * @ORM\Entity(repositoryClass=VehicleRepository::class)
 */
#[ApiResource(
    normalizationContext:['groups' => ['vehicles_read']],
    itemOperations: [
        'get' => [
            'normalization_context' => ['groups' => ['vehicles_read', 'item_vehicle_read']]
        ],
        'put',
        'delete'
    ],
    collectionOperations:[
        'post'
    ],
    subresourceOperations:[
        'api_users_vehicles_get_subresource' => [
            'normalization_context' => ['groups' => ['vehicles_subresource']]
        ]
    ]
)]
class Vehicle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['vehicles_read', 'vehicles_subresource'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    #[Groups(['vehicles_read', 'vehicles_subresource'])]
    #[Length(['min' => '7', 'minMessage' => "Immatriculation invalide", 'max' => "9", 'maxMessage' => "Immatriculation est invalide"])]
    private $imma;

    /**
     * @ORM\Column(type="string", length=155, nullable=true)
     */
    #[Groups(['vehicles_read', 'vehicles_subresource'])]
    private $model;

    /**
     * @ORM\Column(type="integer", nullable=true )
     */
    #[Groups(['item_vehicle_read', 'vehicles_subresource'])]
    private $totalDistance;

    /**
     * @ORM\Column(type="integer", nullable=true )
     */
    #[Groups(['item_vehicle_read', 'vehicles_subresource'])]
    private $distanceCurrYer;

    /**
     * @ORM\Column(type="integer", nullable=true )
     */
    #[Groups(['item_vehicle_read', 'vehicles_subresource'])]
    private $distanceLastYear;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="vehicles")
     */
    #[Groups(['vehicles_read', 'vehicles_subresource'])]
    #[NotNull(['message' => "Catégorie du véhcule obligatoire"])]
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="vehicles")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['item_vehicle_read'])]
    #[NotNull()]
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
