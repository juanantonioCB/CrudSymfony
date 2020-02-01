<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpleadosRepository")
 */
class Empleados
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
     *      minMessage = "Los apellidos deben tener como mínimo {{ limit }} caracteres",
     *      maxMessage = "Los apellidos deben tener como máximo {{ limit }} caracteres"
     * )
     * @ORM\Column(type="string", length=255)
     */
    private $Apellidos;

    /**
     * @Assert\Positive(
     *      message = "Este valor debe ser positivo"
     * )
     * @ORM\Column(type="integer")
     */
    private $NumeroHijos;

    /**
     * @ORM\Column(type="date")
     */
    private $FechaNacimiento;

    /**
     * @ORM\Column(type="array")
     */
    private $EstadoCivil = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $Activo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Imagen;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresas", inversedBy="empleados")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Empresa;

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

    public function getApellidos(): ?string
    {
        return $this->Apellidos;
    }

    public function setApellidos(string $Apellidos): self
    {
        $this->Apellidos = $Apellidos;

        return $this;
    }

    public function getNumeroHijos(): ?int
    {
        return $this->NumeroHijos;
    }

    public function setNumeroHijos(int $NumeroHijos): self
    {
        $this->NumeroHijos = $NumeroHijos;

        return $this;
    }

    public function getFechaNacimiento(): ?\DateTimeInterface
    {
        return $this->FechaNacimiento;
    }

    public function setFechaNacimiento(\DateTimeInterface $FechaNacimiento): self
    {
        $this->FechaNacimiento = $FechaNacimiento;

        return $this;
    }

    public function getEstadoCivil(): ?array
    {
        return $this->EstadoCivil;
    }

    public function setEstadoCivil(array $EstadoCivil): self
    {
        $this->EstadoCivil = $EstadoCivil;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->Activo;
    }

    public function setActivo(bool $Activo): self
    {
        $this->Activo = $Activo;

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

    public function getEmpresa(): ?Empresas
    {
        return $this->Empresa;
    }

    public function setEmpresa(?Empresas $Empresa): self
    {
        $this->Empresa = $Empresa;

        return $this;
    }
}
