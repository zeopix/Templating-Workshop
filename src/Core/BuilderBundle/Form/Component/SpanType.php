<?php
namespace Core\BuilderBundle\Form\Component;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SpanType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('width', 'integer', array(
            'label' => 'Anchura (1-12)'
             ));
    }

    public function getName()
    {
        return 'core_builderbundle_component_spantype';
    }
}