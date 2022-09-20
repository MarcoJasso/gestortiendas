<?php

class Producto
{
    protected int $claveProdcuto = 0;
    protected string $descripcion = "";
    protected string $marca = "";
    protected int $tipoProdcuto = 0;
    protected string $tipoAlmacenaje = "";

    /**
     * @param int $claveProdcuto
     * @param string $descripcion
     * @param string $marca
     * @param int $tipoProdcuto
     * @param string $tipoAlmacenaje
     */
    public function __construct(int $claveProdcuto, string $descripcion, string $marca, int $tipoProdcuto, string $tipoAlmacenaje)
    {
        $this->claveProdcuto = $claveProdcuto;
        $this->descripcion = $descripcion;
        $this->marca = $marca;
        $this->tipoProdcuto = $tipoProdcuto;
        $this->tipoAlmacenaje = $tipoAlmacenaje;
    }


    /**
     * @return int
     */
    public function getClaveProdcuto(): int
    {
        return $this->claveProdcuto;
    }

    /**
     * @return string
     */
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @return int
     */
    public function getTipoProdcuto(): int
    {
        return $this->tipoProdcuto;
    }

    /**
     * @return string
     */
    public function getTipoAlmacenaje(): string
    {
        return $this->tipoAlmacenaje;
    }


}