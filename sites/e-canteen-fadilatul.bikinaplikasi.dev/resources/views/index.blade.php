<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>E Canteen - Universitas Dinamika Bangsa</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/hero-slider.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <link
        href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

    <script src="{{ url('') }}/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>

<body>
<div class="header">
    <div class="container">
        <a href="#" class="navbar-brand scroll-top" style="line-height: 35px;">E Canteen - Universitas Dinamika
            Bangsa</a>
        <nav class="navbar navbar-inverse" role="navigation">
        {{-- <div class="navbar-header">
            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse"
                data-target="#main-nav">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div> --}}
        <!--/.navbar-header-->
            <!-- <div id="main-nav" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="menu.html">Our Menus</a></li>
                    <li><a href="blog.html">Blog Entries</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div> -->
            <!--/.navbar-collapse-->
        </nav>
    </div>
</div>

<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Menu dan Penjual</h1>
                <p>Pilih menu, lakukan pemesanan dan tunggu. Tanyakan jika terlalu lama menunggu.</p>
            </div>
        </div>
    </div>
</section>


@foreach ($penjuals as $item)
    <section class="list-menu" style="margin-bottom: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="list-menu-content">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="left-image">
                                    <img src="{{ \Storage::url($item->gambar_depan) }}" alt="Breakfast" height="330">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h2>{{ $item->user->name }}</h2>
                                <div class="owl-breakfast owl-carousel owl-theme">
                                    @foreach ($item->menus as $menu_item)
                                        <div class="item col-md-12">
                                            <div class="food-item">
                                                <img src="{{ \Storage::url($menu_item->gambar) }}" alt="">
                                                <div class="price">
                                                    @if($menu_item->stok == 'Ada')
                                                        <button
                                                            class="btn btn-sm float-left btn-add-cart-{{ $menu_item->id }}"
                                                            data-menu-id="{{ $menu_item->id }}">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </button>
                                                    @endif

                                                    {{ toIdr($menu_item->harga) }}
                                                </div>

                                                <div class="text-content">
                                                    <h4>{{ $menu_item->nama }} ({{ $menu_item->stok }})</h4>

                                                    <p>{{ $menu_item->deskripsi }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach


<section id="book-table">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading">
                    <h2>Lakukan pemesanan</h2>
                </div>
            </div>
            {{-- <div class="col-md-7">
                <div class="left-image">
                    <img src="{{ url('') }}/img/book_left_image.jpg" alt="">
                </div>
            </div> --}}
            <div class="col-md-6 col-md-offset-3">
                <div class="right-info">
                    <h4>Data Pemesanan</h4>
                    <h3><strong id='pilih-menu-total'>Rp0</strong></h3>


                    <div class="row" id="pilih-menu-add" style="display: none;">
                        <div class="row" style="margin-top: 10px !important;">
                            <div class="col-md-6">
                                <fieldset>
                                    <select required name='menus[]' class="pilih-menu">
                                        <option value="">Pilih Menu</option>
                                        <option value="Batalkan" selected>Batalkan</option>
                                        @foreach ($penjuals as $item)
                                            <optgroup label="{{ $item->user->name }}">
                                                @foreach ($item->menus as $menu_item)
                                                    <option value="{{ $menu_item->id }}">{{ $menu_item->nama }}
                                                        ({{ $menu_item->stok }})
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <select name='jumlahs[]' class='pilih-menu-jumlah'>
                                        <option value="">Pilih Jumlah</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <form id="form-submit-pesanan" action="{{ route('pesanan.store') }}" method="post"
                          onsubmit="return confirm('Yakin akan melakukan pesanan?')">

                        <div class="row">
                            <div class="col-md-6">
                                <fieldset>
                                    <select required name='menus[]' class="pilih-menu">
                                        <option value="">Pilih Menu</option>
                                        @foreach ($penjuals as $item)
                                            <optgroup label="{{ $item->user->name }}">
                                                @foreach ($item->menus as $menu_item)
                                                    <option value="{{ $menu_item->id }}">{{ $menu_item->nama }}
                                                        ({{ $menu_item->stok }})
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <select name='jumlahs[]' class='pilih-menu-jumlah'>
                                        <option value="">Pilih Jumlah</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div>

                        <div class="" id="pilih-menu-add-item">

                        </div>

                        <div class='row' style=' margin-top: 35px !important;'>
                            <div class="col-md-6">
                                <fieldset>
                                    <input name="atas_nama" type="atas_nama" class="form-control" id="atas_nama"
                                           placeholder="Atas Nama" required style=>
                                </fieldset>
                            </div>
                            <div class="col-md-6">
                                <fieldset>
                                    <select required class="" name='meja_id'>
                                        <option value="">Pilih Meja</option>
                                        @foreach ($mejas as $item)
                                            <option value="{{ $item->id }}">{{ $item->no }}</option>
                                        @endforeach
                                    </select>

                                    <!-- <input name="phone" type="phone" class="form-control" id="phone" placeholder="Phone number" required> -->
                                </fieldset>
                            </div>
                        </div>

                        <div class='row' style="margin-top: 20px;">
                            <div class="col-md-12">
                                <fieldset>
                                    <textarea class="form-control" placeholder="Catatan"></textarea>
                                </fieldset>
                            </div>
                        </div>

                        <div class='row' style='margin-top: 20px;'>
                            <div class="col-md-6" style='padding-top: 10px;'>
                                <fieldset>

                                    <input name="total" type="hidden" class="form-control" id="total"
                                           placeholder="Atas Nama" required style=' margin-top: 35px !important;'>
                                </fieldset>
                            </div>

                            <div class="col-md-6">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="btn">Pesan</button>
                                </fieldset>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>


<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <p>Copyright &copy; 2020 E Canteen</p>
            </div>
            <div class="col-md-4">
                <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <p>Kerja <em>Praktek</em></p>
            </div>
        </div>
    </div>
</footer>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="{{ url('') }}/js/vendor/jquery-1.11.2.min.js"><\/script>')
</script>

<script src="{{ url('') }}/js/vendor/bootstrap.min.js"></script>

<script src="{{ url('') }}/js/plugins.js"></script>
<script src="{{ url('') }}/js/main.js"></script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="{{ url('') }}/js/sweetalert.min.js" type="text/javascript"></script>

@if(session()->has('error'))
    <script>
        swal({
            type: 'error',
            timer: 1000,
            icon: 'error',
            showConfirmButton: false,
            text: "{{ session()->get('error') }}"
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        swal({
            type: 'success',
            timer: 1000,
            icon: 'success',
            showConfirmButton: false,
            text: "{{ session()->get('success') }}"
        });
    </script>
@endif

<script type="text/javascript">
    $(document).ready(function () {
        function update_harga() {
            $.ajax({
                url: "{{ route('pesanan.hitung_pesanan') }}" + "?" + $('#form-submit-pesanan').serialize(),
                success: function (response) {

                    $('#pilih-menu-total').text(response);
                    $('#total').val(response);
                }
            });
        }

        var total_pesanan = 0;
        $(document).on('click', "[class*='btn-add-cart']", function () {
            $(".pilih-menu").undelegate("change");

            swal({
                content: {
                    element: "input",
                    attributes: {
                        placeholder: "Jumlah",
                        type: "number",
                        max: 10,
                        min: 1,
                        required: 'required',
                        value: 1,
                        id: "jumlah-pilih"
                    },
                },
            }).then((data) => {
                if ($('#jumlah-pilih').val() < 1) {
                    swal({
                        type: 'error',
                        timer: 1000,
                        icon: 'error',
                        showConfirmButton: false,
                        text: "Jumlah kurang!"
                    });
                } else {
                    $('#pilih-menu-add-item').append($('#pilih-menu-add').html());
                    $('#book-table #form-submit-pesanan select:last-child.pilih-menu').eq(total_pesanan).val($(this).data('menu-id'))
                    $('#book-table #form-submit-pesanan select:last-child.pilih-menu-jumlah').eq(total_pesanan).val($('#jumlah-pilih').val())
                    total_pesanan++;

                    swal({
                        type: 'success',
                        timer: 1000,
                        icon: 'success',
                        showConfirmButton: false,
                        showCancelButton: false,
                        text: "Berhasil ditambahkan"
                    });

                    update_harga();
                }
            });
        });

        // navigation click actions 
        $('.scroll-link').on('click', function (event) {
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function (event) {
            event.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });

    // scroll function
    function scrollToID(id, speed) {
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({
            scrollTop: targetOffset
        }, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }

    if (typeof console === "undefined") {
        console = {
            log: function () {
            }
        };
    }

    // menu
    $(document).on('change', '.pilih-menu', function () {
        if ($(this).val() != "Batalkan") {


            $('#pilih-menu-add-item').append($('#pilih-menu-add').html());
        }

        if ($(this).val() == "Batalkan") {
            $.ajax({
                url: "{{ route('pesanan.hitung_pesanan') }}" + "?" + $('#form-submit-pesanan').serialize(),
                success: function (response) {

                    $('#pilih-menu-total').text(response);
                    $('#total').text(response);
                }
            });
        }
    })


    $(document).on('change', '.pilih-menu-jumlah', () => {
        $.ajax({
            url: "{{ route('pesanan.hitung_pesanan') }}" + "?" + $('#form-submit-pesanan').serialize(),
            success: function (response) {

                $('#pilih-menu-total').text(response);
                $('#total').val(response);
            }
        });
    })
</script>
</body>

</html>