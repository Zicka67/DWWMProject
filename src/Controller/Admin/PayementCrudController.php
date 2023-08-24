<?php

namespace App\Controller\Admin;

use App\Entity\Payement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PayementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Payement::class;
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
