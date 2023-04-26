<?php

namespace App\Controller\Admin;

use App\Entity\Compte;
#use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use App\Service\EasyAdminUserService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class CompteCrudController extends AbstractCrudController {

    public static function getEntityFqcn(): string {
        return Compte::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('email'),
                    ChoiceField::new('roles')
                    ->setChoices(['ROLE_USER' => 'ROLE_USER', 'ROLE_ADMIN' => 'ROLE_ADMIN'])
                    ->allowMultipleChoices()
                    ->renderExpanded(),
            BooleanField::new('isVerified'),
        ];
    }

    public function configureActions(Actions $actions): Actions {
        return $actions
                        ->remove(Crud::PAGE_INDEX, Action::NEW)
        ;
    }

}
