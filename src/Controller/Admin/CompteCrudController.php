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

class CompteCrudController extends AbstractCrudController {

    private $userPasswordHasher;

    public function __construct(EasyAdminUserService $easyAdminUserService) {
        $this->userPasswordHasher = $easyAdminUserService->getUserPasswordHasher();
    }

    public static function getEntityFqcn(): string {
        return Compte::class;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextField::new('email'),
            TextField::new('password')->hideOnIndex(),
                    ChoiceField::new('roles')
                    ->setChoices(['ROLE_USER' => 'ROLE_USER', 'ROLE_ADMIN' => 'ROLE_ADMIN'])
                    ->allowMultipleChoices()
                    ->renderExpanded(),
            BooleanField::new('isVerified'),
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void {
        if ($entityInstance instanceof UserInterface) {
            // encode the plain password
            $entityInstance->setPassword(
                    $this->userPasswordHasher->hashPassword(
                            $entityInstance,
                            $entityInstance->getPassword()
                    )
            );
        }

        parent::persistEntity($entityManager, $entityInstance);
    }

}
