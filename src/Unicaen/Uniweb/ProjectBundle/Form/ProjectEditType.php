<?php

namespace Unicaen\Uniweb\ProjectBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Unicaen\Uniweb\ProjectBundle\Form\ProjectType;

class ProjectEditType extends ProjectType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       parent::buildForm($builder, $options);
       $builder->add("id","hidden");
    }
  /**
     * @return string
     */
    public function getName()
    {
        return 'unicaen_uniweb_projectbundle_projectedit';
    }
}
