<?php

namespace corestore\controllers\TipoPController {

    require_once '../../serv/ConnSQLP.php';

    use corestore\serv\ConnSQLP;
    use Exception;
    use PDO;

    class TipoPController extends ConnSQLP
    {

        public function getAllTipoP(): array
        {
            $conn = $this->connection();

            if ($conn != null):
                try {
                    $query = $conn->query("SELECT * FROM almacen.conf_tipo_producto ORDER BY descripcion;");
                    $response = $query->fetchAll();

                    # foreach ($response as $res):
                    #     $item = new TipoProducto(
                    #         $res->id_tipo_producto,
                    #         $res->id_cat_proucto,
                    #         $res->descripcion,
                    #         $res->estatus
                    #     );
                    #     array_push($auxiliar, $item);
                    # endforeach;

                    if (count($response) > 0):
                        return ["error" => 0, 'message' => $response];
                    else:
                        return ["error" => 1, 'message' => 'No se han encontrado elementos.'];
                    endif;
                } catch (Exception $e) {
                    return ["error" => 1, 'message' => $e->getMessage()];
                }
            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;

        }

        public function getTProductoByIdCategoria($idTP): array
        {
            $conn = $this->connection();
            if (isset($conn)):

                $query = $conn->prepare("SELECT * FROM almacen.conf_tipo_producto WHERE cat_producto = ? AND estatus = '1'");
                $query->execute([$idTP]);
                $response = $query->fetchAll(PDO::FETCH_ASSOC);

                if (!$response):
                    return ['error' => 1, 'message' => "No exite el producto con la clave $idTP."];
                else:
                    return ['error' => 0, 'message' => json_encode($response)];
                endif;

            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;
        }
        public function getTProductoById($idTP): array
        {
            $conn = $this->connection();
            if (isset($conn)):

                $query = $conn->prepare("SELECT * FROM almacen.conf_tipo_producto WHERE id_tipo_producto = ? AND estatus = '1'");
                $query->execute([$idTP]);
                $response = $query->fetch(PDO::FETCH_ASSOC);

                if (!$response):
                    return ['error' => 1, 'message' => "No exite el producto con la clave $idTP."];
                else:
                    return ['error' => 0, 'message' => json_encode($response)];
                endif;

            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;
        }

    }
}