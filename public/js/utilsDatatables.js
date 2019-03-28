$(function() {
    //Initialize Select2 Elements
   $('.select2').select2()
   $('#example1').DataTable(),
   $('#instGroupsDatatable').DataTable({
       "columnDefs": [
       { "width": "15%", "targets": 2}
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