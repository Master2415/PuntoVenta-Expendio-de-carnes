const frm = document.querySelector('#frmMermas');
const id_producto = document.querySelector('#id_producto');
const cantidad = document.querySelector('#cantidad');
const motivo = document.querySelector('#motivo');
const btn_save = document.querySelector('#btn-save');

document.addEventListener('DOMContentLoaded', function () {
    $('#table_mermas').DataTable({
        ajax: {
            url: ruta + 'controllers/mermasController.php?option=listar',
            dataSrc: ''
        },
        columns: [
            { data: 'fecha' },
            { data: 'descripcion' },
            { data: 'cantidad' },
            { data: 'motivo' },
            { data: 'usuario' }
        ],
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json'
        },
        "order": [[0, 'desc']]
    });

    frm.onsubmit = function (e) {
        e.preventDefault();
        if (id_producto.value == '' || cantidad.value == '' || motivo.value == '') {
            message('error', 'TODOS LOS CAMPOS SON REQUERIDOS');
        } else {
            const formData = new FormData(frm);
            axios.post(ruta + 'controllers/mermasController.php?option=save', formData)
                .then(function (response) {
                    const info = response.data;
                    message(info.tipo, info.mensaje);
                    if (info.tipo == 'success') {
                        setTimeout(() => {
                            window.location.reload();
                        }, 1500);
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
});
