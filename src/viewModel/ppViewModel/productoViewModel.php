<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

use corestore\controllers\ProductoController;

require_once '../../controllers/ProductoController.php';

$pController = new ProductoController();

if (!empty($_POST['dataF'])):

    $dataF = json_decode(json_encode($_POST['dataF']), true);
    # echo implode(',', ['error' => 0, 'message' => 'Producto agregado correctamente.']);
    switch ($dataF['op']):
        case 'add':
            # echo implode(',', $pController->addNewProducto($dataF['dataForm']));
            echo json_encode($pController->addNewProducto($dataF['dataForm']));
            break;
        case 'g_one':
            # echo implode(',', $pController->getOneProducto($dataF['dataForm']));
            echo json_encode($pController->getOneProducto($dataF['dataForm']));
            break;
        case 'up-k-p':
            echo json_encode($pController->getKeyProducto());
            break;
        case 'up-p':
            echo json_encode($pController->updateProducto($dataF['dataForm']));
            break;
    endswitch;

else:
    echo json_encode(['error' => 1, 'message' => 'No se recibió ningún dato.']);
endif;