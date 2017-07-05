<?php

namespace ApiBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ChantierAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nom')
            ->add('lienImage')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
            ->add('lieu')
            ->add('anneesBatiment')
            ->add('description')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('nom')
            ->add('lienImage')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
            ->add('lieu')
            ->add('anneesBatiment')
            ->add('description')
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
            ->add('nom')
            ->add('lienImage')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
            ->add('lieu')
            ->add('anneesBatiment')
            ->add('description')
            ->add('produits', 'sonata_type_model', [
                'multiple' => true,
                'class'    => 'ApiBundle\Entity\Produit',
                'expanded' => true,
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
            ->add('nom')
            ->add('lienImage')
            ->add('secteur')
            ->add('surface')
            ->add('typeChantier')
            ->add('typeBatiment')
            ->add('temperatureMoyenne')
            ->add('lieu')
            ->add('anneesBatiment')
            ->add('description')
        ;
    }
}
