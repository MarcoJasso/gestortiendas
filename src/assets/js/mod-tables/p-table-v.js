$('#tb-p__p-producto tbody tr').click(function () {

    $.ajax({
        method: 'POST',
        data: {dataF: {"op": "g_one", "dataForm": $(this).attr('id')}},
        url: '../../viewModel/ppViewModel/productoViewModel.php',
        success: function (exp) {

            let reqs = JSON.parse(exp);

            if (reqs.error === 0) {

                let dataResult = JSON.parse(reqs.message);

                activateComponents();

                $('#kp').val(dataResult['clave_producto']);
                $("#dp").val(dataResult['descripcion']);
                $("#mp").val(dataResult['marca']);

                $("#ta_p option").each(function (){
                    $(this).prop('selected', false);
                });
                $("#ta_p option[value='" + dataResult['tipo_almacenaje'] + "']").prop('selected', true);

                $.ajax({
                    method: 'POST',
                    url: '../../viewModel/tpViewModel/tipoPViewModel.php',
                    data: {dataTIP: {"op": 'g_by_id', "data": dataResult['tipo_producto']}},
                    async: true,
                    success: function (exo) {

                        let m1 = JSON.parse(exo);

                        if(m1.error === 0){

                            let m3 = JSON.parse(m1.message);

                            $("#catp option").each( function (){
                                $(this).prop('selected', false);
                            });
                            $(`#catp option[value=${m3['cat_producto']}]`).prop('selected', true);

                            $.ajax({

                                method: 'POST',
                                data: {dataTIP: {"op": 'g_by_id_cat', "data": m3['cat_producto']}},
                                url: '../../viewModel/tpViewModel/tipoPViewModel.php',
                                async: true,
                                success: function (e) {

                                    let m5 = JSON.parse(e);

                                    if (m5.error === 0) {

                                        let m6 = JSON.parse(m5.message);

                                        $('#tp option').remove();

                                        $('#tp').attr('disabled', false).removeClass('mdl-color-text--grey-500')
                                            .addClass('mdl-color-text--black')
                                            .parent('.mdl-textfield').removeClass('is-disabled')
                                        $('#tp').parent('.mdl-textfield').addClass('is-dirty is-focused');

                                        m6.forEach(function (item) {
                                            $('#tp').append($('<option>').val(item['id_tipo_producto']).text(item['descripcion']));
                                        })

                                        $("#tp option").each( function (){
                                            $(this).prop('selected', false);
                                        });
                                        $(`#tp option[value=${dataResult['id_tipo_producto']}]`).prop('selected', true);


                                    } else {
                                        $('#tp option').remove();
                                        showAlertMessage(m5.message);
                                    }
                                }
                            });
                        }else{
                            showAlertMessage(m1.message);
                        }
                    }
                });

                $("#tp option").each(function (){
                    $(this).prop('selected', false);
                });
                $("#tp option[value='" + dataResult['tipo_producto'] + "']").prop('selected', true);

                $("#s_p option").each(function (){
                    $(this).prop('selected', false);
                });
                $("#s_p option[value='" + dataResult['estatus'] + "']").prop('selected', true);

            } else {
                showAlertMessage(reqs.message);
            }
        }
    });
});

function activateComponents () {

    $('#btn__pu--pre').prop('disabled', false).addClass('mdl-color-text--green-800');

    $('#btn__p--pre').prop('disabled', true).removeClass('mdl-color-text--light-blue-900');

    $("#dp").parent('.mdl-textfield').addClass('is-dirty is-dirty');
    $("#mp").parent('.mdl-textfield').addClass('is-dirty is-dirty');


}