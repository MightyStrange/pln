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
                                <li class="breadcrumb-item"><a href="<?php echo base_url('TutorialData') ?>" class="breadcrumb-link">Tutorial Berlaku</a></li>
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
                    <div class="card-header">Perbaharui Data Tutorial Berlaku</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_tutorial" value="<?= $tutorial->id_tutorial ?>">
                            <div class="form-group row">
                                <label for="nama_tutorial" class="col-md-2">Nama Tutorial</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_tutorial" required value="<?= $tutorial->nama_tutorial ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun" class="col-md-2">Tahun Berlaku</label>
                                <div class="col-md-10">
                                    <input type="date" name="tahun" value="<?= $tutorial->tahun ?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" value="<?= $tutorial->upload_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('TutorialData') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
