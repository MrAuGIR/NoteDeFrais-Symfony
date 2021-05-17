<?php

namespace App\Form;

use App\Entity\ExpenseType;
use App\Entity\Tva;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExpenseTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code',TextType::class,[
                'label' => 'Code dépense',
                'attr' => ['class' => 'form-control']
            ])
            ->add('label',TextType::class,[
                'label'=>'Label dépense',
                'attr' => ['class' => 'form-control']
            ])
            ->add('active')
            ->add('tva',EntityType::class,[
                'label' => 'Tva de la dépense',
                'placeholder' => 'Choisir une tva',
                'class' => Tva::class,
                'choice_label' => function(Tva $tva){
                    return strtoupper($tva->getCode());
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ExpenseType::class,
        ]);
    }
}
