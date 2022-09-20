<?php

namespace corestore\controllers {

    require_once '../../serv/ConnSQLP.php';

    use corestore\serv\ConnSQLP;

    class CategariaPController extends ConnSQLP
    {
        public function getAllCategoriaProducto(): array
        {
            $conn = $this->connection();
            if (isset($conn)):
                $query = $conn->query("SELECT * FROM almacen.conf_categoria_producto ORDER BY descripcion;");
                $response = $query->fetchAll();

                if (count($response) > 0):
                    return ['error' => 0, 'message' => $response];
                else:
                    return ['error' => 1, 'message' => 'No se han encontrado registros aún.'];
                endif;
            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;
        }
    }
}

