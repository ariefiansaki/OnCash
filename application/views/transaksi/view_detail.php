<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Detail Transaksi</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID TRANSAKSI</th>
                                    <th>DATE</th>
                                    <th>QUANTITY</th>
                                    <th>SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail as $d) {
                                ?>
                                    <tr>
                                        <td> <?= $d->id_transaksi ?> </td>
                                        <td> <?= $d->date ?> </td>
                                        <td> <?= $d->qty ?> </td>
                                        <td>Rp. <?= number_format($d->subtotal, 0) ?> </td>
                                    </tr>
                                <?php
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>