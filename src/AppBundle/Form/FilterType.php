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
                ->add('city', EntityType::class, array(
                    'class' => 'AppBundle:City',
                    'placeholder' => 'Par Commune',
                    'required' => true,
                    'mapped' => false
                ))
//                ->add('startDate', DateType::class, array(
//                    'widget' => 'single_text',
//                    'format' => 'dd/MM/yyyy',
//                    'attr' => array(
//                        'class' => 'form-control input-inline datepicker',
//                        'data-provide' => 'datepicker',
//                        'data-date-format' => 'dd-mm-yyyy',
//                        'data-date-today-highlight' => true,
//                        'data-date-today-btn' => "linked",
//                        'data-default-view-date' => "today",
//                    )
//                ))
//                ->add('endDate', DateType::class, array(
//                    'widget' => 'single_text',
//                    'format' => 'dd/MM/yyyy',
//                    'attr' => array(
//                        'class' => 'form-control input-inline datepicker',
//                        'data-provide' => 'datepicker',
//                        'data-date-format' => 'dd-mm-yyyy',
//                        'data-date-today-highlight' => true,
//                        'data-date-today-btn' => "linked",
//                        'data-default-view-date' => "today",
//                    )
//                ))

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
