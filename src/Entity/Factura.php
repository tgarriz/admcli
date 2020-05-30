<?php

namespace App\Entity;

use App\Repository\FacturaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FacturaRepository::class)
 */
class Factura
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaGenerada;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaVencimiento;

    /**
     * @ORM\Column(type="integer")
     */
    private $valor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $pagada;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $fechaDePago;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class, inversedBy="facturas")
     */
    private $cliente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFechaGenerada(): ?\DateTimeInterface
    {
        return $this->fechaGenerada;
    }

    public function setFechaGenerada(\DateTimeInterface $fechaGenerada): self
    {
        $this->fechaGenerada = $fechaGenerada;

        return $this;
    }

    public function getFechaVencimiento(): ?\DateTimeInterface
    {
        return $this->fechaVencimiento;
    }

    public function setFechaVencimiento(\DateTimeInterface $fechaVencimiento): self
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    public function getValor(): ?int
    {
        return $this->valor;
    }

    public function setValor(int $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getPagada(): ?bool
    {
        return $this->pagada;
    }

    public function setPagada(bool $pagada): self
    {
        $this->pagada = $pagada;

        return $this;
    }

    public function getFechaDePago(): ?\DateTimeInterface
    {
        return $this->fechaDePago;
    }

    public function setFechaDePago(?\DateTimeInterface $fechaDePago): self
    {
        $this->fechaDePago = $fechaDePago;

        return $this;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getMp(): ?string
    {
        return $this->mp;
    }

    public function setMp(?string $mp): self
    {
        $this->mp = $mp;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->id;
    }

    public function configuraFactura(?Cliente $cliente, ?datetime $fechaGen, ?datetime $fechaVenc)
    {
        $this->cliente = $cliente;
        $this->fechaGenerada = $fechaGen;
        $this->fechaVencimiento = $fechaVenc;
        $this->valor = $cliente->getPlan()->getValor();
        $this->pagada = false;
        $this->mp = $this->id;
    }
}
