<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class FilterType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('product', EntityType::class, array(
                    'class' => 'AppBundle:Product',
                    'group_by' => 'category.name',
                    'choice_name' => 'name',
                    'placeholder' => 'Par  produit',
                    'mapped' => false
                ))
                ->add('category', EntityType::class, array(
                    'class' => 'AppBundle:Category',
                    'placeholder' => 'Par catégorie',
                    'required' => true,
                    'mapped' => false
                ))
                ->add('startDate', DateType::class, array(
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    'placeholder' => 'dd/MM/yyyy'
                ))
                ->add('endDate', DateType::class, array(
                    'widget' => 'single_text',
                    'format' => 'dd/MM/yyyy',
                    'placeholder' => 'dd/MM/yyyy'
                ))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => null
        ));
    }

}
