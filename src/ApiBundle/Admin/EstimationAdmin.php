<?php

namespace ApiBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EstimationAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('libelle')
            ->add('dateCreation')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('libelle')
            ->add('dateCreation')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('libelle')
            ->add('dateCreation')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('libelle')
            ->add('dateCreation')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
        ;
    }
}
