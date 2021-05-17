<?php

namespace App\Controller\Admin;

use App\Entity\ExpenseType;
use App\Form\ExpenseTypeType;
use App\Repository\ExpenseRepository;
use App\Repository\ExpenseTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


class ExpensesTypeController extends AbstractController
{
    private $expTypeRepo;
    private $em;
    

    public function __construct(ExpenseTypeRepository $expTypeRepo, EntityManagerInterface $em)
    {
        $this->expTypeRepo = $expTypeRepo;
        $this->em = $em;
        
    }

    #[Route('/admin/expenseType', name: 'admin_exp_type')]
    public function index()
    {
        $expTypes = $this->expTypeRepo->findAll();

        return $this->render('admin/ExpensesType/index.html.twig', [
            'expTypes' => $expTypes
        ]);
    }

    #[Route('/admin/expenseType/new', name: "admin_exp_type_new")]
    public function new(Request $request):Response
    {
        $expType = new ExpenseType();
        $expType->setActive(true);

        $form = $this->createForm(ExpenseTypeType::class, $expType);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            
            $this->em->persist($expType);
            $this->em->flush();

            $this->addFlash('success', 'Type de dépense créé');
            return $this->redirectToRoute('admin_exp_type');
        }

        return $this->render('admin/ExpensesType/new.html.twig',[
            'expType' => $expType,
            'form' => $form->createView()
        ]);

    }

    
    /**
     * Affichage du Formualire de modification d'un type de dépense
     */
    #[Route('/admin/expenseType/{id}/edit', name: "admin_exp_type_edit", methods:["GET","POST"])]
    public function edit(Request $request,ExpenseType $expType): Response
    {
        //$expType = $this->expTypeRepo->find($id);


        $form = $this->createForm(ExpenseTypeType::class, $expType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            $this->addFlash('success', 'le type de dépense a été modifié');

            return $this->redirectToRoute('admin_exp_type');
        }

        return $this->render('admin/ExpensesType/edit.html.twig', [
            'expType' => $expType,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/admin/expenseType/{id}/delete', name: "admin_exp_type_delete")]
    public function delete(ExpenseType $expType)
    {
        
    }
}