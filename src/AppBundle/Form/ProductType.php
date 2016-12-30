<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', EntityType::class, array(
                    'class' => 'AppBundle:Product',
                    'group_by' => 'category.name',
                    'choice_name' => 'name',
                    'placeholder' => 'Choisissez votre produit',
                    'mapped' => false
                ))
                ->add('measures', EntityType::class, array(
                    'class' => 'AppBundle:Measure',
                    'label' => 'Unité de mesure',
                    'required' => true,
//                    'expanded' => true,
//                    'multiple' => true,
                    'mapped' => false
                ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Product'
        ));
    }

}
