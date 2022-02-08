<section class="shop-details">
    <div class="product__details__pic">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__breadcrumb">
                        <a href="index-2.html">Home</a>
                        <a href="shop.html">Shop</a>
                        <span>Product Details</span>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-lg-3 col-md-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">
                                <div class="product__thumb__pic set-bg"
                                    data-setbg="<?= base_url('assets_praktikum/img_bahan_modul/') . $barangs['foto_barang'] ?>">
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="<?= base_url('assets_praktikum/img_bahan_modul/') . $barangs['foto_barang'] ?>"
                                    alt="" width="350" />
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product__details__content">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="product__details__text">
                        <h4><?= $barangs['nama_barang'] ?></h4>
                        <div class="rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>

                        </div>
                        <?php $harga = "Rp " . number_format($barangs["harga"], 0, ',', '.'); ?>
                        <h3><?= $harga ?></h3>
                        <p>
                            <?= $barangs['deskripsi_lainnya'] ?>
                        </p>

                        <div class="product__details__cart__option">

                            <?php if ($this->session->userdata('id_konsumen')) : ?>


                            <a href="<?= base_url('shop/add_to_chart/' . $barangs['id_barang']) ?>" class="primary-btn"
                                style="color: #fff">add
                                to cart</a>

                            <?php else : ?>
                            <a data-toggle="modal" data-target="#modalLogin" class="primary-btn" style="color: #fff">add
                                to cart</a>

                            <?php endif; ?>

                        </div>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Customer Previews(5)</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-7" role="tab">Additional
                                    information</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">
                                        Nam tempus turpis at metus scelerisque placerat nulla
                                        deumantos solicitud felis. Pellentesque diam dolor,
                                        elementum etos lobortis des mollis ut risus. Sedcus
                                        faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.
                                    </p>
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>
                                            A Pocket PC is a handheld computer, which features
                                            many of the same capabilities as a modern PC. These
                                            handy little devices allow individuals to retrieve and
                                            store e-mail messages, create a contact file,
                                            coordinate appointments, surf the internet, exchange
                                            text messages and more. Every product that is labeled
                                            as a Pocket PC must be accompanied with specific
                                            software to operate the unit and must feature a
                                            touchscreen and touchpad.
                                        </p>
                                        <p>
                                            As is the case with any new technology product, the
                                            cost of a Pocket PC was substantial during it’s early
                                            release. For approximately $700.00, consumers could
                                            purchase one of top-of-the-line Pocket PCs in 2003.
                                            These days, customers are finding that prices have
                                            become much more reasonable now that the newness is
                                            wearing off. For approximately $350.00, a new Pocket
                                            PC can now be purchased.
                                        </p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p>
                                            Polyester is deemed lower quality due to its none
                                            natural quality’s. Made from synthetic materials, not
                                            natural like wool. Polyester suits become creased
                                            easily and are known for not being breathable.
                                            Polyester suits tend to have a shine to them compared
                                            to wool and cotton suits, this can make the suit look
                                            cheap. The texture of velvet is luxurious and
                                            breathable. Velvet is a great choice for dinner party
                                            jacket and can be worn all year round.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-6" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>
                                            A Pocket PC is a handheld computer, which features
                                            many of the same capabilities as a modern PC. These
                                            handy little devices allow individuals to retrieve and
                                            store e-mail messages, create a contact file,
                                            coordinate appointments, surf the internet, exchange
                                            text messages and more. Every product that is labeled
                                            as a Pocket PC must be accompanied with specific
                                            software to operate the unit and must feature a
                                            touchscreen and touchpad.
                                        </p>
                                        <p>
                                            As is the case with any new technology product, the
                                            cost of a Pocket PC was substantial during it’s early
                                            release. For approximately $700.00, consumers could
                                            purchase one of top-of-the-line Pocket PCs in 2003.
                                            These days, customers are finding that prices have
                                            become much more reasonable now that the newness is
                                            wearing off. For approximately $350.00, a new Pocket
                                            PC can now be purchased.
                                        </p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p>
                                            Polyester is deemed lower quality due to its none
                                            natural quality’s. Made from synthetic materials, not
                                            natural like wool. Polyester suits become creased
                                            easily and are known for not being breathable.
                                            Polyester suits tend to have a shine to them compared
                                            to wool and cotton suits, this can make the suit look
                                            cheap. The texture of velvet is luxurious and
                                            breathable. Velvet is a great choice for dinner party
                                            jacket and can be worn all year round.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-7" role="tabpanel">
                                <div class="product__details__tab__content">
                                    <p class="note">
                                        Nam tempus turpis at metus scelerisque placerat nulla
                                        deumantos solicitud felis. Pellentesque diam dolor,
                                        elementum etos lobortis des mollis ut risus. Sedcus
                                        faucibus an sullamcorper mattis drostique des commodo
                                        pharetras loremos.
                                    </p>
                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>
                                            A Pocket PC is a handheld computer, which features
                                            many of the same capabilities as a modern PC. These
                                            handy little devices allow individuals to retrieve and
                                            store e-mail messages, create a contact file,
                                            coordinate appointments, surf the internet, exchange
                                            text messages and more. Every product that is labeled
                                            as a Pocket PC must be accompanied with specific
                                            software to operate the unit and must feature a
                                            touchscreen and touchpad.
                                        </p>
                                        <p>
                                            As is the case with any new technology product, the
                                            cost of a Pocket PC was substantial during it’s early
                                            release. For approximately $700.00, consumers could
                                            purchase one of top-of-the-line Pocket PCs in 2003.
                                            These days, customers are finding that prices have
                                            become much more reasonable now that the newness is
                                            wearing off. For approximately $350.00, a new Pocket
                                            PC can now be purchased.
                                        </p>
                                    </div>
                                    <div class="product__details__tab__content__item">
                                        <h5>Material used</h5>
                                        <p>
                                            Polyester is deemed lower quality due to its none
                                            natural quality’s. Made from synthetic materials, not
                                            natural like wool. Polyester suits become creased
                                            easily and are known for not being breathable.
                                            Polyester suits tend to have a shine to them compared
                                            to wool and cotton suits, this can make the suit look
                                            cheap. The texture of velvet is luxurious and
                                            breathable. Velvet is a great choice for dinner party
                                            jacket and can be worn all year round.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Product</h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($barangs_ex as $b) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg"
                        data-setbg="<?= base_url('assets_praktikum/img_bahan_modul/') . $b["foto_barang"] ?>">
                        <span class="label">New</span>

                    </div>
                    <div class="product__item__text">
                        <h6><?= $b['nama_barang'] ?></h6>


                        <?php if ($this->session->userdata('id_konsumen')) : ?>

                        <a href="<?= base_url('shop/add_to_chart/' . $b['id_barang']) ?>" class="add-cart">+
                            Add To
                            Cart</a>

                        <?php else : ?>

                        <a class="add-cart" data-toggle="modal" data-target="#modalLogin">+ Add To Cart</a>

                        <?php endif; ?>

                        <div class="rating">

                        </div>
                        <h5><?= "Rp " . number_format($b["harga"], 0, ',', '.'); ?></h5>

                    </div>
                </div>
            </div>
            <?php endforeach ?>

        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>