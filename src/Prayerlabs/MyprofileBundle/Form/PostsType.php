<?php

namespace Prayerlabs\MyprofileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PostsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('created_at')
            ->add('updated_at')
            ->add('expires_at')
            ->add('accounts')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Prayerlabs\MyprofileBundle\Entity\Posts'
        ));
    }

    public function getName()
    {
        return 'prayerlabs_myprofilebundle_poststype';
    }
}
