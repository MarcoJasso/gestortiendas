$(function () {
    $('#nav_sys a').each(function (link) {
        if ($(this).hasClass("a-link--active")) {
            $('#title--space__dash').text($(this).text());
            __view_main($(this).data('md'));
        }
        //console.log($(this).text())
    });
});

$('#nav_sys a').on('click', function () {
    $('#nav_sys a').each(function () {
        $(this).removeClass('a-link--active');
    })
    $(`#nav_sys a[data-md=${$(this).data('md')}`).addClass('a-link--active')
    $('#title--space__dash').text($(this).text());
    isVisibleDrawableMenu();
    __view_main($(this).data('md'))
})

function __view_main(__data_name) {
    //console.log(`data-key : ${__data_name}`);
    let urlDataModule = "../../d0/Error/File404.php"
    switch (__data_name) {
        case "__md-0":
            urlDataModule = "../../views/almacenView/mainAlmacenView.php"
            break;
        case "__md-1":
            urlDataModule = "../../views/cajaView/mainCajaView.php";
            break;
        case "__md-5":
            urlDataModule = "../../views/configuracionView/mainConfiguracionView.php";
            break;

    }
    $.ajax({
        method: 'GET',
        url: urlDataModule,
        async: true,
        dataType: 'html',
        success: function (resp) {
            $('#main_content #page_content').html(resp);
        }
    });

}

function isVisibleDrawableMenu() {
    let item = $('#div-layout__drawer');
    if (item.hasClass('is-visible')) {
        item.removeClass('is-visible');
        $('.mdl-layout__obfuscator').removeClass('is-visible');
    }
}

function showMessageDialog(title, content) {
    $('#content__dialog').html(contentMessageDialog(title, content));
    let dialogo = document.getElementById('dialog--message');
    dialogo.showModal();
    $('#btn-close-dialog').on('click', function () {
        dialogo.close();
    })
}

function showAlertMessage(content) {
    let snackbarContainer = document.querySelector('#demo-toast-example');
    'use strict';
    let data = {message: content};
    snackbarContainer.MaterialSnackbar.showSnackbar(data);

}

const contentMessageDialog = (titleDialog, content) => {
    return '<dialog class="mdl-dialog" id="dialog--message" style="width: 900px !important;">' +
        '<h5 class="mdl-dialog__title" style="padding: 0">' + titleDialog + '</h5>' +
        '    <div class="mdl-dialog__content">' + content + '</div>' +
        '    <div class="mdl-dialog__actions mdl-dialog__actions">' +
        '      <button type="button" class="mdl-button mdl-color--green-900 mdl-color-text--white mdl-button-agree">Aceptar</button>' +
        '      <button type="button" class="mdl-button close" id="btn-close-dialog">Disagree</button>' +
        '    </div>' +
        '  </dialog>';
}

const updateTableView = (table, idtable) => {
    $.ajax({
        url: `../../views/TablesViews/${table}TableView.php`,
        async: true,
        success: function (resp) {
            $('#tb--content__view').html(resp);
            $(`#${idtable}`).DataTable();
        }
    });
}