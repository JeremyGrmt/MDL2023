<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class CompteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Compte::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInPlural('Utilisateurs')
            ->setEntityLabelInSingular('Utilisateur');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('email'),
            TextField::new('password'),
            ChoiceField::new('roles')
                ->setChoices(['ROLE_USER' => 'ROLE_USER', 'ROLE_ADMIN' => 'ROLE_ADMIN'])
                ->allowMultipleChoices()
                ->renderExpanded(),
            BooleanField::new('isVerified'),
            ];
    }
}
