<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Item Detail</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary" href="<?= site_url('transaksi') ?>" style="margin-bottom: 19px;">
                            BACK
                        </a>

                        <?php echo form_open('transaksi/update/'); ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>QUANTITY</th>
                                    <th>NAMA BARANG</th>
                                    <th>HARGA BARANG</th>
                                    <th>TOTAL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>

                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <tr>
                                        <td><?php echo form_input(array('name' => $i . '[qty]', 'value' => $items['qty'], 'min' => '0', 'maxlength' => '3', 'size' => '5', 'type' => 'number', 'class' => 'form-control')); ?></td>
                                        <td class="text-center">
                                            <?php echo $items['name']; ?>
                                        </td>
                                        <td class="text-center" style="text-align:right">Rp. <?php echo number_format($items['price'], 0); ?></td>
                                        <td class="text-center" style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0); ?></td>
                                        <td class="text-center">
                                            <a href="<?= site_url('transaksi/delete/' . $items['rowid']) ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    <?php $i++; ?>

                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2"> </td>
                                    <td class="text-center"><strong>Total</strong></td>
                                    <td class="text-center"><strong>Rp. <?php echo number_format($this->cart->total(), 0); ?></strong> </td>
                                    <td colspan="2"> </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="<?= site_url('transaksi/checkout') ?>" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </a>
                                <a type="submit" class="btn btn-primary float-right" href="<?= site_url('transaksi/update') ?>" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Update
                                </a>
                                <a href="<?= site_url('transaksi/clear') ?>" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-danger float-right" style="margin-right: 5px;">
                                    <i class="fas fa-retweet"></i> Clear Cart
                                </a>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>