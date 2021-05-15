<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ScaleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ORM\Entity(repositoryClass=ScaleRepository::class)
 */
#[ApiResource]
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
    #[NotBlank(['message' => "Coefficiant kilometrique obligatoire"])]
    #[Type(["type" => "numeric", "message" => "Le coefficiant doit être de type numérique"])]
    private $coef;

    /**
     * @ORM\Column(type="integer")
     */
    #[NotBlank(['message' => "Offset kilometrique obligatoire"])]
    #[Type(["type" => "numeric", "message" => "L'offset' doit être de type numérique"])]
    private $offset;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity=KilometricRange::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $kilometricRange;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="scales")
     */
    private $category;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
