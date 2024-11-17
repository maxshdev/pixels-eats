<?php

namespace App\Controller\Front;

use App\Entity\Categoria;
use App\Entity\Comercio;
use App\Entity\Sucursal;
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
        return $this->render('front/index.html.twig', [
            'configuracion' => true
        ]);
    }
    
    #[Route('/{slug_comercio}/{slug_sucursal}')]
    public function sucursalAction(string $slug_comercio, string $slug_sucursal): Response
    {
        $sucursal = $this->entityManager->getRepository(Sucursal::class)->findOneBy(['slug' => $slug_sucursal]);
        if (!$sucursal) throw $this->createNotFoundException('La Sucursal no existe.');
        
        $comercio = $sucursal->getComercioId();
        if ($comercio->getSlug() != $slug_comercio) throw $this->createNotFoundException('El Comercio no existe.');

        $categorias = $comercio->getCategorias();
        if (!$categorias) throw $this->createNotFoundException('Categorias no encontradas, debe cargar las categorias y asignarlas al menos a un producto existente del negocio primero.');

        $plantilla = $sucursal->getPlantilla();

        return $this->render('front/plantillas/' . $plantilla . '.html.twig', [
            'sucursal' => $sucursal,
            'categorias' => $categorias,
        ]);
    }
}