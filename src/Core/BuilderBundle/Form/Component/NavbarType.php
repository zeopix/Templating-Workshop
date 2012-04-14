<?php
namespace Core\BuilderBundle\Form\Component;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class NavbarType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('fixed', 'checkbox', array(
            'label' => 'Fijado Arriba',
            'required' => false
             ));
    }

    public function getName()
    {
        return 'core_builderbundle_component_spantype';
    }
}