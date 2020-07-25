<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data <?= $title ?></h1>
        <div class="buton ml-auto">
            <a href="<?= base_url('admin/pdf_admin') ?>" class="btn btn-danger btn-sm">Print to PDF</a>
            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addData">
                Add Submenu data
            </button>
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
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th>Icon</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($submenu as $ad) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ad['title'] ?></td>
                                <td><?= $ad['menu'] ?></td>
                                <td><?= $ad['url'] ?></td>
                                <td><?= $ad['icon'] ?></td>
                                <td>
                                    <a class="btn btn-danger tombol-hapus" href="<?= base_url('admin/delete_submenu/') ?><?= $ad['id'] ?>"><i class="fas fa-trash"></i></a>
                                    <a class="btn btn-success" href="<?= base_url('admin/edit_submenu/') ?><?= $ad['id'] ?>"><i class="fas fa-edit"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">Add Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/insert_submenu') ?>" method="post">
                    <div class="form-group">
                        <label for="role">Menu ID</label>
                        <select class="form-control" name="menu" id="menu">
                            <option value="" disabled selected>--Select Role--</option>
                            <?php foreach ($menu as $row) : ?>
                                <option value="<?= $row['id'] ?>"><?= $row['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
                    </div>
                    <div class="form-group">
                        <label for="username">URL</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Input url">
                    </div>
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Input Icon Class">
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