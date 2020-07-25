<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
        <div class="buton ml-auto">
            <a href="<?= base_url('admin/pdf_transfer') ?>" class="btn btn-danger btn-sm">Print to PDF</a>
        </div>
    </div>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?= form_error('name', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
    <?= form_error('username', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>
    <?= form_error('password', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>', '</div>'); ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table data text-center" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Code Payment</th>
                            <th>Bank</th>
                            <th>Account Number</th>
                            <th>Account Owner</th>
                            <th>Transfer Amount</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transferdata as $ad) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ad['kode_pembayaran'] ?></td>
                                <td><?= $ad['nama_bank'] ?></td>
                                <td><?= $ad['nomor_rekening'] ?></td>
                                <td><?= $ad['pemilik_rekening'] ?></td>
                                <td>IDR <?= number_format($ad['jml_transfer']) ?></td>
                                <td><img src="<?= base_url() . 'uploads/' . $ad['image'] ?>" width="100" alt=""></td>
                                <td>
                                    <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_transfer/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Data <?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/insert_customer') ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Input Name">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Input Password">
                    </div>
                    <div class="form-group">
                        <label for="role">Role ID</label>
                        <select class="form-control" name="role_id" id="role">
                            <option value="" disabled selected>--Select Role--</option>
                            <?php foreach ($role as $row) : ?>
                                <option value="<?= $row->id ?>"><?= $row->role ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>