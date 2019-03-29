
$(function () {



    function getList(){
        $.ajax({
            type: 'GET',
            url: '/users'

        });

    }
    let users = $('#usersDatatable').data('field');
    var jsonUsers = JSON.parse(users);
    console.log(jsonUsers);
    //Initialize Select2 Elements

    $.ajax({

    })
    $('.select2').select2(),



        $('#usersDatatable').DataTable({
            data:[],
            columns: [
                { title: "Nome", data: 'name' },
                { title: "Cpf", data: 'cpf' },
                { title: "Nascimento", data: 'birth' },
                { title: "Telefone.", data: 'phone' },
                { title: "Email", data: 'email' },
                { title: "Status", data: 'status' },
                { title: "Permissão", data: 'permission' }
                // { title: "Opções" }


            ]


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