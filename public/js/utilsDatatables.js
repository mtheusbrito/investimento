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
    return btnEdit(host + '/users/' + data.id + '/edit') +
        btnDelete(host + '/users/' + data.id);
}

$(function () {

    $('.select2').select2();
    $('#usersDatatable').DataTable({

        "ajax": {
            "url": host + '/paginate/users',
            "dataSrc": ''
        },
        'columns': [
            { title: "Nome", data: 'name' },
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


    });

    $('#groupsDatatable').DataTable({
        "ajax": {
            "url": host + '/paginate/groups',
            "dataSrc": ''
        },
        'columns': [
            { title: "Nome", data: 'name' },
            { title: "Responsavel", data: 'owner.name' },
            { title: "Instituição", data: 'instituition.name' },
            {
                title: 'Opções',
                width: "15%",
                data: null,
                render: renderGroupOptions
            }
        ],
    });

    function renderGroupOptions(data, type, row) {
        return btn(host + '/groups/' + data.id, 'fa fa-users', 'Membros') +
            btnEdit(host + '/groups/' + data.id + '/edit') +
            btnDelete(host + '/groups/' + data.id);
    }
    $('#example1').DataTable();

    let id = $('.table').data('id-group');
    $('#membersDatatable').DataTable({
        "ajax": {
            "url": host + "/paginate/groups/members/" + id,
            "dataSrc": '',

        },
        "columns": [
            { title: "Nome", data: 'name' },
            { title: "Email", data: 'email' },
            { title: "Telefone", data: 'phone', render: renderTelefone },
            { title: "Status", data: 'status', render: renderAtivo },
            {
                title: "Opções",
                width: '15%',
                data: null,
                render: renderMemberOptions
            }

        ],

    });

    function renderMemberOptions(data, type, row) {
        return btnDelete("");
    }
    $('#instituitionsDatatable').DataTable({
        "ajax": {
            "url": host + '/paginate/instituitions',
            "dataSrc": '',
        },
        "columns": [
            { title: "Nome", data: 'name' },
            {
                title: "Opções",
                width: "15%",
                data: null,
                render: renderInstituitionsOptions
            }
        ],


    });
    function renderInstituitionsOptions(data, type, row) {
        return btnEdit(host + '/instituitions/' + data.id + '/edit') +
            btnDelete(host + '/instituitions/' + data.id);
    }
})