<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Transaksi</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <form>
            <!-- <div class="row-mb-3">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <i class="input-group-text" id="basic-addon1">@</i>
                                </div>
                                <input type="text" class="form-control" name="no_faktur" id="no_faktur" placeholder="No Faktur">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <i class="input-group-text" id="basic-addon1">@</i>
                                </div>
                                <input type="text" class="form-control" name="tgltransaksi" id="tgltransaksi" placeholder="Tanggal Transaksi">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <i class="input-group-text" id="basic-addon1">@</i>
                                </div>
                                <input type="hidden" name="idpelanggan">
                                <input type="text" class="form-control" name="namapelanggan" id="namapelanggan" placeholder="Pelanggan">
                            </div>
                            <div class="dropdown mb-3">
                                <select name="jenistransaksi" id="jenistransaksi" class="btn btn-primary dropdown-toggle">
                                    <option value="">PILIH JENIS TRANSAKSI</option>
                                    <option value="tunai">TUNAI</option>
                                    <option value="kredit">KREDIT</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <i class="input-group-text" id="basic-addon1">@</i>
                                </div>
                                <input type="text" class="form-control" name="jatuhtempo" id="jatuhtempo" placeholder="Jatuh Tempo">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <i class="input-group-text" id="basic-addon1">@</i>
                                </div>
                                <input type="hidden" name="id_user">
                                <input type="text" class="form-control" name="username" id="username" placeholder="Kasir">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold" id="totalpenjualan" style="font-size: 9rem; color:black;">0</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-shopping-cart" style="font-size: 9rem; color:black;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <?php $cart = $this->cart->contents();
                                $qty_item = 0;
                                foreach ($cart as $key => $value) {
                                    $qty_item = $qty_item + $value['qty'];
                                }
                                ?>
                                <div class="col-md-2 mb-3">
                                    <a class="btn btn-primary" href="<?= base_url('transaksi/detailCart') ?>">
                                        <i class="fas fa-shopping-cart"></i> Items ( <?= $qty_item ?> )
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>BARCODE</th>
                                            <th>NAMA BARANG</th>
                                            <th>HARGA</th>
                                            <th>QUANTITY</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($barang as $b => $data) {
                                        ?>
                                            <tr>
                                                <?php echo form_open('Transaksi/addToCart');
                                                echo form_hidden('id', $data->id_barang);
                                                echo form_hidden('qty', 1);
                                                echo form_hidden('price', $data->harga_barang);
                                                echo form_hidden('name', $data->nama_barang);
                                                ?>
                                                <td><?= $no ?></td>
                                                <td>
                                                    <?= $data->barcode ?><br>
                                                    <a href="<?= site_url('transaksi/barcode/' . $data->id_barang) ?>" class="btn btn-default btn-xs"><i class="fa fa-barcode"></i> Barcode</a>
                                                </td>
                                                <td> <?= $data->nama_barang ?> </td>
                                                <td> <?= $data->harga_barang ?> </td>
                                                <td> <?= $data->stok_barang ?> </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button>
                                                </td>
                                                <?php echo form_close() ?>
                                            </tr>
                                        <?php
                                            $no++;
                                        } ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
<script src="<?= base_url(); ?>assets/assets2/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            $('#tgltransaksi').datepicker({
                dateFormat: 'yy/mm/dd',
            });
        });
    });
</script>