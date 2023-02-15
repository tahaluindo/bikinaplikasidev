@extends('layouts.index')

@section('content')
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="image/background1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Makanan & minuman super enak tiada duanya!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="image/background1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Anda akan selalu memesan terus!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6" id="tentang">
                    <div class="about__text">
                        <div class="section-title">
                            <span>Tentang Toko {{ env('APP_OBJECT_NAME') }}</span>
                            <h2>Makanan & minuman enak yang tak terlupakan!</h2>
                        </div>
                        <p>Menjual Aneka Makanan & minuman : Makanan, minuman, cemilan dan Snack. Area terjangkau bisa
                            Delivery
                            Order!</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="about__bar">
                        <div class="about__bar__item">
                            <p>Desain</p>
                            <div id="bar1" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="98"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Standart</p>
                            <div id="bar2" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="99"></span>
                            </div>
                        </div>
                        <div class="about__bar__item">
                            <p>Rasa</p>
                            <div id="bar3" class="barfiller">
                                <div class="tipWrap"><span class="tip"></span></div>
                                <span class="fill" data-percentage="97"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="product spad">
        <div class="container">
            <div class="row" id="list-makanan & minuman">

                @forelse($produk as $item)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ url($item->gambar) }}">
                                <div class="product__label">
                                    <span>Stok: {{ $item->stok }}</span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $item->nama }}</a></h6>
                                <div class="product__item__price">{{ toIdr($item->harga_jual) }}</div>
                                <div class="cart_add" data-id="{{ $item->id }}">
                                    <a href="#" >Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <strong>Produk Belum Ada</strong>
                @endforelse

            </div>
        </div>
    </section>

    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span>Tim Kami</span>
                        <h2>Top Barista</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-1.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-2.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-3.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="img/team/team-4.jpg">
                        <div class="team__item__text">
                            <h6>Randy Butler</h6>
                            <span>Decorater</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Testimonial</span>
                        <h2>Yang pelanggan kami katakan</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/xta-1.jpg.pagespeed.ic.nb7crSolZI.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Riza hanifa</h5>
                                    <span>Telanai</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>"Wah makanan & minumannya enak banget yah, rasanya nagih pengen beli lagi. Jadi betah langganan ni di
                                sini.."</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/xta-2.jpg.pagespeed.ic.IajDgdyurN.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Nadia Firda</h5>
                                    <span>Simpang Pulai</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>"Lembut, resep yang pas, tidak lebih / kurang, recomended banget nih."</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/xta-1.jpg.pagespeed.ic.nb7crSolZI.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Gita Sizila</h5>
                                    <span>Ibrahim</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>"Sekali? mana cukupp, enak banget loh makanan & minumannyaa. Jadi pengen order terus nih"</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/xta-2.jpg.pagespeed.ic.IajDgdyurN.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Linda</h5>
                                    <span>Thehok</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>"Pas gigitan terakhir yang menyedihkan, yah ternyata makanan & minumannya udah habiss, enaknya gak
                                nanggung sih"</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/xta-1.jpg.pagespeed.ic.nb7crSolZI.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Lidia</h5>
                                    <span>Kota Baru</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>"Jangan coba coba ya! nanti kalian gak bakalan berhenti mencoba makanan & minuman seenak ini,
                                hehe.."</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="img/testimonial/xta-2.jpg.pagespeed.ic.IajDgdyurN.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Ridha</h5>
                                    <span>Simpang Rimbo</span>
                                </div>
                            </div>
                            <div class="rating">
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star"></span>
                                <span class="icon_star-half_alt"></span>
                            </div>
                            <p>"Satu kata deh, muantapppzzz"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Ikuti kami di instagram</span>
                            <h2>Pemesanan dalam genggaman anda.</h2>
                        </div>
                        <h5><i class="fa fa-instagram"></i> {{"@"}}{{ env('APP_OBJECT_NAME') }}</h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/xinstagram-1.jpg.pagespeed.ic.MNbUlKiUtN.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/instagram/xinstagram-2.jpg.pagespeed.ic.TK_Zuu50dD.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/xinstagram-3.jpg.pagespeed.ic.a80zzutAVo.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/xinstagram-4.jpg.pagespeed.ic.cd-7s6Agna.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/instagram/xinstagram-5.jpg.pagespeed.ic.i3LgF28i8k.jpg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/instagram/xinstagram-3.jpg.pagespeed.ic.a80zzutAVo.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-7">
                    <div class="map__inner">
                        <h6>Kota Jambi</h6>
                        <ul>
                            <li>{{ env('APP_OBJECT_EMAIL') }}</li>
                            <li><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__"
                                   data-cfemail="7e2d091b1b0a1d1f151b3e0d0b0e0e110c0a501d1113">{{ env('APP_OBJECT_EMAIL') }}</a>
                            </li>
                            <li>{{ env('APP_OBJECT_PHONE') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__iframe">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d10784.188505644011!2d19.053119335158936!3d47.48899529453826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1543907528304"
                height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
@endsection