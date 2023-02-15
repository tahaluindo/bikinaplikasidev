// settingan untuk sheet js
function exportToExcel(type, fn, dl) {
    var elt = document.getElementById('dataTable');
    var wb = XLSX.utils.table_to_book(elt, {
        sheet: "Laporan"
    });
    return dl ?
        XLSX.write(wb, {
            bookType: type,
            bookSST: true,
            type: 'base64'
        }) :
        XLSX.writeFile(wb, fn || ('laporan_' + $('#dataTable').attr('periode') + '.' + (type || 'xlsx')));
}

$(document).ready(function () {
    $('.alert').fadeOut(5000);

    $('[data-toggle="popover"]').popover({
        html: true
    });

    $('input[type="range"]').on("change mousemove", function () {
        $(this).next().html($(this).val());
    });
    
    // agar filter dari datatable bisa dipake buat nyari juga
    $('#dataTable_filter input').attr('name', 'q');
    $('#dataTable_filter input').val(q);
    $('#dataTable_filter input').attr('id', 'inputSearch');
    $('#dataTable_filter input').attr('placeholder', placeholder);

    var formHtml = `<form action="${urlSearch}">`;

    $('#dataTable_filter input').wrap(formHtml);

    $(document).keydown(function (e) {
        if (e.keyCode == 13 && $("#inputSearch").is(':focus')) {
            $('#dataTable_filter form').submit();
        }
    });
});
