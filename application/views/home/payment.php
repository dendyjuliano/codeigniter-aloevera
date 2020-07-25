<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/search.css'); ?>">
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/t-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/themes/t-datepicker-blue.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style-date.css">



    <title><?= $title ?></title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="display-4">EDOTEL ALOEVERA</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Jln.Jenderal Sudirman, Kab.Ciamis, Kec.Ciamis, Ciamis, Jawa barat, Indonesia</p>
                </div>
            </div>
        </div>
    </div>

    <div class="infopanel1 text-white justify-content-center">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-3">
                    <a class="nav-item nav-link text-secondary">1 ROOM SELECTION</a>
                </div>
                <div class="col-md-3">
                    <a class="nav-item nav-link text-secondary">2 BOKING DETAIL</a>
                </div>
                <div class="col-md-3">
                    <a class="nav-item nav-link text-secondary">3 BOKING INFORMATION</a>
                </div>
                <div class="col-md-3">
                    <a class="nav-item nav-link text-light active">4 FINISH</a>
                </div>
            </div>
        </div>
    </div>

    <?php
    $id_kamar    = $transaksi['id_kamar'];
    $query = "SELECT `tb_kamar`.*,`transaksi`.* FROM `tb_kamar` LEFT JOIN `transaksi` ON `transaksi`.`id_kamar` = `tb_kamar`.`id` WHERE `tb_kamar`.`id` = $id_kamar";
    $kamar = $this->db->query($query)->row_array();

    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-5">
                    <h5 class="card-header">Select Payment Method</h5>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="metode">Select Metode</label>
                                <select class="form-control" name="metode" id="metode">
                                    <option value="" disabled selected>--SELECT HERE--</option>
                                    <?php foreach ($metode as $row) : ?>
                                        <option value="<?= $row['id'] ?>"><?= $row['nama_metode'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="payment">Select Payment</label>
                                <select class="form-control" name="payment" id="payment" disabled>
                                    <option disabled selected>--SELECT PAYMENT HERE--</option>
                                </select>
                            </div>


                            <input type="hidden" class="form-control" autocomplete="off" name="kode" value="<?= $kode ?>">
                            <input type="hidden" class="form-control" autocomplete="off" name="nomor" value="<?= $kamar['nomor_pesanan'] ?>">

                            <button type="submit" class="btn btn-primary">Select</button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <img class="img-fluid" src="<?= base_url() . 'uploads/' . $kamar['image'] ?>" width="300" alt="">
                        <h6 class="mt-2">Booking Code : <?= $kamar['nomor_pesanan'] ?></h6>
                        <h6> Name : <?= $kamar['nama_customer'] ?></h6>
                        <h6> Email : <?= $kamar['email_customer'] ?></h6>
                        <h6> Checkin : <?= $kamar['checkin'] ?></h6>
                        <h6> Checkout : <?= $kamar['checkout'] ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Footer -->
    <footer class="page-footer font-small blue pt-4 mt-5">
        <div class="container">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h4 class="text-uppercase text-light">ADDRESS</h4>
                        <h5 class="text-light mt-2"><i class="fas fa-map-marker-alt"></i> Edotel <br> <small>Hotel Convention & Busines</small></h5>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase text-light">SITE MAP</h5>

                        <ul class="list-unstyled ">
                            <li>
                                <a href="#!" class="text-light">Home</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">Room Type</a>
                            </li>
                            <li>
                                <a href="#!" class="text-light">About us</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->



                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

        </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 warna2">
            © 2020 Copyright: Dendy
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->



    <!-- Modal -->
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Javahotel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('auth/login') ?>" method="post">
                    <div class="modal-body">
                        <h4 class="text-center">Login Here</h4>
                        <br>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn buton" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn buton">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('auth/logout') ?>" type="button" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/script.js"></script>

    <script>
        $(document).ready(function() {
            $('#metode').on('change', function() {
                var metode = $(this).val();
                if (metode == '') {
                    $('#payment').prop('disabled', true);
                } else {
                    $('#payment').prop('disabled', false);
                    $.ajax({
                        url: "<?php echo base_url('home/search_payment'); ?>",
                        type: "POST",
                        data: {
                            'metode': metode
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#payment').html(data);
                        },
                        error: function() {

                        }
                    });
                }
            });
        });
    </script>


</body>

</html>