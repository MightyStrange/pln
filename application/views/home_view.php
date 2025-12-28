<?php
date_default_timezone_set('Asia/Makassar'); // Ganti dengan zona waktu Kalimantan Selatan (Banjarmasin)

$jam = date('H');

if ($jam >= 0 && $jam < 12) {
    $selamat_datang = "Selamat Pagi";
} elseif ($jam >= 12 && $jam < 15) {
    $selamat_datang = "Selamat Siang";
} elseif ($jam >= 15 && $jam < 18) {
    $selamat_datang = "Selamat Sore";
} else {
    $selamat_datang = "Selamat Malam";
}

// Mendapatkan nilai sesi 'nama_karyawan'
$nama_karyawan = $this->session->userdata('nama_karyawan');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan stylesheet atau file CSS Anda di sini -->
	<style>
        

       
        

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
	
    <div class="dashboard-wrapper">
						<!-- Layer 1 dan 2 untuk background -->
						<div class="background-layer fade-in" id="backgroundLayer1"></div>	
    					<div class="background-layer fade-out" id="backgroundLayer2"></div>
		
        <div class="container-fluid dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader -->
            <!-- ============================================================== -->
			 
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Dashboard </h2>
                        <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
		
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
								
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end pageheader -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 class="text-center"><?= $selamat_datang ?>, <?= $nama_karyawan ?>!</h3>
                    <p class="text-center">Anda berhasil login.</p>
                    <!-- Tambahkan gambar di sini -->
                    
                </div>
            </div>
        </div>
						
    </div>
	
    <!-- Sertakan script atau file JavaScript Anda di sini -->
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
