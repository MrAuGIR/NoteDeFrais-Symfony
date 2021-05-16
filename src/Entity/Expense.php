<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExpenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ExpenseRepository::class)
 */
#[ApiResource]
class Expense
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $doneAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $curIso;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalHtCur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalTtcCur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalHt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalTtc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $totalTva;

    /**
     * @ORM\OneToMany(targetEntity=Files::class, mappedBy="expense", orphanRemoval=true)
     */
    private $files;

    /**
     * @ORM\ManyToOne(targetEntity=ExpenseType::class, inversedBy="expenses")
     */
    private $expenseType;

    /**
     * @ORM\ManyToOne(targetEntity=Tva::class, inversedBy="expenses")
     */
    private $tva;

    /**
     * @ORM\ManyToOne(targetEntity=ExpenseReport::class, inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expenseReport;

    public function __construct()
    {
        $this->files = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getDoneAt(): ?\DateTimeInterface
    {
        return $this->doneAt;
    }

    public function setDoneAt(\DateTimeInterface $doneAt): self
    {
        $this->doneAt = $doneAt;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

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

    public function getCurIso(): ?string
    {
        return $this->curIso;
    }

    public function setCurIso(string $curIso): self
    {
        $this->curIso = $curIso;

        return $this;
    }

    public function getTotalHtCur(): ?float
    {
        return $this->totalHtCur;
    }

    public function setTotalHtCur(?float $totalHtCur): self
    {
        $this->totalHtCur = $totalHtCur;

        return $this;
    }

    public function getTotalTtcCur(): ?float
    {
        return $this->totalTtcCur;
    }

    public function setTotalTtcCur(?float $totalTtcCur): self
    {
        $this->totalTtcCur = $totalTtcCur;

        return $this;
    }

    public function getTotalHt(): ?float
    {
        return $this->totalHt;
    }

    public function setTotalHt(?float $totalHt): self
    {
        $this->totalHt = $totalHt;

        return $this;
    }

    public function getTotalTtc(): ?float
    {
        return $this->totalTtc;
    }

    public function setTotalTtc(?float $totalTtc): self
    {
        $this->totalTtc = $totalTtc;

        return $this;
    }

    public function getTotalTva(): ?float
    {
        return $this->totalTva;
    }

    public function setTotalTva(?float $totalTva): self
    {
        $this->totalTva = $totalTva;

        return $this;
    }

    /**
     * @return Collection|Files[]
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(Files $file): self
    {
        if (!$this->files->contains($file)) {
            $this->files[] = $file;
            $file->setExpense($this);
        }

        return $this;
    }

    public function removeFile(Files $file): self
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getExpense() === $this) {
                $file->setExpense(null);
            }
        }

        return $this;
    }

    public function getExpenseType(): ?ExpenseType
    {
        return $this->expenseType;
    }

    public function setExpenseType(?ExpenseType $expenseType): self
    {
        $this->expenseType = $expenseType;

        return $this;
    }

    public function getTva(): ?Tva
    {
        return $this->tva;
    }

    public function setTva(?Tva $tva): self
    {
        $this->tva = $tva;

        return $this;
    }

    public function getExpenseReport(): ?ExpenseReport
    {
        return $this->expenseReport;
    }

    public function setExpenseReport(?ExpenseReport $expenseReport): self
    {
        $this->expenseReport = $expenseReport;

        return $this;
    }
}
