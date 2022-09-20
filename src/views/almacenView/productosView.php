<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use corestore\controllers\CategariaPController;
use corestore\controllers\ProductoController;

require_once '../../controllers/CategariaPController.php';
require_once '../../controllers/ProductoController.php';

$confPController = new ProductoController();
$confCPController = new CategariaPController();

$dataCP = json_decode(json_encode($confCPController->getAllCategoriaProducto()));
$kPC = json_decode(json_encode($confPController->getKeyProducto()));

$list_tipo_almacenaje = array("REF" => "Refigeración", "CONG" => "Congelación", "SEC" => "Seco");

?>

<div class="mdl-card mdl-shadow--4dp" style="width: 95%; margin: 10px auto;">
    <div class="mdl-card__supporting-text" style="width: 100%; padding: 0">
        <form method="post" id="form__p">
            <div class="mdl-grid">

                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" id="divForm">
                        <input class="mdl-textfield__input mdl-color-text--amber-900" type="text" id="kp" name="kp" style="text-align: center"
                               value="<?=$kPC->message?>" readonly/>
                        <label class="mdl-textfield__label" for="kp" style="text-align: center">K-Producto</label>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--4-col-tablet" id="divForm">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input mdl-color-text--black" type="text" id="dp" name="dp"/>
                        <label class="mdl-textfield__label" for="dp" style="text-align: center">Descripción</label>
                        <span class="mdl-textfield__error">Es necesario una descripción</span>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--4-col-tablet" id="divForm">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input mdl-color-text--black" type="text" id="mp" name="mp"/>
                        <label class="mdl-textfield__label" for="mp" style="text-align: center">Marca</label>
                        <span class="mdl-textfield__error">Es necesario una marca</span>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--4-col-tablet" id="selectForm">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <select class="mdl-textfield__input mdl-color-text--black" type="text" id="ta_p" name="ta_p">
                            <?php
                            foreach ($list_tipo_almacenaje as $key => $value):
                                echo "<option value='$key'>$value</option>";
                            endforeach;
                            ?>
                        </select>
                        <label class="mdl-textfield__label" for="ta_p" style="text-align: center">Tipo de
                            almacenaje</label>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--3-col-phone mdl-cell--3-col-tablet" id="selectForm">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <select class="mdl-textfield__input mdl-color-text--black" type="text" id="catp" name="catp">
                            <?php
                            if ($dataCP->error == 0):
                                for ($i = 0; $i < count($dataCP->message); $i++):
                                    $item = json_decode(json_encode($dataCP->message[$i]));
                                    ?>
                                    <option value="<?= $item->id_cat_producto ?>"><?= $item->descripcion ?></option>
                                <?php
                                endfor;
                            endif;
                            ?>
                        </select>
                        <label class="mdl-textfield__label" for="catp" style="text-align: center">Categoria de producto</label>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-phone mdl-cell--4-col-tablet" id="selectForm">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <select class="mdl-textfield__input mdl-color-text--grey-500" type="text" id="tp" name="tp" disabled>
                        </select>
                        <label class="mdl-textfield__label" for="tp" style="text-align: center">Tipo de producto</label>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--2-col mdl-cell--3-col-phone mdl-cell--3-col-tablet" id="selectForm">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <select class="mdl-textfield__input mdl-color-text--black" type="text" id="s_p" name="s_p">
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                        <label class="mdl-textfield__label" for="s_p" style="text-align: center">Estatus</label>
                    </div>
                </div>

                <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--12-col-tablet"
                     style="padding: 5px 10px">
                    <div style="display: flex; justify-content: center; ">
                        <input type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--light-blue-900"
                               style="margin: 0 5px" value="guardar" id="btn__p--pre"/>
                        <input type="reset" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--amber-900"
                               style="margin: 0 5px" value="limpiar" id="btn__pc--pre"/>
                        <input type="reset" class="mdl-button mdl-js-button mdl-js-ripple-effect"
                               style="margin: 0 5px" value="actualizar" id="btn__pu--pre" disabled/>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="mdl-card mdl-shadow--2dp" style="width: 95%; margin: 10px auto;">
    <div id="tb--content__view" style="padding: 5px">
        <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"
             style="width: 100%;"></div>
    </div>
</div>

<script src="../../assets/js/mod-almacen/mod-almacen-pre-p.js"></script>
<script type="text/javascript">
    if (!(typeof (componentHandler) == "undefined")) {
        componentHandler.upgradeAllRegistered();
    }
</script>