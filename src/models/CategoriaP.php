<?php

class CategoriaP
{
    protected int $id = 0;
    protected string $descripcion = "";
    protected int $estatus = 0;

    /**
     * @param int $id
     * @param string $descripcion
     * @param int $estatus
     */
    public function __construct(int $id, string $descripcion, int $estatus)
    {
        $this->id = $id;
        $this->descripcion = $descripcion;
        $this->estatus = $estatus;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getEstatus(): int
    {
        return $this->estatus;
    }



}