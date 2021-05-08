<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExpenseRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $curIso;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_ht_cur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_ttc_cur;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_ht;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_ttc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_tva;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $milestone;

    /**
     * @ORM\ManyToOne(targetEntity=ExpenseType::class, inversedBy="expenses")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=ExpenseReport::class, inversedBy="expenses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $expenseReport;

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

    public function setCurIso(?string $curIso): self
    {
        $this->curIso = $curIso;

        return $this;
    }

    public function getTotalHtCur(): ?float
    {
        return $this->total_ht_cur;
    }

    public function setTotalHtCur(?float $total_ht_cur): self
    {
        $this->total_ht_cur = $total_ht_cur;

        return $this;
    }

    public function getTotalTtcCur(): ?float
    {
        return $this->total_ttc_cur;
    }

    public function setTotalTtcCur(?float $total_ttc_cur): self
    {
        $this->total_ttc_cur = $total_ttc_cur;

        return $this;
    }

    public function getTotalHt(): ?float
    {
        return $this->total_ht;
    }

    public function setTotalHt(?float $total_ht): self
    {
        $this->total_ht = $total_ht;

        return $this;
    }

    public function getTotalTtc(): ?float
    {
        return $this->total_ttc;
    }

    public function setTotalTtc(?float $total_ttc): self
    {
        $this->total_ttc = $total_ttc;

        return $this;
    }

    public function getTotalTva(): ?float
    {
        return $this->total_tva;
    }

    public function setTotalTva(?float $total_tva): self
    {
        $this->total_tva = $total_tva;

        return $this;
    }

    public function getMilestone(): ?int
    {
        return $this->milestone;
    }

    public function setMilestone(?int $milestone): self
    {
        $this->milestone = $milestone;

        return $this;
    }

    public function getType(): ?ExpenseType
    {
        return $this->type;
    }

    public function setType(?ExpenseType $type): self
    {
        $this->type = $type;

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
