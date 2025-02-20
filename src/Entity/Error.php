<?php

namespace App\Entity;

use App\Repository\ErrorRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ErrorRepository::class)]
class Error
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type:"datetime")]
    private $fecha;

    #[ORM\Column(type:"string", length:500, nullable:true)]
    private $archivo;

    #[ORM\Column(type:"text", nullable:true)]
    private $mensaje;

    #[ORM\Column(type:"text", nullable:true)]
    private $traza;

    #[ORM\Column(type:"string", length:100, nullable:true)]
    private $usuario;

    #[ORM\Column(type:"string", length:250, nullable:true)]
    private $ruta;

    #[ORM\Column(type:"string", length:100, nullable:true)]
    private $entorno;

    #[ORM\Column(type:"string", length:100, nullable:true)]
    private $contenedor;

    #[ORM\Column(type: "json", nullable: true)]
    private $usuario_objeto;

    #[ORM\Column(type: "json", nullable: true)]
    private $contenedor_objeto;

    #[ORM\Column(type: "json", nullable: true)]
    private $data;

    #[ORM\Column(type: "json", nullable: true)]
    private $peticion;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getArchivo()
    {
        return $this->archivo;
    }

    /**
     * @param mixed $archivo
     */
    public function setArchivo($archivo): void
    {
        $this->archivo = $archivo;
    }

    /**
     * @return mixed
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * @param mixed $mensaje
     */
    public function setMensaje($mensaje): void
    {
        $this->mensaje = $mensaje;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario): void
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getRuta()
    {
        return $this->ruta;
    }

    /**
     * @param mixed $ruta
     */
    public function setRuta($ruta): void
    {
        $this->ruta = $ruta;
    }

    /**
     * @return mixed
     */
    public function getTraza()
    {
        return $this->traza;
    }

    /**
     * @param mixed $traza
     */
    public function setTraza($traza): void
    {
        $this->traza = $traza;
    }

    /**
     * @return mixed
     */
    public function getEntorno()
    {
        return $this->entorno;
    }

    /**
     * @param mixed $entorno
     */
    public function setEntorno($entorno): void
    {
        $this->entorno = $entorno;
    }

    /**
     * @return mixed
     */
    public function getContenedor()
    {
        return $this->contenedor;
    }

    /**
     * @param mixed $contenedor
     */
    public function setContenedor($contenedor): void
    {
        $this->contenedor = $contenedor;
    }

    /**
     * @return mixed
     */
    public function getUsuarioObjeto()
    {
        return $this->usuario_objeto;
    }

    /**
     * @param mixed $usuario_objeto
     */
    public function setUsuarioObjeto($usuario_objeto): void
    {
        $this->usuario_objeto = $usuario_objeto;
    }

    /**
     * @return mixed
     */
    public function getContenedorObjeto()
    {
        return $this->contenedor_objeto;
    }

    /**
     * @param mixed $contenedor_objeto
     */
    public function setContenedorObjeto($contenedor_objeto): void
    {
        $this->contenedor_objeto = $contenedor_objeto;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data): void
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getPeticion()
    {
        return $this->peticion;
    }

    /**
     * @param mixed $peticion
     */
    public function setPeticion($peticion): void
    {
        $this->peticion = $peticion;
    }



}