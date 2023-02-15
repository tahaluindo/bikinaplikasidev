
            <div class="footer" style='position: fixed; bottom: 0;'>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            Copyright © 2020 Koperasi Desa. All rights reserved.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="{{ url('') }}/javascript: void(0);">About</a>
                                <a href="{{ url('') }}/javascript: void(0);">Support</a>
                                <a href="{{ url('') }}/javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <script src="<?= base_url(); ?>assets/libs/js/main-js.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/charts/sparkline/spark-js.js"></script>
    <script src="<?= base_url(); ?>assets/libs/js/dashboard-sales.js"></script>
  <!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
</body>

</html>


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
});
</script>
</body>

</html>