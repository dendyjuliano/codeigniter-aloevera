<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/room_information.css">
    <link href="https://fonts.googleapis.com/css?family=Abhaya+Libre&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                ALOEVERA
            </a>
            <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navigation-bar">
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav ml-auto">
                        <a class="nav-item nav-link " href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-item nav-link " href="<?= base_url('home/room_i') ?>">Room Type</a>
                        <a class="nav-item nav-link " href="#about">About</a>
                        <?php if ($this->session->userdata('username')) { ?>
                            <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#logout">Logout</a>
                        <?php } else { ?>
                            <a class="nav-item nav-link" href="#" data-toggle="modal" data-target="#login">Login</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="room">
        <div class="container">
            <h5 class="float-right judul">SUDIRMAN SUITE</h5>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-6">
                        <h5 class="judul1">Published Rates</h5>
                        <br>
                        <p>Double Occupancy IDR. 9.380.000,-</p>
                        <p>Single Occupancy IDR. 9.280.000,-</p>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>assets/img/room2.jpg" height="305px" alt="" class="img-fluid">
                </div>
            </div>

            <br>
            <h5 class="float-left judul">SUDIRMAN SUITE</h5>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>assets/img/room2.jpg" height="305px" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 ">
                    <h5 class="judul1">Published Rates</h5>
                    <br>
                    <p>Double Occupancy IDR. 9.380.000,-</p>
                    <p>Single Occupancy IDR. 9.280.000,-</p>
                </div>
            </div>

            <br>
            <h5 class="float-right judul">SUDIRMAN SUITE</h5>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-6">
                        <h5 class="judul1">Published Rates</h5>
                        <br>
                        <p>Double Occupancy IDR. 9.380.000,-</p>
                        <p>Single Occupancy IDR. 9.280.000,-</p>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>assets/img/room2.jpg" height="305px" alt="" class="img-fluid">
                </div>
            </div>

            <br>
            <h5 class="float-left judul">SUDIRMAN SUITE</h5>
            <br>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= base_url(); ?>assets/img/room2.jpg" height="305px" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 ">
                    <h5 class="judul1">Published Rates</h5>
                    <br>
                    <p>Double Occupancy IDR. 9.380.000,-</p>
                    <p>Single Occupancy IDR. 9.280.000,-</p>
                </div>
            </div>

            
        </div>
        </div> 
        
        <!-- Footer -->
        <footer class="page-footer font-small blue pt-4">
            <hr class="mt-4">
        <div class="container">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h4 class="text-uppercase warna">ADDRESS</h4>
                        <h5 class="warna mt-2"><i class="fas fa-map-marker-alt"></i> Edotel <br> <small>Hotel Convention & Busines</small></h5>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase warna">SITE MAP</h5>

                        <ul class="list-unstyled ">
                            <li>
                                <a href="#!" class="warna3">Home</a>
                            </li>
                            <li>
                                <a href="#!" class="warna3">Room Type</a>
                            </li>
                            <li>
                                <a href="#!" class="warna3">About us</a>
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
            © 2020 Copyright: Kelompok6
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>