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
                    <h5 class="display-4">Javahotel Ciamis</h5>
                    <p><i class="fas fa-map-marker-alt"></i> Jln.Jenderal Sudirman, Kab.Ciamis, Kec.Ciamis, Ciamis, Jawa barat, Indonesia</p>
                </div>
            </div>
        </div>
    </div>

    <div class="infopanel1 text-white justify-content-center">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-6">
                    <a class="nav-item nav-link text-secondary">Confirm Payment</a>
                </div>
                <div class="col-md-6">
                    <a class="nav-item nav-link text-light active">Proof of Payment</a>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div class="container">

        <div class="information mt-5 text-center justify-content-center">
            <h2>Proof of Payment</h2>

            <div class="container mt-5">
                <?= form_open_multipart('home/confirm_payment'); ?>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Bank</label>
                    <div class="col-sm-8">
                        <input type="text" readonly autocomplete="of" name="bank" class="form-control" value="<?= $bank['pembayaran'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Account Number</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="of" class="form-control" name="rekening">
                        <input type="hidden" autocomplete="of" class="form-control" value="<?= $this->session->userdata('kode') ?>" name="kode">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Account Owner</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="of" class="form-control" name="pemilik">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Transfer Amount</label>
                    <div class="col-sm-8">
                        <input type="text" autocomplete="of" class="form-control" name="jml">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-8 custom-file">
                        <input type="file" class="custom-file-input" id="image" name="gambar">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Confirm</button>
                </form>
            </div>
        </div>


    </div>


    <!-- Footer -->
    <footer class="page-footer font-small blue pt-4 mt-5">
        <div class="container">

            <!-- Footer Links -->
            <div class="container-fluid text-center text-md-left">

                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-6 mt-md-0 mt-3">

                        <!-- Content -->
                        <h4 class="text-uppercase warna text-light">ADDRESS</h4>
                        <h5 class="warna mt-2 text-light"><i class="fas fa-map-marker-alt text-light"></i> JAVAHOTEL <br> <small>Hotel Convention & Busines</small></h5>

                    </div>
                    <!-- Grid column -->

                    <hr class="clearfix w-100 d-md-none pb-3">

                    <!-- Grid column -->
                    <div class="col-md-3 mb-md-0 mb-3">

                        <!-- Links -->
                        <h5 class="text-uppercase warna text-light">SITE MAP</h5>

                        <ul class="list-unstyled ">
                            <li>
                                <a href="#!" class="warna text-light">Home</a>
                            </li>
                            <li>
                                <a href="#!" class="warna text-light">Room Type</a>
                            </li>
                            <li>
                                <a href="#!" class="warna text-light">About us</a>
                            </li>
                        </ul>

                    </div>
                    <!-- Grid column -->



                </div>
                <!-- Grid row -->

            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3 warna text-light">© 2020 Copyright: Dendy
            </div>
            <!-- Copyright -->
        </div>

    </footer>
    <!-- Footer -->







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
        $(function() {
            var dates = $("#from, #to").datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                minDate: '-0d',
                numberOfMonths: 1,
                onSelect: function(selectedDate) {
                    var option = this.id == "from" ? "minDate" : "maxDate",
                        instance = $(this).data("datepicker"),
                        date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
                    dates.not(this).datepicker("option", option, date);
                }
            });
            var date = new Date();

            var day = date.getDate();
            var day2 = date.getDate() + 1;
            var month = date.getMonth() + 1;
            var year = date.getFullYear();

            if (month < 10) month = "0" + month;
            if (day < 10) day = "0" + day;

            var oneday = 24 * 60 * 60 * 1000;
            var one = new Date($("#from").val());
            var two = new Date($("#to").val());


            var hitung = Math.round(Math.round((two.getTime() - one.getTime()) / (oneday)));
            $('#malam').val(hitung + " Night");

        });
    </script>



    <script>
        window.onscroll = function() {
            myFunction()
        };

        var infopanel = document.getElementById("infopanel");
        var panel = document.getElementById("panel");
        var sticky = infopanel.offsetTop;

        function myFunction() {
            if (window.pageYOffset >= sticky) {
                infopanel.classList.add("sticky");
            } else {
                infopanel.classList.remove("sticky");
            }
        }
    </script>

    <script>
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>

</body>

</html>