<?php

namespace i52gagrj\LaTejedora\TPVFrontendBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SocioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('poblacion')
            ->add('cp')
            ->add('provincia')
            ->add('dni')
            ->add('email')
            ->add('telefijo')
            ->add('telemovil')
            ->add('saldo')
            ->add('activo')
            ->add('fechainactivo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'i52gagrj\LaTejedora\TPVFrontendBundle\Entity\Socio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'i52gagrj_latejedora_tpvfrontendbundle_socio';
    }
}
