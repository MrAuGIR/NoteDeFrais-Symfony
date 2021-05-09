<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TvaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TvaRepository::class)
 */
#[ApiResource(
    collectionOperations:['get'],
    itemOperations:['get']
)]
class Tva
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $code;

    /**
     * @ORM\Column(type="float")
     */
    private $taux;

    /**
     * @ORM\Column(type="string", length=155, nullable=true)
     */
    private $note;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=ExpenseType::class, mappedBy="tva")
     */
    private $expenseTypes;

    /**
     * @ORM\OneToMany(targetEntity=Expense::class, mappedBy="tva")
     */
    private $expenses;

    public function __construct()
    {
        $this->expenseTypes = new ArrayCollection();
        $this->expenses = new ArrayCollection();
    }

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

    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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
     * @return Collection|ExpenseType[]
     */
    public function getExpenseTypes(): Collection
    {
        return $this->expenseTypes;
    }

    public function addExpenseType(ExpenseType $expenseType): self
    {
        if (!$this->expenseTypes->contains($expenseType)) {
            $this->expenseTypes[] = $expenseType;
            $expenseType->setTva($this);
        }

        return $this;
    }

    public function removeExpenseType(ExpenseType $expenseType): self
    {
        if ($this->expenseTypes->removeElement($expenseType)) {
            // set the owning side to null (unless already changed)
            if ($expenseType->getTva() === $this) {
                $expenseType->setTva(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Expense[]
     */
    public function getExpenses(): Collection
    {
        return $this->expenses;
    }

    public function addExpense(Expense $expense): self
    {
        if (!$this->expenses->contains($expense)) {
            $this->expenses[] = $expense;
            $expense->setTva($this);
        }

        return $this;
    }

    public function removeExpense(Expense $expense): self
    {
        if ($this->expenses->removeElement($expense)) {
            // set the owning side to null (unless already changed)
            if ($expense->getTva() === $this) {
                $expense->setTva(null);
            }
        }

        return $this;
    }
}
