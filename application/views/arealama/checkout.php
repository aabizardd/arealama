<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Check Out</h4>
                    <div class="breadcrumb__links">
                        <a href="index-2.html">Home</a>
                        <a href="shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <?=$this->session->flashdata('message')?>
            <form action="<?=base_url('shop/kirim_pembayaran')?>" enctype="multipart/form-data" method="POST">
                <div class="row">

                    <div class="col-lg-8 col-md-6">



                        <h6 class="checkout__title">Billing Details</h6>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Depan<span>*</span></p>
                                    <input type="text" name="nama_depan" required />
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Nama Belakang<span>*</span></p>
                                    <input type="text" name="nama_belakang" required />
                                </div>
                            </div>
                        </div>

                        <div class="checkout__input" style="margin-bottom: 80px;">
                            <p>Provinsi</p>
                            <select name="provinsi" id="provinsi" class="checkout__input__add col-12" required
                                onchange="get_ongkir(this);">

                                <option value="" selected>Pilih...</option>
                                <?php foreach ($ongkir as $o): ?>
                                <option value=" <?=$o->ongkir?>"><?=$o->provinsi?></option>
                                <?php endforeach?>
                            </select>

                        </div>

                        <div class="checkout__input">
                            <p>Alamat Lengkap</p>
                            <input type="text" placeholder="Street Address" class="checkout__input__add" name="alamat"
                                required />
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Nomor HP</p>
                                    <input type="number" name="no_hp" required />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="checkout__input">
                                    <p>Bukti Bayar</p>
                                    <input type="file" name="bukti_bayar" required />
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">
                                Product <span>Total</span>
                            </div>
                            <ul class="checkout__total__products">
                                <?php $no = 1?>
                                <?php foreach ($carts as $c): ?>
                                <li>0<?=$no++?>. <?=$c['nama_barang']?> <strong>(<?=$c['qty']?>)</strong>
                                    <span><?='Rp ' . number_format($c['harga'] * $c['qty'], 2, ",", ".")?>

                                    </span>
                                </li>
                                <?php endforeach?>

                                <li> <b>Ongkir </b>
                                    <span id="ongkir"></span>
                                </li>


                            </ul>
                            <ul class="checkout__total__all">

                                <input type="hidden" name="total" id="total" value="<?=$total_cart['total']?>">
                                <li>Total <span
                                        id="total_all"><?='Rp ' . number_format($total_cart['total'], 0, ",", ".")?></span>

                                    <span id="last_total"></span>
                                </li>
                            </ul>


                            <button type="submit" class="site-btn">KIRIM</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>




</section>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>


<script>
function get_ongkir(item) {
    // alert(item.value);
    var ongkir = formatRupiah(item.value, 'Rp. ');
    var ongkir_bef = parseInt($('#total').val());

    var total = ongkir_bef + parseInt(item.value);

    $("#total_all").empty();

    $('#total').val(total);
    $('#ongkir').html(ongkir);
    $('#last_total').html(formatRupiah(String(total), 'Rp. '));

}


function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
</script>