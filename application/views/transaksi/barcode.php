<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Barcode Generator</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <form>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2 mb-3">
                                    <a class="btn btn-primary" href="<?= site_url('transaksi') ?>" style="margin-bottom: 19px;">
                                        BACK
                                    </a>
                                </div>
                            </div>
                            <div class="box-body">
                                <?php
                                $generator = new Picqer\Barcode\BarcodeGeneratorHTML();
                                echo $generator->getBarcode($barang->barcode, $generator::TYPE_CODE_128);
                                ?><br>
                                <?= $barang->barcode ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>