<?php

namespace App\Entity;

use App\Repository\ComercioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComercioRepository::class)]
class Comercio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'comercios')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $admin_id = null;

    /**
     * @var Collection<int, Sucursal>
     */
    #[ORM\OneToMany(targetEntity: Sucursal::class, mappedBy: 'comercio_id')]
    private Collection $sucursales;

    /**
     * @var Collection<int, Categoria>
     */
    #[ORM\OneToMany(targetEntity: Categoria::class, mappedBy: 'comercio_id')]
    private Collection $categorias;

    public function __construct()
    {
        $this->sucursales = new ArrayCollection();
        $this->categorias = new ArrayCollection();
    }

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getAdminId(): ?Usuario
    {
        return $this->admin_id;
    }

    public function setAdminId(?Usuario $admin_id): static
    {
        $this->admin_id = $admin_id;

        return $this;
    }

    /**
     * @return Collection<int, Sucursal>
     */
    public function getSucursales(): Collection
    {
        return $this->sucursales;
    }

    public function addSucursale(Sucursal $sucursale): static
    {
        if (!$this->sucursales->contains($sucursale)) {
            $this->sucursales->add($sucursale);
            $sucursale->setComercioId($this);
        }

        return $this;
    }

    public function removeSucursale(Sucursal $sucursale): static
    {
        if ($this->sucursales->removeElement($sucursale)) {
            // set the owning side to null (unless already changed)
            if ($sucursale->getComercioId() === $this) {
                $sucursale->setComercioId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Categoria>
     */
    public function getCategorias(): Collection
    {
        return $this->categorias;
    }

    public function addCategoria(Categoria $categoria): static
    {
        if (!$this->categorias->contains($categoria)) {
            $this->categorias->add($categoria);
            $categoria->setComercioId($this);
        }

        return $this;
    }

    public function removeCategoria(Categoria $categoria): static
    {
        if ($this->categorias->removeElement($categoria)) {
            // set the owning side to null (unless already changed)
            if ($categoria->getComercioId() === $this) {
                $categoria->setComercioId(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->nombre ?? 'N/A';
    }
}
