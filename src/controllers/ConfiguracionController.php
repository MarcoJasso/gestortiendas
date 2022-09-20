<?php
require '../../serv/ConnSQLP.php';

class ConfiguracionController extends Server
{

    function getAllProductos(): string
    {
        $conn = $this->connection();

        if (isset($conn)):
            return "Conexión exitosa";
        else:
            return "Conexión fallida";
        endif;
    }
}