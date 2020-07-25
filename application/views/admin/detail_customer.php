<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data <?= $admin['nama']; ?></h1>
        <div class="buton ml-auto">
            <a href="" class="btn btn-danger btn-sm">Print to PDF</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url() . 'uploads/' . $admin['image'] ?>" alt="" class="card-img-top">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Admin
                </div>
                <div class="card-body">
                    <?= form_open_multipart('admin/edit_admin'); ?>
                    <input type="hidden" name="id" value="<?= $admin['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" readonly value="<?= $admin['nama'] ?>" class="form-control" id="name" name="name">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" readonly value="<?= $admin['username'] ?>" class="form-control" id="username" name="username">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <a href="<?= base_url('admin/customer') ?>" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>