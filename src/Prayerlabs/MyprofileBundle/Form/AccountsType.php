<?php

namespace Prayerlabs\MyprofileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('place')
            ->add('works_at')
            ->add('email')
            ->add('password')
            ->add('salt')
            ->add('enabled')
            ->add('last_login')
            ->add('token')
            ->add('verification_requested_at')
            ->add('password_requested_at')
            ->add('created_at')
            ->add('created_from_system')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prayerlabs\MyprofileBundle\Entity\Accounts'
        ));
    }

    public function getName()
    {
        return 'prayerlabs_myprofilebundle_accountstype';
    }
}
