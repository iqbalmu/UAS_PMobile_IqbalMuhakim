
// Table Obat
var myTable = $('#myTable').DataTable({
    buttons: [
        'copy', 'excel', 'pdf'
    ]
});

myTable.buttons().container()
    .appendTo($('.col-sm-6:eq(0)', myTable.table().container()));
