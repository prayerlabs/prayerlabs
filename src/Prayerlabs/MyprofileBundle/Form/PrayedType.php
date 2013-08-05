<?php

namespace Prayerlabs\MyprofileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrayedType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('accounts')
            ->add('posts')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prayerlabs\MyprofileBundle\Entity\Prayed'
        ));
    }

    public function getName()
    {
        return 'prayerlabs_myprofilebundle_prayedtype';
    }
}
