<section class="hero">
    <div class="hero__slider owl-carousel">
        <div class="hero__items set-bg" data-setbg="<?= base_url('assets_arealama/') ?>img/hero/hero-1.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Murah dan Terpercaya!</h6>
                            <h2>Dengan Rp. 50.000 Udah Bisa Keren?!</h2>
                            <p>Hanya ada di <b style="color: #893D39;">AREALAMA</b> dengan budget tipis kamu udah bisa
                                dapet baju artis! </p>
                            <a href="<?= base_url('shop') ?>" class="primary-btn">Shop now <span
                                    class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero__items set-bg" data-setbg="<?= base_url('assets_arealama/') ?>img/hero/hero-2.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-8">
                        <div class="hero__text">
                            <h6>Banyak Pilihan Fashion Kekinian</h6>
                            <h2>Dengan 1 Juta Dapat Sekarung, Kamu Bisa Dapet Baju Kekinian!</h2>
                            <!-- <p>A specialist label creating luxury essentials. Ethically crafted with an unwavering
                                commitment to exceptional quality.</p> -->
                            <a href="<?= base_url('shop') ?>" class="primary-btn">Shop now <span
                                    class="arrow_right"></span></a>
                            <div class="hero__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="banner spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 offset-lg-4">
                <div class="banner__item">
                    <div class="banner__item__pic">
                        <img src="<?= base_url('assets_arealama/') ?>img/banner/contoh-baju.png" alt="" width="440"
                            style="border-radius: 20px;">
                    </div>
                    <div class="banner__item__text">
                        <h2>Clothing Collections 2030</h2>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner__item banner__item--middle">
                    <div class="banner__item__pic">
                        <video width="440" height="440" style="object-fit: cover;border-radius: 20px;" controls>
                            <source src="<?= base_url('assets_arealama/') ?>img/banner/vid-tiktok.mp4" type="video/mp4">

                        </video>

                    </div>
                    <div class="banner__item__text">
                        <h2>Follow Us On <img src="<?= base_url('assets_arealama/') ?>tiktok.png" alt="" width="40">
                        </h2>
                        <a href="https://www.tiktok.com/@azhyraarn?lang=en" target="_blank">area.lama</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="banner__item banner__item--last">
                    <div class="banner__item__pic">
                        <img src="<?= base_url('assets_arealama/') ?>img/banner/contoh-banner-baju.jpeg" alt=""
                            style="border-radius: 20px;" width="440">
                    </div>
                    <div class="banner__item__text">
                        <h2>Shoes Spring 2030</h2>
                        <a href="#">Shop now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="filter__controls">
                    <li class="active" data-filter="*">Best Sellers</li>
                    <li data-filter=".new-arrivals">New Arrivals</li>
                    <li data-filter=".hot-sales">Hot Sales</li>
                </ul>
            </div>
        </div>
        <div class="row product__filter">
            <?php foreach ($barang as $item) : ?>

            <?php
                $linkk = substr($item->link, 21);

                $linkk = explode(".", $linkk);

                $linkk = substr($linkk[0], 0, -2);

                // var_dump($linkk);die();

                ?>

            <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
                <div class="product__item">
                    <div class="product__item__pic set-bg list-barang"
                        data-setbg="<?= base_url('assets_praktikum/img_bahan_modul/') . $item->foto_barang ?>"
                        data-id="<?= $linkk ?>">



                        <span class="label">New</span>
                        <ul class="product__hover">
                            <li><a href="#"><img src="<?= base_url('assets_arealama/') ?>img/icon/xheart.png"
                                        alt=""></a>
                            </li>
                            <li><a href="#"><img src="<?= base_url('assets_arealama/') ?>img/icon/xcompare.png" alt="">
                                    <span>Compare</span></a></li>
                            <!-- <li>
                                <a href="" class="detail-pict"><img
                                        src="<?= base_url('assets_arealama/') ?>img/icon/xsearch.png.pagespeed.ic.y-8fLDHdJm.png"
                                        alt=""></a>
                            </li> -->
                        </ul>


                    </div>

                    <div class="product__item__text">
                        <h6><?= $item->nama_barang ?></h6>
                        <a href="" class="add-cart" style="color: #893D39;">Detail Product</a>
                        <div class="rating">
                            <i class="fa fa-star" style="color: #e8e800;"></i>
                            <i class="fa fa-star" style="color: #e8e800;"></i>
                            <i class="fa fa-star" style="color: #e8e800;"></i>
                            <i class="fa fa-star" style="color: #e8e800;"></i>
                            <i class="fa fa-star" style="color: #e8e800;"></i>

                        </div>
                        <?php $harga = "Rp " . number_format($item->harga, 0, ',', '.'); ?>
                        <h5><?= $harga ?></h5>

                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>
</section>



