<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

require_once '../../controllers/TipoPController.php';

use corestore\controllers\TipoPController\TipoPController;

$tpController = new TipoPController();

if (!empty($_POST['dataTIP'])):
    $dataTIP = json_decode(json_encode($_POST['dataTIP']));
    switch ($dataTIP->op):
        case 'g_by_id_cat':
            echo json_encode($tpController->getTProductoByIdCategoria($dataTIP->data));
            break;
        case 'g_by_id':
            echo json_encode($tpController->getTProductoById($dataTIP->data));
            break;
    endswitch;
else:
    echo json_encode(['error' => 1, 'message' => 'No se recibió ningún dato.']);
endif;