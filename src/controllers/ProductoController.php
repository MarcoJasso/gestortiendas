<?php

namespace corestore\controllers {

    require_once '../../serv/ConnSQLP.php';

    use corestore\serv\ConnSQLP;
    use Exception;
    use JetBrains\PhpStorm\ArrayShape;
    use PDO;

    class ProductoController extends ConnSQLP
    {

        public function getAllProductos(): array
        {
            $conn = $this->connection();
            if (isset($conn)):
                $query = $conn->query("SELECT acp.clave_producto, acp.descripcion AS desc_p, acp.marca, acp.tipo_producto, ctp.descripcion AS desc_tp, acp.estatus FROM almacen.conf_prodcutos AS acp INNER JOIN almacen.conf_tipo_producto AS ctp on ctp.id_tipo_producto = acp.tipo_producto ORDER BY acp.descripcion;");
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

        #[ArrayShape(['error' => "int", 'message' => "string"])] public function addNewProducto($data): array
        {
            $conn = $this->connection();

            if ($conn != null):

                try {
                    $dataP = json_decode(json_encode($data), true);
                    $query = $conn->prepare("INSERT INTO almacen.conf_prodcutos(clave_producto, descripcion, marca, tipo_producto, tipo_almacenaje, estatus) VALUES (?, ?, ?, ?, ?, ?)");
                    $response = $query->execute([$dataP['kp'], $dataP['dp'], $dataP['mp'], $dataP['tp'], $dataP['ta_p'], $dataP['s_p']]);

                    if ($response):
                        return ['error' => 0, 'message' => 'Producto agregado correctamente.'];
                    else:
                        return ['error' => 1, 'message' => 'El producto no se agrego correctamente.'];
                    endif;
                } catch (Exception $e) {
                    return ['error' => 1, 'message' => "\n" . $e->getMessage()];
                }
            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;
        }

        public function getOneProducto($key_p): array
        {
            $conn = $this->connection();
            if (isset($conn)):
                # $query = $conn->query("SELECT * FROM conf.conf_prodcutos WHERE clave_producto = ?");
                $query = $conn->prepare("SELECT * FROM almacen.conf_prodcutos WHERE clave_producto = ?");
                $query->execute([$key_p]);
                $response = $query->fetch(PDO::FETCH_ASSOC);

                if (!$response):
                    return ['error' => 1, 'message' => "No exite el producto con la clave $key_p."];
                else:
                    return ['error' => 0, 'message' => json_encode($response)];
                endif;

            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;
        }

        public function getCount(): array
        {
            $conn = $this->connection();

            if ($conn != null) {

                try {

                    $query = $conn->query("SELECT count(clave_producto) FROM almacen.conf_prodcutos;");
                    $response = $query->fetchAll(PDO::FETCH_ASSOC);

                    return ['error' => 0, 'message' => $response[0]['count'] + 1];

                } catch (Exception $e) {
                    return ['error' => 1, 'message' => $e->getMessage()];
                }
            } else {
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            }
        }

        #[ArrayShape(['error' => "int", 'message' => "string"])] public function getKeyProducto(): array
        {
            $conn = $this->connection();

            if ($conn != null) {

                try {

                    $query = $conn->query("SELECT count(clave_producto) FROM almacen.conf_prodcutos;");
                    $response = $query->fetchAll(PDO::FETCH_ASSOC);

                    # return ['error' => 0, 'message' => $response[0]['count'] + 1];
                    return ['error' => 0, 'message' => 'PO-' . str_pad(($response[0]['count'] + 1), 4, '0', STR_PAD_LEFT)];

                } catch (Exception $e) {
                    return ['error' => 1, 'message' => $e->getMessage()];
                }
            } else {
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            }
        }

        #[ArrayShape(['error' => "int", 'message' => "string"])] public function updateProducto($data): array
        {
            $conn = $this->connection();

            if ($conn != null):

                try {
                    $dataP = json_decode(json_encode($data), true);
                    $query = $conn->prepare("UPDATE almacen.conf_prodcutos SET descripcion = ?, marca = ?, tipo_almacenaje = ?, tipo_producto = ?, estatus = ? WHERE clave_producto = ?;");
                    $response = $query->execute([$dataP['dp'], $dataP['mp'], $dataP['ta_p'], $dataP['tp'], $dataP['s_p'], $dataP['kp']]);

                    if ($response):
                        return ['error' => 0, 'message' => 'Producto actualizado correctamente.'];
                    else:
                        return ['error' => 1, 'message' => 'El producto no se actualizó correctamente.'];
                    endif;
                } catch (Exception $e) {
                    return ['error' => 1, 'message' => $e->getMessage()];
                }
            else:
                return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
            endif;
        }
    }
}