<?php

namespace App\Controller\Front;

use App\Entity\Categoria;
use App\Entity\Configuracion;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomepageController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/')]
    public function indexAction(): Response
    {
        $configuracion = $this->entityManager->getRepository(Configuracion::class)->findOneBy([]);
        $categorias = $this->entityManager->getRepository(Categoria::class)->findAll(); // ya trae los productos.

        if (!$configuracion) throw $this->createNotFoundException('Configuración no disponible, debe cargar los detalles del negocio primero.');
        if (!$categorias) throw $this->createNotFoundException('Categorias no encontradas, debe cargar las categorias y asignarlas al menos a un producto existente del negocio primero.');

        return $this->render('front/index.html.twig', [
            'configuracion' => $configuracion,
            'categorias' => $categorias,
        ]);
    }
}