<?php

namespace App\Form;

use App\Entity\Evenement;
use App\Entity\Sport;
use App\Entity\Ville;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementSearchTypeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sport', EntityType::class,[
                'class'=> Sport::class,
                'label'=> 'Sport',
                'multiple'=> false
            ])
            ->add('ville', EntityType::class,[
                'class'=>Ville::class,
                'label'=> 'Ville',
                'multiple'=> false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
