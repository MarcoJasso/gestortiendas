<?php
error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

use corestore\controllers\ProductoController;

include_once '../../controllers/ProductoController.php';
$p_controller = new ProductoController();
$dataProductoC = json_decode(json_encode($p_controller->getAllProductos()));
?>

<form>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--4-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded"
                 style="width: 100% !important;">
                <select class="mdl-textfield__input mdl-color-text--black" id="kp__rps" name="kp__rps">
                    <?php
                    if ($dataProductoC->error === 0):
                    for ($i = 0;
                         $i < count($dataProductoC->message);
                         $i++):
                        ?>
                        <option value="<?= $dataProductoC->message[$i]->clave_producto ?>"><?= '[ ' . $dataProductoC->message[$i]->marca . ' ] ' . $dataProductoC->message[$i]->desc_p ?></option>
                    <?php
                    endfor;
                    else:
                    ?>
                        <script>showAlertMessage("Puede que uo o más campos no funcionen correctamente.")</script>
                    <?php
                    endif;
                    ?>
                </select>
                <label class="mdl-textfield__label" for="kp__rps" style="text-align: center">Producto</label>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded">
                <select class="mdl-textfield__input mdl-color-text--black" id="te__rps" name="te__rps">
                    <option value="N/A">SIN EMPAQUE</option>
                    <?php
                    for ($i = 0; $i <= 10; $i++):
                        ?>
                        <option value="<?= $i ?>"><?= 'Empaque ' . $i ?></option>
                    <?php
                    endfor;
                    ?>
                </select>
                <label class="mdl-textfield__label" for="te__rps">Empaque de entrada</label>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded">
                <input class="mdl-textfield__input mdl-color-text--black" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                       id="cap__rps" name="cap__rps" value="0.00">
                <label class="mdl-textfield__label" for="cap__rps">Cantidad de empaque(s)</label>
                <span class="mdl-textfield__error">Solo números</span>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded">
                <input class="mdl-textfield__input mdl-color-text--black" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                       id="cop__rps" name="cop__rps" value="0.00">
                <label class="mdl-textfield__label" for="cop__rps">Contenido de empaque</label>
                <span class="mdl-textfield__error">Solo números</span>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded"
                 style="width: 100% !important;">
                <select class="mdl-textfield__input mdl-color-text--black" type="text" id="kum__rps" name="kum__rps">
                    <?php
                    for ($i = 0; $i <= 10; $i++):
                        ?>
                        <option value="<?= $i ?>"><?= 'Unidad de medida ' . $i ?></option>
                    <?php
                    endfor;
                    ?>
                </select>
                <label class="mdl-textfield__label" for="kum__rps" style="text-align: center">Unidad de medida *</label>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded">
                <input class="mdl-textfield__input mdl-color-text--black" type="date" value="<?= date('Y-m-d') ?>"
                       id="fc__rps" name="fc__rps">
                <label class="mdl-textfield__label" for="fc__rps">Fecha de caducidad</label>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded"
                 style="width: 100%">
                <input class="mdl-textfield__input mdl-color-text--black" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                       id="pcp__rps" name="pcp__rps" value="0.00">
                <label class="mdl-textfield__label" for="pcp__rps">Precio compra ( $ ) *</label>
                <span class="mdl-textfield__error">Solo números</span>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded"
                 style="width: 100%">
                <input class="mdl-textfield__input mdl-color-text--black mdl-color--amber-50" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                       id="pmp__rps" name="pmp__rps" value="0.00">
                <label class="mdl-textfield__label" for="pmp__rps">Precio mayoreo ( $ ) *</label>
                <span class="mdl-textfield__error">Solo números</span>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--3-col">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded"
                 style="width: 100%">
                <input class="mdl-textfield__input mdl-color-text--black mdl-color--amber-50" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                       id="pup__rps" name="pup__rps" value="0.00">
                <label class="mdl-textfield__label" for="pup__rps">Precio unitario ( $ ) *</label>
                <span class="mdl-textfield__error">Solo números</span>
            </div>
        </div>

        <div class="mdl-cell mdl-cell--12-col">
            <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
                <input type="checkbox" id="switch-1" class="mdl-switch__input">
                <span class="mdl-switch__label mdl-color-text--grey-800">Se venderá a granel?</span>
            </label>
        </div>

        <div class="mdl-cell--12-col">
            <div class="mdl-grid" style="display: none;" id="cont__ind_p">

                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded">
                        <input class="mdl-textfield__input mdl-color-text--black" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                               id="capind__rps" name="capind__rps" value="0.00">
                        <label class="mdl-textfield__label" for="capind__rps">Cantidad de piezas</label>
                        <span class="mdl-textfield__error">Solo números</span>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--3-col">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-dirty is-focused is-upgraded"
                         style="width: 100%">
                        <input class="mdl-textfield__input mdl-color-text--black mdl-color--amber-50" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                               id="pind__rps" name="pind__rps" value="0.00">
                        <label class="mdl-textfield__label" for="pind__rps">Precio unitario ( $ )</label>
                        <span class="mdl-textfield__error">Solo números</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $('#switch-1').change(function (){
        if ($(this).is(':checked')){
            $('#cont__ind_p').css('display', '');
        }else{
            $('#cont__ind_p').css('display', 'none');
        }
    })
</script>
<script type="text/javascript">
    if (!(typeof (componentHandler) == "undefined")) {
        componentHandler.upgradeAllRegistered();
    }
</script>