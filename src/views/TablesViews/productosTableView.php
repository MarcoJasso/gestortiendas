<?php

require_once '../../controllers/ProductoController.php';

use corestore\controllers\ProductoController;

$pController = new ProductoController();

$dataPC = json_decode(json_encode($pController->getAllProductos()), true);
if ($dataPC['error'] == 0):
    ?>
    <table class="mdl-data-table" style="width: 100%" id="tb-p__p-producto">
        <thead>
        <tr>
            <th style="text-align: center">Clave</th>
            <th style="text-align: center">Producto</th>
            <th style="text-align: center">Marca</th>
            <th style="text-align: center">Tipo de producto</th>
            <th style="text-align: center">Estatus</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $dataItems = json_decode(json_encode($dataPC['message']), true);
        for ($i = 0; $i < count($dataItems); $i++):
            ?>
            <tr id="<?= $dataItems[$i]['clave_producto'] ?>">
                <td style="text-align: left"><?= $dataItems[$i]['clave_producto'] ?></td>
                <td style="text-align: left"><?= $dataItems[$i]['desc_p'] ?></td>
                <td style="text-align: left"><?= $dataItems[$i]['marca'] ?></td>
                <td style="text-align: left"><?= $dataItems[$i]['desc_tp'] ?></td>
                <?php
                if (intval($dataItems[$i]['estatus']) == 1):
                    ?>
                    <td style="text-align: center; font-weight: bold" class="mdl-color-text--green-800">Activo</td>
                <?php
                else:
                    ?>
                    <td style="text-align: center; font-weight: bold" class="mdl-color-text--red-900">Baja</td>
                <?php
                endif;
                ?>
            </tr>
        <?php
        endfor;
        ?>
        </tbody>
    </table>
    <script src="../../assets/js/mod-tables/p-table-v.js"></script>
<?php
else:
    ?>
    <div class="mdl-card" style="margin: 5px auto; width: 100%">
        <div class="mdl-card__title">
            <h2 class="mdl-card__title-text">Información!</h2>
        </div>
        <div class="mdl-card__supporting-text">
            <pre id="pre__text"><strong>Mensaje :</strong> <?= $dataPC['message'] ?></pre>
        </div>
        <div class="mdl-card__menu">
            <i class="material-icons mdl-color-text--blue-800" style="font-size: 40px">info</i>
        </div>
    </div>
<?php
endif;