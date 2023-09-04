<?php

namespace App\Controller\Admin;

use App\Entity\UnavailableDate;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UnavailableDateCrudController extends AbstractCrudController
{
public static function getEntityFqcn(): string
{
    return UnavailableDate::class;
}


public function configureFields(string $pageName): iterable
{
    return [
        // IdField::new('id'),
        AssociationField::new('course')
            ->setFormTypeOptions([
                'required' => false,
                'placeholder' => 'Sélectionnez un cours',
            ]),
        DateTimeField::new('date'),
        BooleanField::new('all_courses'),
        BooleanField::new('all_day'),
        TimeField::new('slot'),
    ];
}

}
