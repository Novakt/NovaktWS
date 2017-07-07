<?php

namespace ApiBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProduitAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('reference')
            ->add('nom')
            ->add('type')
            ->add('description')
            ->add('lienImage')
            ->add('puissanceCalorifiqueChaud')
            ->add('puissanceCalorifiqueFroid')
            ->add('puissanceElectriqueChaud')
            ->add('puissanceElectriqueFroid')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('reference')
            ->add('nom')
            ->add('type')
            ->add('description')
            ->add('lienImage')
            ->add('puissanceCalorifiqueChaud')
            ->add('puissanceCalorifiqueFroid')
            ->add('puissanceElectriqueChaud')
            ->add('puissanceElectriqueFroid')
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
            /*->add('id')*/
            ->add('reference')
            ->add('nom')
            ->add('type')
            ->add('description')
            ->add('lienImage')
            ->add('puissanceCalorifiqueChaud')
            ->add('puissanceCalorifiqueFroid')
            ->add('puissanceElectriqueChaud')
            ->add('puissanceElectriqueFroid')
            ->add('categorie', 'sonata_type_model', [
                'multiple' => false,
                'class'    => 'ApiBundle\Entity\Categorie',
                'expanded' => false,
                'by_reference' => false,
                'property' => 'nom'
            ])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('reference')
            ->add('nom')
            ->add('type')
            ->add('description')
            ->add('lienImage')
            ->add('puissanceCalorifiqueChaud')
            ->add('puissanceCalorifiqueFroid')
            ->add('puissanceElectriqueChaud')
            ->add('puissanceElectriqueFroid')
        ;
    }
}
