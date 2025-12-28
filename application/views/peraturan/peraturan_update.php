<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-l2 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui Data Peraturan Berlaku</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('peraturan_berlaku') ?>" class="breadcrumb-link">Peraturan Berlaku</a></li>
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
                    <div class="card-header">Perbaharui Data Peraturan Berlaku</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_peraturan" value="<?= $peraturan->id_peraturan ?>">
                            <div class="form-group row">
                                <label for="nama_peraturan" class="col-md-2">Nama Peraturan</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_peraturan" required value="<?= $peraturan->nama_peraturan ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_berlaku" class="col-md-2">Tahun Berlaku</label>
                                <div class="col-md-10">
                                    <input type="date" name="tahun_berlaku" value="<?= $peraturan->tahun_berlaku ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" value="<?= $peraturan->upload_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('Peraturan') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
