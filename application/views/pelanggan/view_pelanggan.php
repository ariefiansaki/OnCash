<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Pelanggan</h1>
            </div>
            <?= $this->session->flashdata('msg') ?>
        </div>


        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addpelanggan" style="margin-bottom: 19px;">
                            TAMBAH PELANGGAN
                        </button>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID PELANGGAN</th>
                                    <th>NAMA PELANGGAN</th>
                                    <th>ALAMAT PELANGGAN</th>
                                    <th>TELEPON PELANGGAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pelanggan as $p) {
                                ?>
                                    <tr>
                                        <td> <?= $p->id_pelanggan ?> </td>
                                        <td> <?= $p->nama_pelanggan ?> </td>
                                        <td> <?= $p->alamat_pelanggan ?> </td>
                                        <td> <?= $p->telepon_pelanggan ?> </td>
                                        <td>
                                            <a href="<?= site_url('pelanggan/updatepelanggan/' . $p->id_pelanggan); ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editpelanggan"><i class="fas fa-edit"></i></a>
                                            <a href=" <?= base_url('pelanggan/hapus/' . $p->id_pelanggan); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

    <form action="<?= base_url('pelanggan/updatepelanggan/'); ?>" class="modal fade" id="editpelanggan" role="dialog" aria-labelledby="editpelangganLabel" aria-hidden="true" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editpelangganLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form action="" method="POST"> -->
                    <div class="mb-3">
                        <input type="hidden" name="idpelanggan" value="<?= $p->id_pelanggan ?>">
                        <label for="exampleInputtext1">Nama pelanggan</label>
                        <input type="text" class="form-control" name="namapelanggan" id="namapelanggan" value="<?php echo $p->nama_pelanggan ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Alamat pelanggan</label>
                        <input type="text" class="form-control" name="hargapelanggan" id="hargapelanggan" value="<?= $p->alamat_pelanggan ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Telepon pelanggan</label>
                        <input type="text" class="form-control" name="stokpelanggan" id="stokpelanggan" value="<?= $p->telepon_pelanggan ?>" required>
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

    <form action="<?= base_url('pelanggan/simpanpelanggan'); ?>" class="modal fade" id="addpelanggan" tabindex="-1" role="dialog" aria-labelledby="addpelangganLabel" aria-hidden="true" method="POST">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addpelangganLabel">Tambah Pelanggan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="namaplg" id="namaplg" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Alamat Pelanggan</label>
                            <input type="text" class="form-control" name="alamatplg" id="alamatplg" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Telepon Pelanggan</label>
                            <input type="text" class="form-control" name="teleponplg" id="teleponplg" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>