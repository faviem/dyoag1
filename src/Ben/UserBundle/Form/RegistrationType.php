<?php

// src/AppBundle/Form/RegistrationType.php

namespace Ben\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegistrationType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        parent::buildForm($builder, $options);

        $builder
                ->add('firstname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.firstname',
                    )
                ))
                ->add('lastname', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.lastname',
                    )
                ))
                ->add('phone', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.phone',
                    )
                ))
                ->add('username', TextType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.name',
                    )
                ))
                ->add('email', EmailType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.form_email',
                    )
                ))
                ->add('plainPassword', PasswordType::class, array(
                    'attr' => array(
                        'placeholder' => 'registration.password',
                    )
                ))
                ->add('user_category', EntityType::class, array(
                    'class' => 'AppBundle:User\UserCategory',
                    'placeholder' => 'Vous êtes',
                    'required' => true
                ))
                ->add('fields', EntityType::class, array(
                    'class' => 'AppBundle:User\Field',
                    'placeholder' => 'Spécialisé en',
                    'required' => true,
                    'expanded' => true,
                    'multiple' => true,
                ))
                ->add('profil', ChoiceType::class, array(
                    'choices' => array(
                        'Particlier' => 'Particlier',
                        'Professionnel' => 'Professionnel',
                    ),
                    'placeholder' => 'Votre profile',
                    'required' => true
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User\User',
            'intention' => 'registration',
            'translation_domain' => 'FOSUserBundle',
            'validators' => 'validators'
        ));
    }

    public function getParent() {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix() {
        return 'ben_user_registration';
    }

    // For Symfony2.x
    public function getName() {
        return $this->getBlockPrefix();
    }

}
