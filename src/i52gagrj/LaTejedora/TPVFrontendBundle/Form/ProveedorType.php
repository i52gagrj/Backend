<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProveedorType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('nif')
            ->add('direccion')
            ->add('poblacion')
            ->add('provincia')
            ->add('cp')
            ->add('telefijo')
            ->add('telemovil')
            ->add('email')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Proveedor'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'i52gagrj_latejedora_tpvfrontendbundle_proveedor';
    }
}
