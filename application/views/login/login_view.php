<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') ?>">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
        }

        /* Dua layer background untuk transisi */
        .background-layer {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: opacity 1.5s ease-in-out; /* Transisi lebih panjang untuk lebih halus */
        }

        .background-layer.fade-out {
            opacity: 0;
        }

        .background-layer.fade-in {
            opacity: 1;
        }

        .splash-container {
            z-index: 1;
            position: relative;
        }
    </style>
</head>

<body>
    <!-- Layer 1 dan 2 untuk background -->
    <div class="background-layer fade-in" id="backgroundLayer1"></div>
    <div class="background-layer fade-out" id="backgroundLayer2"></div>

    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card rounded">
            <div class="card-header text-center">
                <h1>PLTU ASAM ASAM</h1>
                <span class="splash-description">Silakan Login Terlebih Dahulu</span>
            </div>
            <div class="card-body">
                <?php $this->load->view('template/notifikasi') ?>
                <form method="post">
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" id="username" type="text" placeholder="Username atau No Pendaftaran" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" id="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" name="btn_login" class="btn btn-primary btn-lg btn-block">Login</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0">
                <div class="card-footer"></div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url('assets/vendor/jquery/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.js') ?>"></script>

    <script>
        $(document).ready(function () {
            var images = [
                'assets/images/gambar4.jpg',
                'assets/images/gambar2.jpg',
                'assets/images/gambar3.jpg',
                'assets/images/gambar5.jpg',
                'assets/images/gambar6.jpg',
                'assets/images/gambar7.jpg',
                'assets/images/gambar8.jpg',
                'assets/images/gambar9.jpg',
                'assets/images/gambar10.jpg',
                'assets/images/gambar11.jpg',
				'assets/images/gambar14.jpg',
				'assets/images/gambar15.jpg',


            ];

            var currentIndex = 0;
            var $layer1 = $('#backgroundLayer1');
            var $layer2 = $('#backgroundLayer2');

            function changeBackground() {
                var nextIndex = (currentIndex + 1) % images.length;

                if ($layer1.hasClass('fade-in')) {
                    // Layer 1 sedang aktif, pindahkan gambar ke Layer 2 dan buat Layer 1 memudar keluar
                    $layer2.css('background-image', 'url(' + images[nextIndex] + ')');
                    $layer2.removeClass('fade-out').addClass('fade-in');
                    $layer1.removeClass('fade-in').addClass('fade-out');
                } else {
                    // Layer 2 sedang aktif, pindahkan gambar ke Layer 1 dan buat Layer 2 memudar keluar
                    $layer1.css('background-image', 'url(' + images[nextIndex] + ')');
                    $layer1.removeClass('fade-out').addClass('fade-in');
                    $layer2.removeClass('fade-in').addClass('fade-out');
                }

                currentIndex = nextIndex;
            }

            // Set gambar awal di layer pertama
            $layer1.css('background-image', 'url(' + images[0] + ')');

            setInterval(changeBackground, 2000); // Mengganti gambar setiap 5 detik
        });
    </script>
</body>

</html>
