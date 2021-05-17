<?php

namespace App\Controller\Admin;

use App\Repository\ExpenseTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ExpensesTypeController extends AbstractController
{

    #[Route('/admin/expenseType', name: 'admin_exp_type')]
    public function index(ExpenseTypeRepository $expTypeRepo)
    {
        $expTypes = $expTypeRepo->findAll();

        return $this->render('admin/index.html.twig', [
            'expType' => $expTypes
        ]);
    }
}