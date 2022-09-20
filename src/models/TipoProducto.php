<?php
namespace corestore\TipoProducto;

class TipoProducto
{
    protected int $id = 0;
    protected int $idCategoriaProducto = 0;
    protected string $descripcion = "";
    protected int $status = 0;

    /**
     * @param int $id
     * @param int $idCategoriaProducto
     * @param string $descripcion
     * @param int $status
     */
    public function __construct(int $id, int $idCategoriaProducto, string $descripcion, int $status)
    {
        $this->id = $id;
        $this->idCategoriaProducto = $idCategoriaProducto;
        $this->descripcion = $descripcion;
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getIdCategoriaProducto(): int
    {
        return $this->idCategoriaProducto;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }



}