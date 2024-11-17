<?php

namespace App\Entity;

use App\Repository\SucursalRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SucursalRepository::class)]
class Sucursal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\ManyToOne(inversedBy: 'sucursales')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Comercio $comercio_id = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $plantilla = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $logo_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $banner_url = null;

    #[ORM\Column(length: 255)]
    private ?string $direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $horarios_de_atencion = null;

    #[ORM\Column(length: 50)]
    private ?string $telefono = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $whatsapp_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $facebook_url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $instagram_url = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getComercioId(): ?Comercio
    {
        return $this->comercio_id;
    }

    public function setComercioId(?Comercio $comercio_id): static
    {
        $this->comercio_id = $comercio_id;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getPlantilla(): ?string
    {
        return $this->plantilla;
    }

    public function setPlantilla(string $plantilla): static
    {
        $this->plantilla = $plantilla;

        return $this;
    }

    public function getLogoUrl(): ?string
    {
        return $this->logo_url;
    }

    public function setLogoUrl(?string $logo_url): static
    {
        $this->logo_url = $logo_url;

        return $this;
    }

    public function getBannerUrl(): ?string
    {
        return $this->banner_url;
    }

    public function setBannerUrl(?string $banner_url): static
    {
        $this->banner_url = $banner_url;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): static
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getHorariosDeAtencion(): ?string
    {
        return $this->horarios_de_atencion;
    }

    public function setHorariosDeAtencion(string $horarios_de_atencion): static
    {
        $this->horarios_de_atencion = $horarios_de_atencion;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): static
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getWhatsappUrl(): ?string
    {
        return $this->whatsapp_url;
    }

    public function setWhatsappUrl(string $whatsapp_url): static
    {
        $this->whatsapp_url = $whatsapp_url;

        return $this;
    }

    public function getFacebookUrl(): ?string
    {
        return $this->facebook_url;
    }

    public function setFacebookUrl(?string $facebook_url): static
    {
        $this->facebook_url = $facebook_url;

        return $this;
    }

    public function getInstagramUrl(): ?string
    {
        return $this->instagram_url;
    }

    public function setInstagramUrl(?string $instagram_url): static
    {
        $this->instagram_url = $instagram_url;

        return $this;
    }
}
