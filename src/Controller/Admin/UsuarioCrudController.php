<?php

namespace App\Controller\Admin;

use App\Entity\Usuario;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class UsuarioCrudController extends AbstractCrudController
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public static function getEntityFqcn(): string
    {
        return Usuario::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Usuario')
            ->setEntityLabelInPlural('Usuarios')
            ->setPageTitle(Crud::PAGE_EDIT, fn (Usuario $user) => sprintf('Editando %s', $user->getEmail()));
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            EmailField::new('email', 'Email'),
            EmailField::new('username', 'Usuario'),
            TextField::new('password', 'Contraseña')
                ->setFormTypeOption('attr', ['autocomplete' => 'new-password'])
                ->setFormTypeOption('mapped', false) // Evita que muestre el valor de la entidad
                ->setFormTypeOption('empty_data', '') // Asegura que el campo aparezca vacío
                ->setHelp('Deja en blanco para mantener la contraseña actual')
                ->setRequired(false)
                ->hideOnIndex(),
            ArrayField::new('roles', 'Roles'),
            // BooleanField::new('isActive', 'Activo') // Ejemplo para un campo booleano
        ];
    }

    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->handlePasswordUpdate($entityInstance);
        parent::persistEntity($entityManager, $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        $this->handlePasswordUpdate($entityInstance);
        parent::updateEntity($entityManager, $entityInstance);
    }

    private function handlePasswordUpdate(Usuario $user): void
    {
        if ($user->getPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);
        }
    }
}