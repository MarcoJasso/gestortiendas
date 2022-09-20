$('#btn__pc--pre').on('click', function () {
    successComponentes();
});

$('#btn__pu--pre').on('click', function () {
    if (valDataForm()) {

        let dataForm = $('#form__p').serializeArray();
        let newP = {
            kp: dataForm[0].value,
            dp: dataForm[1].value,
            mp: dataForm[2].value,
            ta_p: dataForm[3].value,
            tp: dataForm[5].value,
            s_p: dataForm[6].value,
        }

        $.ajax({
            method: 'POST',
            data: {dataF: {"op": "up-p", "dataForm": newP}},
            url: '../../viewModel/ppViewModel/productoViewModel.php',
            success: function (exp) {
                let reqs = JSON.parse(exp);
                if (reqs.error === 0) {
                    successComponentes();
                    updateTableView('productos', 'tb-p__p-producto');
                }
                showAlertMessage(reqs.message);
            }
        });
    }
});

$('#catp').change(function () {

    $.ajax({
        method: 'POST',
        data: {dataTIP: {"op": 'g_by_id_cat', "data": $(this).val()}},
        url: '../../viewModel/tpViewModel/tipoPViewModel.php',
        async: true,
        success: function (exp) {

            let m1 = JSON.parse(exp);

            console.log(m1);

            if (m1.error === 0) {

                let m2 = JSON.parse(m1.message);
                $('#tp option').remove();

                $('#tp').attr('disabled', false).removeClass('mdl-color-text--grey-500')
                    .addClass('mdl-color-text--black')
                    .parent('.mdl-textfield').removeClass('is-disabled')
                $('#tp').parent('.mdl-textfield').addClass('is-dirty is-focused');

                m2.forEach(function (item) {
                    $('#tp').append($('<option>').val(item['id_tipo_producto']).text(item['descripcion']));
                })
            } else {
                $('#tp').attr('disabled', true).addClass('mdl-color-text--grey-500')
                    .removeClass('mdl-color-text--black')
                    .parent('.mdl-textfield').addClass('is-disabled')
                $('#tp').parent('.mdl-textfield').removeClass('is-dirty is-focused  ');
                $('#tp option').remove();
                showAlertMessage(m1.message);
            }
        }
    });
});

$('#btn__p--pre').on('click', function () {
    if (valDataForm()) {

        let dataForm = $('#form__p').serializeArray();
        console.log(dataForm);
        let newP = {
            kp: dataForm[0].value,
            dp: dataForm[1].value,
            mp: dataForm[2].value,
            ta_p: dataForm[3].value,
            tp: dataForm[5].value,
            s_p: dataForm[6].value,
        }

        $.ajax({
            method: 'POST',
            data: {dataF: {"op": "add", "dataForm": newP}},
            url: '../../viewModel/ppViewModel/productoViewModel.php',
            success: function (exp) {

                let reqs = JSON.parse(exp);

                if (reqs.error === 0) {

                    $('#form__p')[0].reset();

                    $('#dp').parent('.mdl-textfield').removeClass('is-dirty is-invalid');
                    $('#mp').parent('.mdl-textfield').removeClass('is-dirty is-invalid');

                    $.ajax({
                        method: 'POST',
                        url: '../../viewModel/ppViewModel/productoViewModel.php',
                        data: {dataF: {"op": "up-k-p", "dataForm": ''}},
                        success: function (rq) {
                            let res = JSON.parse(rq);
                            if (res.error === 0) {
                                successComponentes();
                                $('#kp').val(res.message);
                            }
                        }
                    });
                    updateTableView('productos', 'tb-p__p-producto');
                }
                showAlertMessage(reqs.message);
            }
        });
    }
});

function successComponentes() {

    $('#btn__pu--pre').prop('disabled', true).removeClass('mdl-color-text--green-800');
    $('#btn__p--pre').prop('disabled', false).addClass('mdl-color-text--light-blue-900');

    $('#dp').parent('.mdl-textfield').removeClass('is-dirty is-focused is-invalid');
    $('#mp').parent('.mdl-textfield').removeClass('is-dirty is-focused is-invalid');

    $('#tp option').remove();
    $('#tp').attr('disabled', true).addClass('mdl-color-text--grey-500')
        .removeClass('mdl-color-text--black')
        .parent('.mdl-textfield').addClass('is-disabled')
    $('#tp').parent('.mdl-textfield').removeClass('is-dirty is-focused');
}

function valDataForm() {

    if ($('#dp').val().length === 0 && $('#mp').val().length === 0) {

        $('#dp').parent('.mdl-textfield').addClass('is-dirty is-invalid');
        $('#mp').parent('.mdl-textfield').addClass('is-dirty is-invalid');

        showAlertMessage('Es necesario llenar el formulario.');
        return false;

    } else if ($('#dp').val().length === 0) {

        $('#dp').parent('.mdl-textfield').addClass('is-dirty is-invalid');

        showAlertMessage('Es necesario llenar el formulario.');
        return false;

    } else if ($('#mp').val().length === 0) {

        $('#mp').parent('.mdl-textfield').addClass('is-dirty is-invalid');
        showAlertMessage('Es necesario llenar el formulario.');
        return false;

    }
    return true;
}

