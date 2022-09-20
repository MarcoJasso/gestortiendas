<?php

use corestore\controllers\ProductoStockController;

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

require_once '../../controllers/ProductoStockController.php';

$ppsController = new ProductoStockController();

if (!empty($_POST['dataPS'])):
    $dataPS = json_decode(json_encode($_POST['dataPS']));
    switch ($dataPS->op):
        case 'g_all_ps':
            echo json_encode($ppsController->getAllProductoStock());
            break;
    endswitch;
else:
    echo json_encode(['error' => 1, 'message' => 'No se recibió ningún dato.']);
endif;
