$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });


    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
                    {
                        extend: 'excelHtml5',
                        exportOptions: exportOptions
                    }, {
                        extend: 'pdfHtml5',
                        exportOptions: exportOptions
                    }
                ]
    });
});