<?php

namespace corestore\controllers;
require_once '../../serv/ConnSQLP.php';
use corestore\serv\ConnSQLP;
use Exception;
use PDO;

class ProductoStockController extends ConnSQLP
{
    public function getAllProductoStock(): array
    {
        $conn = $this->connection();
        if (isset($conn)):
            $query = $conn->query("SELECT * FROM almacen.producto;");
            $response = $query->fetchAll(PDO::FETCH_ASSOC);

            if (count($response) > 0):
                return ['error' => 0, 'message' => $response];
            else:
                return ['error' => 1, 'message' => 'No se han encontrado productos en stock <br/>hasta el momento.'];
            endif;
        else:
            return ['error' => 1, 'message' => 'ERROR_BD_CONNECTION'];
        endif;
    }

    public function addNewProducto($data): array
    {
        $conn = $this->connection();

        if ($conn != null):

            try {
                $dataP = json_decode(json_encode($data), true);
                $query = $conn->prepare("INSERT INTO almacen.producto(producto, precio_compra, precio_mayoreo, precio_unitario_venta, unidad_medida, cantidad_empaques, cantidad_contenido_empaque, fecha_entrada, fecha_caducidad) VALUES (?, ?, ?, ?, ?, ?)");
                $response = $query->execute([$dataP['kp__rps'], $dataP['pcp__rps'], $dataP['pmp__rps'], $dataP['pup__rps'], $dataP['kum__rps'], $dataP['cap__rps'], $dataP['cop__rps'], '', '']);

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
}