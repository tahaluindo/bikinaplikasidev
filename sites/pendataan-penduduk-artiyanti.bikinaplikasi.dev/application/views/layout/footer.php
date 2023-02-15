<!-- Argon Scripts -->
<!-- Core -->
<script src="<?php base_url(); ?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?php base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php base_url(); ?>assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?php base_url(); ?>assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?php base_url(); ?>assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Optional JS -->
<script src="<?php base_url(); ?>assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="<?php base_url(); ?>assets/vendor/chart.js/dist/Chart.extension.js"></script>
<!-- Argon JS -->
<script src="<?php base_url(); ?>assets/js/argon.js?v=1.2.0"></script>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>


<!-- you need to include the ShieldUI CSS and JS assets in order for the TreeView widget to work -->
<link rel="stylesheet" type="text/css"
    href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>


</script>
<script>
$(document).ready(function() {
    

    $(document).on('change', '#pekerjaan', function() {
        if ($(this).val() == 'lain-lain') {
            $('#pekerjaan_lain_lain').removeClass('d-none')
        } else {
            $('#pekerjaan_lain_lain').addClass('d-none')
        }
    })

    $('#datatable').DataTable();

    $('.dataTables_filter').wrap(
        `<form action=''></form>`
    );

    if (typeof placeholder == undefined) {

        var textChange = placeholder;
    } else {
        var textChange = '';
    }


    $('.dataTables_filter input').prop("placeholder", textChange)
    $('.dataTables_filter input').prop("name", "q")

    $('.dataTables_filter label').append(
        `<button id="searchtable" class="ml-1 mb-1 btn btn-sm btn-primary" type='submit'>Cari</button>`
    );

    $("#treeview").shieldTreeView();
});
</script>
</body>

</html>