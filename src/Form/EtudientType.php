<?php

namespace App\Form;

use App\Entity\Etudient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EtudientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'attr' =>[
                'class' =>'form-control',
                'required'=>'required'
                ]
            ])
            ->add('prenom',TextType::class,[
                'attr' =>[
                'class' =>'form-control',
                'required'=>'required'
                ]
            ])
            ->add('niveau',TextType::class,[
                'attr' =>[
                'class' =>'form-control',
                'required'=>'required'
                ]
            ])
            ->add('examen')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Etudient::class,
        ]);
    }
}
