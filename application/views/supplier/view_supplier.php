<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Supplier</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <a href="#" class="btn btn-primary mb-3" id="tambahsupplier">
                            <i class="fas fa-plus"></i>
                            Tambah Data</a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsupplier" style="margin-bottom: 19px;">
                            TAMBAH SUPPLIER
                        </button>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID SUPPLIER</th>
                                    <th>NAMA SUPPLIER</th>
                                    <th>PHONE</th>
                                    <th>ALAMAT</th>
                                    <th>KETERANGAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($supplier as $s) {
                                ?>
                                    <tr>
                                        <td> <?= $s->id_supplier ?> </td>
                                        <td> <?= $s->nama_supplier ?> </td>
                                        <td> <?= $s->phone ?> </td>
                                        <td> <?= $s->alamat ?> </td>
                                        <td> <?= $s->keterangan ?> </td>
                                        <td>
                                            <a href="<?= site_url('supplier/updatesupplier/' . $s->id_supplier); ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editsupplier"><i class="fas fa-edit"></i></a>
                                            <a onclick="return confirm('Apakah Anda Yakin?')" href=" <?= base_url('supplier/hapus/' . $s->id_supplier); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

    <form action="<?= base_url('supplier/updatesupplier/'); ?>" class="modal fade" id="editsupplier" role="dialog" aria-labelledby="editsupplierLabel" aria-hidden="true" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editsupplierLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form action="" method="POST"> -->
                    <div class="mb-3">
                        <input type="hidden" name="idsupplier" value="<?= $s->id_supplier ?>">
                        <label for="exampleInputtext1">Nama supplier</label>
                        <input type="text" class="form-control" name="namasupplier" id="namasupplier" value="<?php echo $s->nama_supplier; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $s->phone; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $s->alamat ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $s->keterangan ?>" required>
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
    <form action="<?= base_url('supplier/simpansupplier'); ?>" class="modal fade" id="addsupplier" tabindex="-1" role="dialog" aria-labelledby="addsupplierLabel" aria-hidden="true" method="POST">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addsupplierLabel">Tambah supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputtext1">Nama supplier</label>
                            <input type="text" class="form-control" name="namasupplier" id="namasupplier" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">keterangan</label>
                            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
    </form>