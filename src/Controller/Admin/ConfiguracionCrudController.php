<?php

namespace App\Controller\Admin;

use App\Entity\Configuracion;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ConfiguracionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Configuracion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            Field::new('nombre_negocio'),
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
