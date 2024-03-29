<?php

namespace App\Controller\Admin;

use App\Entity\Vacation;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VacationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vacation::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Vacations')
            ->setEntityLabelInSingular('Vacation');
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
