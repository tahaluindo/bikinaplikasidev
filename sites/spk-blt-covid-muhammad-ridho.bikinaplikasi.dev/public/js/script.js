$(document).ready(function () {
    // $('#form_pembayaran_santri_detail_create').submit(function(e) {
    //     e.preventDefault();

    //     console.log($(this))
    // })


    // untuk mengatur bebas spp atau tidak
    $('#status').on('change', function(e){
        // kalo bebas spp
        if($(this).val() == 'Bebas SPP') {
            $('#nominal_spp_dibayar').val(0);
        } else {
            $('#nominal_spp_dibayar').val($('#nominal_spp_dibayar').data('nominal-spp-default'));
        }

        // kalo bebas makan
        if($(this).val() == 'Bebas Makan') {
            $('#nominal_uang_makan_dibayar').val(0);
        } else {
            $('#nominal_uang_makan_dibayar').val($('#nominal_uang_makan_dibayar').data('nominal-uang-makan-default'));
        }

        // kalo bebas makan
        if($(this).val() == 'Bebas Makan') {
            $('#nominal_uang_makan_dibayar').val(0);
        } else {
            $('#nominal_uang_makan_dibayar').val($('#nominal_uang_makan_dibayar').data('nominal-uang-makan-default'));
        }
        
        // kalo bebas spp
        if($(this).val() != 'Bebas SPP') {
            var nominal_spp_dibayar = parseInt($('#nominal_spp_dibayar').data('nominal-spp-default'))
            var potongan = parseInt($('#potongan').val())
            var total_potongan = nominal_spp_dibayar - ((nominal_spp_dibayar / 100) * potongan);

            $('#nominal_spp_dibayar').val(total_potongan);
        }

        // kalo bebas makan dan spp
        if($(this).val() == 'Bebas SPP dan Uang Makan') {
            $('#nominal_uang_makan_dibayar').val(0);
            $('#nominal_spp_dibayar').val(0);
        }
    })

    // untuk mengatur potongan
    $('#potongan').on('change', function(e){
        // kalo bebas spp
        var nominal_spp_dibayar = parseInt($('#nominal_spp_dibayar').data('nominal-spp-default'))
        var potongan = parseInt($(this).val())
        var total_potongan = nominal_spp_dibayar - ((nominal_spp_dibayar / 100) * potongan);

        $('#nominal_spp_dibayar').val(total_potongan);
    })

    // untuk melihat total yang harus dibayar d pembayaran spp


    $('.alert').fadeOut(5000, () => {
        $('#page-wrapper-alert').remove();
    });

    // agar filter dari datatable bisa dipake buat nyari juga
    $('#dataTable_filter input').attr('name', 'q');
    $('#dataTable_filter input').val(q);
    $('#dataTable_filter input').attr('id', 'inputSearch');
    $('#dataTable_filter input').attr('placeholder', placeholder);
    // alert("sdfsdf");
    var formHtml = `<form action="${urlSearch}">`;

    $('#dataTable_filter input').wrap(formHtml);

    $(document).keydown(function (e) {
        if (e.keyCode == 13 && $("#inputSearch").is(':focus')) {
            $('#dataTable_filter form').submit();
        }
    });

    // untuk popover
    $('[data-toggle="popover"]').popover({
        html: true
    });



});
