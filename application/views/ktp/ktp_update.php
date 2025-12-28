<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-l2 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui Data Ktp</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('ktp') ?>" class="breadcrumb-link">Ktp</a></li>
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
                    <div class="card-header">Perbaharui Data Ktp</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_ktp" value="<?= $ktp->id_ktp ?>">
                            <div class="form-group row">
                                <label for="no_ktp" class="col-md-2">No Ktp</label>
                                <div class="col-md-10">
                                    <input type="text" name="no_ktp" required value="<?= $ktp->no_ktp ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" value="<?= $ktp->nama?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-md-2">Alamat</label>
                                <div class="col-md-10">
                                    <input type="text" name="alamat" required value="<?= $ktp->alamat ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_lahir" class="col-md-2">Tanggal Lahir</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_lahir" required value="<?= $ktp->tanggal_lahir ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" value="<?= $ktp->upload_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('ktp') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
