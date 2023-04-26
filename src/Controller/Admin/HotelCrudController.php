<?php

namespace App\Controller\Admin;

use App\Entity\Hotel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;

class HotelCrudController extends AbstractCrudController {

    public static function getEntityFqcn(): string {
        return Hotel::class;
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

    public function configureFields(string $pageName): iterable {
        $fields = [
            TextField::new('nom'),
            TextField::new('adresse'),
            IntegerField::new('cp'),
            TextField::new('ville'),
            TextField::new('tel'),
            EmailField::new('mail'),
        ];

        if ($pageName === Crud::PAGE_INDEX) {
            // Remove the association field from the index view
            unset($fields[count($fields) - 1]);
        }

        return $fields;
    }

}
