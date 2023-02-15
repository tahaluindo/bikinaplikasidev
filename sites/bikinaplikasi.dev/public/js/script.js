$(document).ready(function (event) {
    //
    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 67) { // Prevent Ctrl+Shift+C        
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        } else if (event.ctrlKey && event.keyCode == 85) { // Prevent Ctrl+Shift+U        
            return false;
        }

    });

    $(document).on('mouseenter', '.produk', function (e) {
        $($(this).data('box-header')).toggleClass('produk-hover');
    });

    $(document).on('mouseleave', '.produk', function (e) {
        $($(this).data('box-header')).toggleClass('produk-hover');
    });

    $(document).on('click', '.produk', function (e) {
        $(this).toggleClass('collapsed-box', 500);
        $($(this).data('box-body')).toggleClass('d-none', 500);
    });

    // mengatur sidebar ke min
    $('body').addClass("sidebar-mini");
    $('body').removeClass("sidebar-collapse");

    // untuk webtour
    if (localStorage.hasTour == 0 && window.innerWidth >= 768) {
        $('ul.sidebar-menu li:eq(1)').attr('id', 'dashboard')
        $('ul.sidebar-menu li:eq(2)').attr('id', 'pesanan')
        $('ul.sidebar-menu li:eq(3)').attr('id', 'rujukan')
        $('ul.sidebar-menu li:eq(4)').attr('id', 'akun-pembayaran')
        $('ul.sidebar-menu li:eq(5)').attr('id', 'pembayaran')
        $('ul.sidebar-menu li:eq(6)').attr('id', 'download')
        $('ul.sidebar-menu li:eq(7)').attr('id', 'video')
        $('ul.sidebar-menu li:eq(8)').attr('id', 'sumber-kode')
        $('ul.sidebar-menu li:eq(9)').attr('id', 'saran')


        setTimeout(() => {
            $('.wt-btns wt-btn-next').text('Lanjut ->')
            $('.wt-btns wt-btn-back').text('Kembali <-')

            const wt = new WebTour();
            wt.highlight('.sidebar');

            const steps = [
                {
                    element: '#dashboard',
                    title: 'Dashboard',
                    content: 'Dimenu ini kamu dapat mengambil link rujukan untuk dibagikan dan mendapatkan komisi dari pembelian klien. Dan juga kamu dapat melakukan pemesanan produk kami.',
                    placement: 'right-start',
                },
                {
                    element: '#pesanan',
                    title: 'Pesanan',
                    content: 'Dimenu ini kamu dapat melihat data pesananmu, klik angsuran untuk mengangsur. Berikan kami rate dari 1-5 ketika pesanan selesai.',
                    placement: 'right-start',
                },
                {
                    element: '#rujukan',
                    title: 'Rujukan',
                    content: 'Dimenu ini kamu dapat melihat list rujukan yang telah berhasil kamu daftarkan.',
                    placement: 'right-start',
                },
                {
                    element: '#akun-pembayaran',
                    title: 'Akun Pembayaran',
                    content: 'Dimenu ini kamu dapat menambahkan akun pembayaran guna mengajukan permintaan pembayaran dari komisi rujukanmu.',
                    placement: 'right-start',
                },
                {
                    element: '#pembayaran',
                    title: 'Pembayaran',
                    content: 'Dimenu ini kamu dapat melihat data pembayaran dan mengajukan permintaan pembayaran.',
                    placement: 'right-start',
                },
                {
                    element: '#download',
                    title: 'Download',
                    content: 'Dimenu ini kamu dapat mendownload file file yang diperlukan disebuah program.',
                    placement: 'right-start',
                },
                {
                    element: '#video',
                    title: 'Video',
                    content: 'Dimenu ini kamu dapat melihat video tutorial mengenai programmu.',
                    placement: 'right-start',
                },
                {
                    element: '#sumber-kode',
                    title: 'Sumber Kode',
                    content: 'Dimenu ini kamu dapat mendownload file program buatan admin, ada yang gratis dan ada juga yang berbayar.',
                    placement: 'right-start',
                },
                {
                    element: '#saran',
                    title: 'Saran',
                    content: 'Dimenu ini kamu dapat memberikan saran kepada admin, guna meningkatkan kualitas pelayanan.',
                    placement: 'right-start',
                },
            ];

            wt.setSteps(steps);
            wt.start();
        }, 500)

        localStorage.hasTour = 1;
    }

    $(this).bind("contextmenu", function (e) {
        e.preventDefault();
    });

    $(document).on('click', '.btn-lanjutkan', function (e) {
        // KOSONGKAN SEMUA INPUTAN

        $('#' + $(this).data('form')).submit();

        setTimeout(() => {

            $('.btn-lanjutkan').attr('disabled', 'disabled');
        }, 250)
    })

    $(document).on('click', '.select-bank', function (e) {
        $('.select-bank').removeClass('clicked');
        $(this).addClass('clicked');

        var form = $('#' + $(this).data('form'));

        form.find('.method').val($(this).data('value'));
    })

    $(document).on('click', '.btn-cek-voucher', function (e) {

        var This = $(this);
        This.attr('disabled', 'disabled');
        var kode_voucher = $(This.data('kode-voucher')).val();

        if (kode_voucher == '') {
            $(This.data('voucher-tidak-ditemukan')).show(500);
            $(This.data('voucher-tidak-ditemukan')).text("Inputkan voucher!")
            This.removeAttr('disabled');

            return;
        }

        $(This.data('img-loading')).show(500)
        $(This.data('voucher-ditemukan')).hide(500)
        $(This.data('voucher-tidak-ditemukan')).hide(500);

        if (kode_voucher.length) {

            $.ajax({
                url: 'admin/cek_kode_voucher',
                data: {
                    'kode_voucher': kode_voucher
                },
                success: function (response) {
                    $(This.data('img-loading')).hide();
                    This.removeAttr('disabled');

                    if (response.kode_voucher) {

                        $(This.data('voucher-ditemukan')).show(500)
                        $(This.data('voucher-ditemukan')).text("Dipakai, potongan: " + response.potongan)
                    } else {
                        $(This.data('voucher-tidak-ditemukan')).show(500);
                        $(This.data('voucher-tidak-ditemukan')).text("Voucher tidak ditemukan!")
                    }
                }
            })
        }
    })

    $(".fa.fa-eye-slash.fa-fw").click(function (e) {

        if ($("input[type*='password']").attr("type") == "password") {
            $("input[name*='password']").attr("type", "text");
            $("input[name*='password_confirmation']").attr("type", "text");
        } else {
            $("input[name*='password']").attr("type", "password");
            $("input[name*='password_confirmation']").attr("type", "password");
        }

    })
})