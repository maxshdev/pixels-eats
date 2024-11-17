<?php

namespace App\Controller\Admin;

use App\Entity\Sucursal;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class SucursalCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sucursal::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            Field::new('nombre'),
            AssociationField::new('comercio_id')->setLabel('Comercio'),
            Field::new('slug'),
            ChoiceField::new('plantilla')
                ->setChoices([
                    'Cafetería' => 'cafeteria',
                    'Restaurante' => 'restaurante',
                ])
                ->setRequired(true),
            Field::new('logo_url'),
            Field::new('banner_url'),
            Field::new('direccion'),
            Field::new('horarios_de_atencion'),
            Field::new('telefono'),
            Field::new('email'),
            Field::new('whatsapp_url'),
            Field::new('facebook_url'),
            Field::new('instagram_url'),
        ];
    }
}
