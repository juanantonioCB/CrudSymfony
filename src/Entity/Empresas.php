<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresasRepository")
 */
class Empresas
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "El nombre debe tener como mínimo {{ limit }} caracteres",
     *      maxMessage = "El nombre debe tener como máximo {{ limit }} caracteres"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $Nombre;

    /**
     * @Assert\NotBlank
     * @Assert\Length(
     *      min = 2,
     *      max = 255,
     *      minMessage = "La dirección debe tener como mínimo {{ limit }} caracteres",
     *      maxMessage = "La dirección debe tener como máxima {{ limit }} caracteres"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $Direccion;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $FechaRegistro;

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

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(string $Direccion): self
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getFechaRegistro(): ?\DateTimeInterface
    {
        return $this->FechaRegistro;
    }

    public function setFechaRegistro(?\DateTimeInterface $FechaRegistro): self
    {
        $this->FechaRegistro = $FechaRegistro;

        return $this;
    }
}
