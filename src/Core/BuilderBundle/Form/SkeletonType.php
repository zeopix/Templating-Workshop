<?php
namespace Core\BuilderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SkeletonType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('content', 'text', array(
            'label' => 'Nombre'
             ));
    }

    public function getName()
    {
        return 'core_builderbundle_skeletontype';
    }
}