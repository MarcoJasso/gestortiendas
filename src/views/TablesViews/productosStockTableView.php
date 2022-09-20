<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

use corestore\controllers\ProductoStockController;

require_once '../../controllers/ProductoStockController.php';

$psController = new ProductoStockController();
$dataPS = json_decode(json_encode($psController->getAllProductoStock()));

if ($dataPS->error == 0):
    ?>
    <table class="mdl-data-table" style="width: 100% !important;" id="tb-p__stock">
        <thead>
        <tr>
            <th style="text-align: center;">id</th>
            <th style="text-align: center;">K-Producto</th>
            <th style="text-align: center;">Descripción</th>
            <th style="text-align: center;">Tipo de producto</th>
            <th style="text-align: center;">Stock</th>
            <th style="text-align: center;">Fecha entrada</th>
            <th style="text-align: center;">En venta</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td style="text-align: center;">1</td>
            <td style="text-align: center;">PO-001</td>
            <td style="text-align: left;">Acrylic (Transparent)</td>
            <td style="text-align: left;">Refresco</td>
            <td style="text-align: center;">25</td>
            <td style="text-align: left;">25 Agosto 2021</td>
            <td style="text-align: center;">25</td>
        </tr>
        </tbody>
    </table>

<?php
else:
    ?>
    <div class="mdl-card" style="margin: 5px auto; width: 50%">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Información!</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <pre id="pre__text"><strong>Mensaje :</strong> <?= $dataPS->message ?></pre>
        </div>
        <div class="mdl-card__menu">
            <i class="material-icons mdl-color-text--blue-800" style="font-size: 40px">info</i>
        </div>
    </div>
<?php
endif;