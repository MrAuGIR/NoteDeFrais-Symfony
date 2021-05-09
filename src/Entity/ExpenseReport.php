<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ExpenseReportRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ExpenseReportRepository::class)
 */
#[ApiResource(
    normalizationContext: [
        'groups' => ['read:ExpenseReports']
    ],
    itemOperations: [
        'put'=> ['denormalization_context' => ['groups' => ['put:ExpenseReport']]],
        'delete',
        'get' => ['normalization_context'=> ['groups'=>['read:ExpenseReport', 'read:ExpenseReports']]]
        ]
)]
class ExpenseReport
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:ExpenseReports'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    #[Groups(['read:ExpenseReports'])]
    private $reference;

    /**
     * @ORM\Column(type="integer")
     */
    #[Groups(['read:ExpenseReports'])]
    private $status;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    #[Groups(['read:ExpenseReports', 'put:ExpenseReport'])]
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    #[Groups(['read:ExpenseReport', 'put:ExpenseReport'])]
    private $supervisorComment;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $validateAt;

    /**
     * @ORM\Column(type="datetime")
     */
    #[Groups(['read:ExpenseReports', 'put:ExpenseReport'])]
    private $startedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    #[Groups(['read:ExpenseReports', 'put:ExpenseReport'])]
    private $endedAt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    #[Groups(['read:ExpenseReport', 'put:ExpenseReport'])]
    private $totalHt;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    #[Groups(['read:ExpenseReports', 'put:ExpenseReport'])]
    private $totalTtc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    #[Groups(['read:ExpenseReport'])]
    private $totalTva;

    /**
     * @ORM\OneToMany(targetEntity=Expense::class, mappedBy="expenseReport", orphanRemoval=true)
     */
    #[Groups(['read:ExpenseReport'])]
    private $expenses;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="expenseReports")
     * @ORM\JoinColumn(nullable=false)
     */
    #[Groups(['read:ExpenseReports'])]
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     */
    private $supervisor;

    public function __construct()
    {
        $this->expenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

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

    public function getSupervisorComment(): ?string
    {
        return $this->supervisorComment;
    }

    public function setSupervisorComment(?string $supervisorComment): self
    {
        $this->supervisorComment = $supervisorComment;

        return $this;
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

    public function getValidateAt(): ?\DateTimeInterface
    {
        return $this->validateAt;
    }

    public function setValidateAt(?\DateTimeInterface $validateAt): self
    {
        $this->validateAt = $validateAt;

        return $this;
    }

    public function getStartedAt(): ?\DateTimeInterface
    {
        return $this->startedAt;
    }

    public function setStartedAt(\DateTimeInterface $startedAt): self
    {
        $this->startedAt = $startedAt;

        return $this;
    }

    public function getEndedAt(): ?\DateTimeInterface
    {
        return $this->endedAt;
    }

    public function setEndedAt(?\DateTimeInterface $endedAt): self
    {
        $this->endedAt = $endedAt;

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
            $expense->setExpenseReport($this);
        }

        return $this;
    }

    public function removeExpense(Expense $expense): self
    {
        if ($this->expenses->removeElement($expense)) {
            // set the owning side to null (unless already changed)
            if ($expense->getExpenseReport() === $this) {
                $expense->setExpenseReport(null);
            }
        }

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getSupervisor(): ?User
    {
        return $this->supervisor;
    }

    public function setSupervisor(?User $supervisor): self
    {
        $this->supervisor = $supervisor;

        return $this;
    }
}
