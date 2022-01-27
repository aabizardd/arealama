<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="index.html">Home</a>
                        <a href="shop.html">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <form action="<?= base_url('welcome/update_cart') ?>" method="POST">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carts as $c) : ?>

                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="<?= base_url('assets_praktikum/img_bahan_modul/' . $c['foto_barang']) ?>"
                                                alt="" width="100">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6><?= $c['nama_barang'] ?></h6>
                                            <h5><?= 'Rp ' . number_format($c['harga'], 2, ",", ".") ?></h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="number" name="qty[]" value="<?= $c['qty'] ?>" min="1">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">
                                        <?= 'Rp ' . number_format($c['harga'] * $c['qty'], 2, ",", ".") ?></td>
                                    <td class="cart__close">
                                        <a href="<?= base_url('delete_cart/' . $c['id']) ?>"><i
                                                class="fa fa-close"></i></a>
                                    </td>
                                </tr>

                                <input type="hidden" name="id_cart[]" value="<?= $c['id'] ?>">

                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="#">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <button type="submit" style="background: none;border: none;"><a
                                        style="color:white">Update
                                        cart</a></button>
                            </div>
                        </div>
                    </div>
                </form>



            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>

                        <li>Total
                            <span><?= 'Rp ' . number_format($total_cart['total'], 2, ",", ".") ?></span>
                        </li>
                    </ul>
                    <a href="#" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>