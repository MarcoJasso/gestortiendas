<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

require_once '../../controllers/CategariaPController.php';

use corestore\controllers\CategariaPController;

$cController = new CategariaPController();

if (!empty($_POST['dataSIC'])):
    $dataSIC = json_decode(json_encode($_POST['dataSIC']));
    switch ($dataSIC->op):
        case 'g_by_id':
            echo json_encode(['error' => 0, 'message' => 'OK']);
            break;
    endswitch;
else:
    echo json_encode(['error' => 1, 'message' => 'No se recibió ningún dato.']);
endif;