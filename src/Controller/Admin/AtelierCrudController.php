<?php

namespace App\Controller\Admin;

use App\Entity\Atelier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AtelierCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Atelier::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Ateliers')
            ->setEntityLabelInSingular('Atelier');
    }
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
