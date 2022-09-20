<div class="mdl-grid">

    <div class="mdl-cell mdl-cell--2-col mdl-cell--2-col-phone mdl-cell--2-col-tablet">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="folio_noc" style="text-align: center"/>
            <label class="mdl-textfield__label" for="folio_noc" style="text-align: center">Folio</label>
        </div>
    </div>

    <div class="mdl-cell mdl-cell--4-col mdl-cell--4-col-phone mdl-cell--4-col-tablet">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="date" id="fecha-solc_noc" value="<?= date('Y-m-d')?>" style="text-align: center"/>
            <label class="mdl-textfield__label" for="fecha-solc_noc" style="text-align: center">Fecha de solicitud</label>
        </div>
    </div>

    <div class="mdl-cell mdl-cell--3-col mdl-cell--3-col-phone mdl-cell--3-col-tablet">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" id="fecha-solc_noc" value="NameUser" style="text-align: center"/>
            <label class="mdl-textfield__label" for="fecha-solc_noc" style="text-align: center">Usuario</label>
        </div>
    </div>

    <div class="mdl-cell mdl-cell--3-col mdl-cell--3-col-phone mdl-cell--3-col-tablet">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select class="mdl-textfield__input" type="text" id="fecha-solc_noc" style="text-align: center">
            </select>
            <label class="mdl-textfield__label" for="fecha-solc_noc" style="text-align: center">Proveedor</label>
        </div>
    </div>

    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
        <input type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color-text--amber-900" value="agregar articulo" style="width: 100%; border: 1px solid rgb(255,111,0)"/>
    </div>

    <div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-phone mdl-cell--12-col-tablet">
        <table class="mdl-data-table" style="width: 100%">
            <thead>
            <tr>
                <th>No.</th>
                <th>Artículo</th>
                <th>Cantidad</th>
                <th>Precio unitario</th>
                <th>Precio total</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript">
    if (!(typeof (componentHandler) == "undefined")) {
        componentHandler.upgradeAllRegistered();
    }
</script>
