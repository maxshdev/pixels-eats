<?php

namespace App\Controller\Admin;

use App\Entity\Comercio;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ComercioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Comercio::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            Field::new('nombre'),
            Field::new('slug'),
            AssociationField::new('admin_id')->setLabel('Administrador'),
        ];
    }
}
