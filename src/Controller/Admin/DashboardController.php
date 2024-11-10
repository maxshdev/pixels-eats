<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

use App\Entity\Categoria;
use App\Entity\Configuracion;
use App\Entity\Producto;
use App\Entity\Usuario;

use App\Controller\Admin\ConfiguracionCrudController;
use App\Controller\Admin\ProductoCrudController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        return $this->redirect($adminUrlGenerator->setController(ConfiguracionCrudController::class)->generateUrl());

        // return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pixels Eats');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Inicio', 'fa fa-home');

        yield MenuItem::section('Comercial');
        yield MenuItem::linkToCrud('Configuración', 'fa fa-tags', Configuracion::class);

        yield MenuItem::section('Colecciones');
        yield MenuItem::linkToCrud('Categorias', 'fa fa-tags', Categoria::class);
        yield MenuItem::linkToCrud('Productos', 'fa fa-tags', Producto::class);
        yield MenuItem::linkToCrud('Usuarios', 'fa fa-tags', Usuario::class);
    }

    public function someMethod()
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);

        // some actions may require to pass additional parameters
        $url = $adminUrlGenerator
            ->setController(ConfiguracionCrudController::class)
            ->setAction(Action::EDIT)
            ->setEntityId($configuracion->getId())
            ->generateUrl();
    }
}
