<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tambah Data Sertifikasi</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('sertifikasi') ?>" class="breadcrumb-link">Sertifikasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Sertifikasi
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nipeg" class="col-md-2">NIPEG</label>
                                <div class="col-md-10">
                                    <input type="text" name="nipeg" id="nipeg" class="form-control" required placeholder="NIPEG">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_sertifikasi" class="col-md-2">Nama Sertifikasi</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_sertifikasi" id="nama_sertifikasi" class="form-control" required placeholder="Nama Sertifikasi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_pelaksanaan" class="col-md-2">Tanggal Pelaksanaan</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_pelaksanaan" id="tanggal_pelaksanaan" class="form-control" required placeholder="Tanggal Pelaksanaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_expired" class="col-md-2">Tanggal Expired</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_expired" id="tanggal_expired" class="form-control" required placeholder="Tanggal Expired">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lembaga_penyelenggara" class="col-md-2">Lembaga Penyelenggara</label>
                                <div class="col-md-10">
                                    <input type="text" name="lembaga_penyelenggara" id="lembaga_penyelenggara" class="form-control" required placeholder="Lembaga Penyelenggara">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" id="upload_dokumen" class="form-control-file" required>
                                </div>
                            </div>
                            <a href="<?= base_url('sertifikasi') ?>" class="btn btn-sm btn-danger float-right">Batal</a>
                            <button type="submit" name="create" class="btn btn-sm btn-info float-right mr-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
