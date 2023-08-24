<?php

namespace App\Controller\Admin;

use App\Entity\Cours;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
// use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;


class CoursCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Cours::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('nom_cours'),
            TextField::new('description'),
            NumberField::new('prix')->setNumDecimals(2),
            TextField::new('image'),
            TextField::new('slug_cours'),
        ];
    }
    
}
