<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui Data Sertifikasi</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('sertifikasi') ?>" class="breadcrumb-link">Sertifikasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Perbaharui Data</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Perbaharui Data Sertifikasi</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_sertifikasi" value="<?= $sertifikasi->id_sertifikasi ?>">
                            <div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" value="<?= $sertifikasi->nama ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nipeg" class="col-md-2">NIPEG</label>
                                <div class="col-md-10">
                                    <input type="text" name="nipeg" value="<?= $sertifikasi->nipeg ?>" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_sertifikasi" class="col-md-2">Nama Sertifikasi</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_sertifikasi" required value="<?= $sertifikasi->nama_sertifikasi ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_pelaksanaan" class="col-md-2">Tanggal Pelaksanaan</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_pelaksanaan" required value="<?= $sertifikasi->tanggal_pelaksanaan ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_expired" class="col-md-2">Tanggal Expired</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_expired" required value="<?= $sertifikasi->tanggal_expired ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lembaga_penyelenggara" class="col-md-2">Lembaga Penyelenggara</label>
                                <div class="col-md-10">
                                    <input type="text" name="lembaga_penyelenggara" required value="<?= $sertifikasi->lembaga_penyelenggara ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" class="form-control">
                                    <input type="hidden" name="old_upload_dokumen" value="<?= $sertifikasi->upload_dokumen ?>">
                                </div>
                            </div>
                            <a href="<?= base_url('sertifikasi') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
