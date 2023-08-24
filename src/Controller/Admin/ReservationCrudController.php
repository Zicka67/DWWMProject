<?php

namespace App\Controller\Admin;

use App\Entity\Reservation;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ReservationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reservation::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            AssociationField::new('cours'),
            AssociationField::new('user'),
            DateTimeField::new('dt_cours'),
            DateTimeField::new('dt_resa'),
            TextField::new('payement_method'),
        ];
    }
    
}
