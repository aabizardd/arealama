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
                                    data-setbg="<?=base_url('assets_praktikum/img_bahan_modul/') . $barangs['foto_barang']?>">
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-6 col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__pic__item">
                                <img src="<?=base_url('assets_praktikum/img_bahan_modul/') . $barangs['foto_barang']?>"
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
                        <h4><?=$barangs['nama_barang']?></h4>

                        <?php $harga = "Rp " . number_format($barangs["harga"], 0, ',', '.');?>
                        <h3><?=$harga?></h3>

                        <p>Stok : <?=$barangs['stok']?></p>


                        <div class="product__details__cart__option">

                            <?php if ($this->session->userdata('id_konsumen')): ?>


                            <a href="<?=base_url('shop/add_to_chart/' . $barangs['id_barang'])?>" class="primary-btn"
                                style="color: #fff">add
                                to cart</a>

                            <?php else: ?>
                            <a data-toggle="modal" data-target="#modalLogin" class="primary-btn" style="color: #fff">add
                                to cart</a>

                            <?php endif;?>

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

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                <div class="product__details__tab__content">

                                    <div class="product__details__tab__content__item">
                                        <h5>Products Infomation</h5>
                                        <p>
                                            <?=$barangs['deskripsi_lainnya']?>
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
            <?php foreach ($barangs_ex as $b): ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg"
                        data-setbg="<?=base_url('assets_praktikum/img_bahan_modul/') . $b["foto_barang"]?>">
                        <span class="label">New</span>

                    </div>
                    <div class="product__item__text">
                        <h6><?=$b['nama_barang']?></h6>


                        <?php if ($this->session->userdata('id_konsumen')): ?>

                        <a href="<?=base_url('shop/add_to_chart/' . $b['id_barang'])?>" class="add-cart">+
                            Add To
                            Cart</a>

                        <?php else: ?>

                        <a class="add-cart" data-toggle="modal" data-target="#modalLogin">+ Add To Cart</a>

                        <?php endif;?>

                        <div class="rating">

                        </div>
                        <h5><?="Rp " . number_format($b["harga"], 0, ',', '.');?></h5>

                    </div>
                </div>
            </div>
            <?php endforeach?>

        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>