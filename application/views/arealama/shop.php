<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shop</h4>
                    <div class="breadcrumb__links">
                        <a href="index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="shop spad">
    <div class="container">
        <?=$this->session->flashdata('message')?>
        <div class="row">


            <div class="col-lg-12">

                <div class="row">

                    <?php foreach ($all_package as $ap): ?>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item sale">
                            <div class="product__item__pic set-bg"
                                data-setbg="<?=base_url('assets_praktikum/img_bahan_modul/' . $ap['foto_barang'])?>">
                                <span class="label">Sale</span>

                            </div>
                            <div class="product__item__text">
                                <h6><?=$ap['nama_barang']?></h6>

                                <?php if ($this->session->userdata('id_konsumen')): ?>

                                <a href="<?=base_url('shop/add_to_chart/' . $ap['id_barang'])?>" class="add-cart">+
                                    Add To
                                    Cart</a>

                                <?php else: ?>

                                <a class="add-cart" data-toggle="modal" data-target="#modalLogin">+ Add To Cart</a>

                                <?php endif;?>


                                <h5><?='Rp ' . number_format($ap['harga'], 2, ",", ".")?></h5>
                                <!-- <div class="product__color__select">
                                    <label for="pc-7">
                                        <input type="radio" id="pc-7">
                                    </label>
                                    <label class="active black" for="pc-8">
                                        <input type="radio" id="pc-8">
                                    </label>
                                    <label class="grey" for="pc-9">
                                        <input type="radio" id="pc-9">
                                    </label>
                                </div> -->
                            </div>
                        </div>
                    </div>



                    <?php endforeach?>

                </div>
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <div class="product__pagination">
                            <a class="active" href="#">1</a>
                            <a href="#">2</a>
                            <a href="#">3</a>
                            <span>...</span>
                            <a href="#">21</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>