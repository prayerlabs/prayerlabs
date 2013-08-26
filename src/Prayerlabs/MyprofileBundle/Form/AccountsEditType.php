<?php

namespace Prayerlabs\MyprofileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountsEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('place', 'text')
            ->add('works_at','text')
            ->add('email')      
            ->add('photo', 'file', array('mapped'=>false, 
                'required' => false))          
            ->add('photo_large', 'file', array('mapped'=>false, 
                'required' => false))           
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
