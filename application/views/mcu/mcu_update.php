<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui Data MCU</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('mcu') ?>" class="breadcrumb-link">MCU</a></li>
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
                    <div class="card-header">Perbaharui Data MCU</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_mcu" value="<?= $mcu->id_mcu ?>">
                            <div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" required value="<?= $mcu->nama ?>" class="form-control">
                                </div>
                            </div>
                                <div class="form-group row">
                                <label for="nipeg" class="col-md-2">NIPEG</label>
                                <div class="col-md-10">
                                    <input type="text" name="nipeg" required value="<?= $mcu->nipeg ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_pelaksanaan" class="col-md-2">Tahun Pelaksanaan</label>
                                <div class="col-md-10">
                                    <input type="text" name="tahun_pelaksanaan" required value="<?= $mcu->tahun_pelaksanaan ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kesimpulan_pemeriksaan" class="col-md-2">Kesimpulan Pemeriksaan</label>
                                <div class="col-md-10">
                                    <textarea name="kesimpulan_pemeriksaan" required class="form-control"><?= $mcu->kesimpulan_pemeriksaan ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="saran" class="col-md-2">Saran</label>
                                <div class="col-md-10">
                                    <textarea name="saran" required class="form-control"><?= $mcu->saran ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" value="<?= $mcu->upload_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('mcu') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
