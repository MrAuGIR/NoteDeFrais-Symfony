<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TaxHorsePowerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=TaxHorsePowerRepository::class)
 */
#[ApiResource(
    normalizationContext:['groups' => ['read:taxHorsePower']]
)]
class TaxHorsePower
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:taxHorsePower', 'scales_read', 'categories_read'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=6)
     */
    #[Groups(['read:taxHorsePower', 'scales_read', 'categories_read'])]
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[Groups(['vehicles_read', 'read:taxHorsePower', 'scales_read', 'categories_read'])]
    private $label;

    /**
     * @ORM\Column(type="boolean")
     */
    #[Groups(['read:taxHorsePower', 'read:taxHorsePower', 'scales_read'])]
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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
}
