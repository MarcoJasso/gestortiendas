<div style="display: flex; justify-content: center;">
    <main class="mdl-layout__content">
        <div class="mdl-tabs mdl-js-tabs">
            <div class="mdl-tabs__tab-bar">

                <a href="#tab1-panel__pre-p" id="link__00" class="mdl-tabs__tab is-active">Pre-productos</a>
                <a href="#tab2-panel__p-stock" id="link__01" class="mdl-tabs__tab">Stock</a>
                <a href="#tab3-panel__o-compra" id="link__02" class="mdl-tabs__tab">Orden de compra</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="tab1-panel__pre-p">
                <!-- MDL Progress Bar with Indeterminate Progress -->
                <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"
                     style="width: 100%;"></div>
            </div>

            <div class="mdl-tabs__panel" id="tab2-panel__p-stock">
                <!-- MDL Progress Bar with Indeterminate Progress -->
                <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate"
                     style="width: 100%;"></div>
            </div>

            <div class="mdl-tabs__panel" id="tab3-panel__o-compra">
                <!-- MDL Progress Bar with Indeterminate Progress -->
                <div id="p2" class="mdl-progress mdl-js-progress mdl-progress__indeterminate" style="width: 100%"></div>
            </div>


        </div>
    </main>
</div>
<script src="../../assets/js/almacen.js"></script>
<script type="text/javascript">
    if (!(typeof (componentHandler) == "undefined")) {
        componentHandler.upgradeAllRegistered();
    }
</script>