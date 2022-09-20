$(function () {
    $.ajax({
        url: '../../views/almacenView/productosView.php',
        async: true,
        success: function (request) {

            $('#tab1-panel__pre-p').html(request);

            $.ajax({
                url: "../../views/TablesViews/productosTableView.php",
                dataType: 'html',
                async: true,
                success: function (resp) {
                    $('#tb--content__view').html(resp);
                    $('#tb-p__p-producto').DataTable();
                }
            });
        }
    });
});

$('#link__00').on('click', function () {
    $.ajax({
        url: '../../views/almacenView/productosView.php',
        async: true,
        success: function (request) {

            $('#tab1-panel__pre-p').html(request);

            $.ajax({
                url: "../../views/TablesViews/productosTableView.php",
                async: true,
                success: function (resp) {
                    $('#tb--content__view').html(resp);
                    $('#tb-p__p-producto').DataTable();
                }
            });
        }
    });
});

$('#link__01').on('click', function () {
    $.ajax({
        url: '../../views/almacenView/productoStockView.php',
        async: true,
        success: function (request){
            $('#tab2-panel__p-stock').html(request);
        }
    });
});

$('#link__02').on('click', function () {
    $.ajax({
        url: '../../views/almacenView/ordenCompraView.php',
        async: true,
        success: function (request){
            $('#tab3-panel__o-compra').html(request);
            $.ajax({
                url: '../../views/TablesViews/ordenCompraTableView.php',
                async: true,
                success: function (requesttb){

                    $('#content__tb-o-compra').html(requesttb);
                    $('#tb-o__compra tbody tr').click(function (){
                        showMessageDialog($(this).text());
                    });
                    $('#tb-o__compra').DataTable();

                    $('#btn__o-compra').click(function (){
                        $.ajax({
                            url: '../../views/almacenView/nuevaOrdenFormView.php',
                            async: true,
                            success: function (requestNOF){
                                showMessageDialog('Nueva orden de compra', requestNOF);
                            }
                        });

                    });
                }
            });
        }
    });
});





