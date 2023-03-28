<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data USER</h1>
            </div>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('msg') ?>

        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <a href="#" class="btn btn-primary mb-3" id="tambahuser">
                            <i class="fas fa-plus"></i>
                            Tambah Data</a> -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser" style="margin-bottom: 19px;">
                            TAMBAH USER
                        </button>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID USER</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>PHONE</th>
                                    <th>EMAIL</th>
                                    <th>LEVEL</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($user as $u) {
                                ?>
                                    <tr>
                                        <td> <?= $u->id_user ?> </td>
                                        <td> <?= $u->nama_lengkap ?> </td>
                                        <td> <?= $u->no_hp ?> </td>
                                        <td> <?= $u->email ?> </td>
                                        <td> <?= $u->level ?> </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edituser"><i class="fas fa-edit"></i></a>
                                            <a href=" <?= base_url('user/hapus/' . $u->id_user); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
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

    <form action="<?= base_url('user/updateuser/'); ?>" class="modal fade" id="edituser" role="dialog" aria-labelledby="edituserLabel" aria-hidden="true" method="post">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edituserLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <form action="" method="POST"> -->
                    <div class="mb-3">
                        <input type="hidden" name="id_user" value="<?= $u->id_user ?>">
                        <label for="exampleInputtext1">Nama user</label>
                        <input type="text" class="form-control" name="nama_lengkap" id="namalengkap" value="<?php echo $u->nama_lengkap; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $u->no_hp; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">email</label>
                        <input type="text" class="form-control" name="email" id="email" value="<?= $u->email ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">password</label>
                        <input type="text" class="form-control" name="password" id="password" value="<?= $u->password ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputtext1">level</label>
                        <input type="text" class="form-control" name="level" id="level" value="<?= $u->level ?>" required>
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
    <form action="<?= base_url('user/simpanuser'); ?>" class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="adduserLabel" aria-hidden="true" method="POST">
        <div class=" modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adduserLabel">Tambah user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <!-- <input type="hidden" name="id_user" value="<?= $u->id_user ?>"> -->
                            <label for="exampleInputtext1">Nama user</label>
                            <input type="text" class="form-control" name="namalengkap" id="namalengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Password</label>
                            <input type="text" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputtext1">Level</label>
                            <input type="text" class="form-control" name="level" id="level" required>
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
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edituser">
        Launch demo modal
    </button> -->

    <!-- Modal -->