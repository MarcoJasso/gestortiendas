$(function () {
    $.ajax({
        url: '../../views/TablesViews/productosStockTableView.php',
        async: true,
        dataType: 'html',
        success: function (request) {
            $('#content__p-stock').html(request);
            $('#tb-p__stock tbody tr').click(function () {
                showMessageDialog($(this).text())
            })
            $('#tb-p__stock').DataTable();
        }
    });
});

$('#btn__n-sp').on('click', function () {
    $.ajax({
        url: '../../views/almacenView/RProductoView.php',
        async: true,
        dataType: 'html',
        success: function (exp) {

            showMessageDialog("Nuevo producto", exp);

            $('.mdl-button-agree').on('click', function () {
                let dataForm = $('#dialog--message form').serializeArray();
                console.log(dataForm);
            });

        }
    }).fail(function (e, p, t) {
        alert('Error, no se encintro la página.' + e);
    });
});