<script src="<?= base_url('assets_arealama/') ?>js/jquery-3.3.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.list-barang').click(function() {
        var id = $(this).attr("data-id");

        // alert(id);
        var location = "";
        if (id) {

            location = "<?= base_url('kelola_link/index/') ?>" + id;

        } else {
            location = "www.google.com";

        }
        window.open(location, '_blank');
    });
});
// function clickme(identifier) {




// }
</script>

<section class="categories spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="categories__text">
                    <h2>Baju Murah <br /> <span>Korean Thrift</span> <br /> Karungan Murah</h2>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="categories__hot__deal">
                    <img src="<?= base_url('assets_arealama/') ?>img/xproduct-sale.png" alt="">
                    <!-- <div class="hot__deal__sticker">
                        <span>Sale Of</span>
                        <h5>$29.99</h5>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4 offset-lg-1">
                <div class="categories__deal__countdown">
                    <span>Ayo order sekarang juga!</span>
                    <h2>Cuma ada di Area.lama, tungga apa lagi?</h2>
                    <!-- <div class="categories__deal__countdown__timer" id="countdown">
                        <div class="cd-item">
                            <span>3</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>1</span>
                            <p>Hours</p>
                        </div>
                        <div class="cd-item">
                            <span>50</span>
                            <p>Minutes</p>
                        </div>
                        <div class="cd-item">
                            <span>18</span>
                            <p>Seconds</p>
                        </div>
                    </div> -->
                    <a href="<?= base_url('order') ?>" class="primary-btn">Order sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instagram__pic">
                    <a href="https://www.instagram.com/area.lama/" target="_blank">
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-6.jpg"></div>
                    </a>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2 style="color: #EE4D30;">Instagram</h2>
                    <p style="text-align: justify;">
                        ✨supplier firsthand korean thrifted✨ <br>
                        JUAL DI STORY SETIAP HARI <br>
                        — WA : 08872582393 (karungan) <br>
                        — WA : 088222413566 (barang satuan) <br>
                        <br>


                    </p>
                    <a href="https://www.instagram.com/area.lama/" target="_blank">
                        <h3 style="color: #FFE5DE;">@area.lama <img
                                src="<?= base_url('assets_arealama/') ?>instagram.png" alt="" width="30"></h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="instagram spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="instagram__text">
                    <h2 style="color: #EE4D30;">Shopee</h2>
                    <p style="text-align: justify;">
                        Ayo berbelanja dengan @area.lama, kita ada toko Shopee nya lho! <br>
                        HANYA UPLOAD BARANG REQUEST-AN
                        Katalog selengkapnya cek di toko kami
                        dengan hashtag #areamasihada
                        — THANK YOU HAPPY SHOPPING
                    </p>

                    <a href="https://shopee.co.id/ramdan020999?categoryId=33&itemId=11507497034" target="_blank">
                        <h3 style="color: #FFE5DE;">@area.lama <img src="<?= base_url('assets_arealama/') ?>shopee.png"
                                alt="" width="30"></h3>
                    </a>

                    <a href="https://shopee.co.id/ramdan020999?categoryId=33&itemId=11507497034" class="primary-btn"
                        style="margin-top: 20px;margin-bottom: 10px;" target="_blank">Shop now <span
                            class="arrow_right"></span></a>


                </div>
            </div>

            <div class="col-lg-8">
                <div class="instagram__pic">
                    <a href="https://shopee.co.id/ramdan020999?categoryId=33&itemId=11507497034" target="_blank">
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-1.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-2.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-3.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-4.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-5.jpg"></div>
                        <div class="instagram__pic__item set-bg"
                            data-setbg="<?= base_url('assets_arealama/') ?>img/instagram/instagram-6.jpg"></div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="latest spad">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Latest News</span>
                    <h2>Fashion New Trends</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                        data-setbg="<?= base_url('assets_arealama/') ?>img/blog/blog-1.jpg"></div>
                    <div class="blog__item__text">
                        <span><img
                                src="<?= base_url('assets_arealama/') ?>img/icon/xcalendar.png.pagespeed.ic.GXy2gYWDh7.png"
                                alt=""> 16 February
                            2020</span>
                        <h5>What Curling Irons Are The Best Ones</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                        data-setbg="<?= base_url('assets_arealama/') ?>img/blog/blog-2.jpg"></div>
                    <div class="blog__item__text">
                        <span><img
                                src="<?= base_url('assets_arealama/') ?>img/icon/xcalendar.png.pagespeed.ic.GXy2gYWDh7.png"
                                alt=""> 21 February
                            2020</span>
                        <h5>Eternity Bands Do Last Forever</h5>
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="blog__item">
                    <div class="blog__item__pic set-bg"
                        data-setbg="<?= base_url('assets_arealama/') ?>img/blog/blog-3.jpg"></div>
                    <div class="blog__item__text">
                        <span><img
                                src="<?= base_url('assets_arealama/') ?>img/icon/xcalendar.png.pagespeed.ic.GXy2gYWDh7.png"
                                alt=""> 28 February
                            2020</span>
                        <h5>The Health Benefits Of Sunglasses</h5>



                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
        </div> -->
    </div>












</section>