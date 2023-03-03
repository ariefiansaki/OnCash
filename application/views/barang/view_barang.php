<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <a href="#" class="btn btn-primary mb-3" id="tambahbarang">
                            <i class="fas fa-plus"></i>
                            Tambah Data</a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addbarang" style="margin-bottom: 19px;">
                            TAMBAH BARANG
                        </button>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>KATEGORI BARANG</th>
                                    <th>HARGA BARANNG</th>
                                    <th>STOK BARANG</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($barang as $b) {
                                ?>
                                    <tr>
                                        <td> <?= $b->id_barang ?> </td>
                                        <td> <?= $b->nama_barang ?> </td>
                                        <td> <?= $b->kategori_barang ?> </td>
                                        <td> <?= $b->harga_barang ?> </td>
                                        <td> <?= $b->stok_barang ?> </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editbarang"><i class="fas fa-edit"></i></button>
                                            <a href=" <?= base_url('barang/hapus/' . $b->id_barang); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        </td>
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

    <form action="<?= base_url('barang/updatebarang/'); ?>" class="modal fade" id="editbarang" role="dialog" aria-labelledby="editbarangLabel" aria-hidden="true" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editbarangLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form action="" method="POST"> -->
                    <div class="mb-3">
                        <input type="hidden" name="idbarang" value="<?= $b->id_barang ?>">
                        <label for="exampleInputtext1">Nama Barang</label>
                        <input type="text" class="form-control" name="namabarang" id="namabarang" value="<?php echo $b->nama_barang; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Kategori Barang</label>
                        <input type="text" class="form-control" name="kategoribarang" id="kategoribarang" value="<?php echo $b->kategori_barang; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Harga Barang</label>
                        <input type="text" class="form-control" name="hargabarang" id="hargabarang" value="<?= $b->harga_barang ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Stok Barang</label>
                        <input type="text" class="form-control" name="stokbarang" id="stokbarang" value="<?= $b->stok_barang ?>" required>
                    </div>
                    <!-- </form>  -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </form>>

    <!-- Modal -->
    <form action="<?= base_url('barang/simpanbarang'); ?>" class="modal fade" id="addbarang" tabindex="-1" role="dialog" aria-labelledby="addbarangLabel" aria-hidden="true" method="POST">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addbarangLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputtext1">Nama Barang</label>
                            <input type="text" class="form-control" name="namabarang" id="namabarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Kategori Barang</label>
                            <input type="text" class="form-control" name="kategoribarang" id="kategoribarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Harga Barang</label>
                            <input type="text" class="form-control" name="hargabarang" id="hargabarang" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Stok Barang</label>
                            <input type="text" class="form-control" name="stokbarang" id="stokbarang" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editbarang">
        Launch demo modal
    </button> -->

    <!-- Modal -->