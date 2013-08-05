<?php

namespace Prayerlabs\MyprofileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FreequencyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('columnDefinition')
            ->add('accounts')
            ->add('posts')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prayerlabs\MyprofileBundle\Entity\Freequency'
        ));
    }

    public function getName()
    {
        return 'prayerlabs_myprofilebundle_freequencytype';
    }
}
