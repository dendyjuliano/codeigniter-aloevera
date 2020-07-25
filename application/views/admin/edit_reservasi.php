<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data <?= $reservasi['nama']; ?></h1>
        <div class="buton ml-auto">
            <a href="" class="btn btn-danger btn-sm">Print to PDF</a>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <img src="<?= base_url() . 'uploads/' . $reservasi['image'] ?>" alt="" class="card-img-top">
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Reservasi
                </div>
                <div class="card-body">
                    <?= form_open_multipart('admin/edit_reservasi'); ?>
                    <input type="hidden" name="id" value="<?= $reservasi['id']; ?>">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" value="<?= $reservasi['nama'] ?>" class="form-control" id="name" name="name">
                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" value="<?= $reservasi['username'] ?>" class="form-control" id="username" name="username">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" value="<?= $reservasi['password'] ?>" class="form-control" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm">
                            <p>Image</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="gambar">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right ml-1">Edit Data</button>
                    <a href="<?= base_url('admin/role_2') ?>" class="btn btn-danger btn-sm float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>