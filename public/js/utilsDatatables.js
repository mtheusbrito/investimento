
function renderData(data, type, row) {

}
function renderCpf(data, type, row) {
    data.replace(/[^\d]/g, "");
    return data.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, "$1.$2.$3-$4");
}
function renderTelefone(data, type, row) {
    data.replace(/[^\d]/g, "");
    return data.replace(/(\d{2})(\d{9})/, "($1)$2");
}
function renderAtivo(data, type, row) {
    if (data == true) {
        return "Ativo"
    } else {
        return "Desativado"
    }
}
function eventDelete(link) {

    var crf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: "Você tem certeza?",
        text: "Uma vez deletado, você não poderá recuperar este arquivo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: link,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': crf_token,

                    },
                    success: function (response) {
                        $('.table').DataTable().ajax.reload();
                        swal("Seu arquivo foi excluído!", {
                            icon: "success",
                        });

                    },
                    error: function (xhr) {
                        swal("Ops! Algo deu errado", {
                            icon: "error",
                        });
                    },

                });
            }

        });



}
var btn = function (link, icon, title, className) {
    if (className == undefined)
        className = 'btn-default';
    $('[data-toggle="tooltip"]').tooltip();

    return "<a class='btn " + className + " btn-round btn-sm' href='" + link +
        "'title='" + title + "' data-toggle='tooltip' data-placement='top' data-container='body'>" +
        "<i class='" + icon + "' aria-hidden='true'></i>" +
        "</a>";
}
var btnEdit = function (link) {
    return btn(link, 'fa fa-pencil', 'Editar');
}
var btnDetalhes = function (link) {
    return btn(link, 'fa fa-eye', 'Detalhes');
}
var btnDelete = function (link) {
    return '<button onClick="eventDelete(\'' + link + '\')" class="btn btn-default btn-round btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></button>'
}

function renderUserOptions(data, type, row) {
    return btnEdit('http://localhost:8000/users/' + data.id + '/edit') +
        btnDelete('/users/' + data.id);
}
$(function () {

    $('.select2').select2(),

        $('#usersDatatable').DataTable({

            "ajax": {
                "url": 'http://localhost:8000/paginate/users',
                "dataSrc": ''
            },
            'columns': [
                { title: "Nome", data: 'name', },
                { title: "Cpf", data: 'cpf', render: renderCpf },
                { title: "Nascimento", data: 'birth' },
                { title: "Telefone.", data: 'phone', render: renderTelefone },
                { title: "Email", data: 'email' },
                { title: "Status", data: 'status', render: renderAtivo },
                { title: "Permissão", data: 'permission' },
                {
                    title: 'Opções',
                    data: null,
                    render: renderUserOptions
                }
            ],


        }),








        $('#example1').DataTable(),
        $('#instGroupsDatatable').DataTable({
            "columnDefs": [
                { "width": "15%", "targets": 2 }
            ]
        }),
        $('#instituitionsDatatable').DataTable({
            "columnDefs": [
                { "width": "15%", "targets": 1 }
            ]
        }),
        $('#groupsDatatable').DataTable({
            "columnDefs": [
                { "width": "15%", "targets": 3 }
            ]
        })


    // $('#example2').DataTable({
    //     // 'paging': true,
    //     // 'lengthChange': false,
    //     // 'searching': false,
    //     // 'ordering': true,
    //     // 'info': true,
    //     // 'autoWidth': false,
    // })
})