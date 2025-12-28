<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo $title ?></title>
    <!-- Bootstrap CSS -->
    <!-- Add these links to the head section of your HTML file -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.338/pdf.js"></script>

    <!-- Add this script at the end of your HTML file -->
<script>
    $(document).ready(function () {
        $('.view-document').on('click', function (e) {
            e.preventDefault();

            var documentPath = $(this).data('document');
            var documentType = documentPath.split('.').pop().toLowerCase();

            if (documentType === 'pdf') {
                // Jika dokumen adalah PDF
                // Gunakan PDF.js atau ViewerJS untuk menampilkan PDF
                // Sesuaikan URL atau path PDF.js sesuai kebutuhan
                var pdfViewerUrl = 'https://mozilla.github.io/pdf.js/web/viewer.html?file=' + encodeURIComponent(documentPath);
                $('#documentViewer').attr('src', pdfViewerUrl);
            } else {
                // Jika dokumen adalah gambar
                // Gunakan Lightbox atau cara lain untuk menampilkan gambar
                $('#documentViewer').attr('src', documentPath);
            }

            $('#documentModal').modal('show');
        });

    });
    //datatable
        $(document).ready(function () {
            $('#mytable').DataTable({
                searching: true // Enable searching
            });
        });
    </script>

    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/circular-std/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/css/style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/css/dataTables.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/css/buttons.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/css/select.bootstrap4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/css/fixedHeader.bootstrap4.css') ?>">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <?php if ($this->session->userdata('nama_karyawan')): ?>
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="<?php echo base_url('home') ?>">PLTU Asam Asam</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto navbar-right-top">
                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user user-avatar-md rounded-circle"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                    <div class="nav-user-info">
                                        <h5 class="mb-0 text-white nav-user-name">
                                            <?php echo $this->session->userdata('nama_karyawan'); ?>
                                        </h5>
                                        <span class="status">
                                            <i class="fas fa-circle text-success"></i>
                                        </span><span class="ml-2">Online</span>
                                    </div>
                                    <!-- <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                     --><a class="dropdown-item" href="<?php echo base_url('logout/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            <?php else: ?>
                <?php
                    // Redirect ke halaman login jika tidak ada session 'nama_karyawan'
                    redirect('login');
                ?>
            <?php endif; ?>
        </div>
