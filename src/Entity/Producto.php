<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductoRepository")
 */
class Producto
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nombre;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Assert\Positive(
     *      message = "This value should be positive"
     * )
     */
    private $Precio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Imagen;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Categoria;

    /**
     * @ORM\Column(type="array")
     */
    private $Tipo = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->Precio;
    }

    public function setPrecio(?float $Precio): self
    {
        $this->Precio = $Precio;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->Imagen;
    }

    public function setImagen(?string $Imagen): self
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->Categoria;
    }

    public function setCategoria(?string $Categoria): self
    {
        $this->Categoria = $Categoria;

        return $this;
    }

    public function getTipo(): ?array
    {
        return $this->Tipo;
    }

    public function setTipo(array $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }
}
