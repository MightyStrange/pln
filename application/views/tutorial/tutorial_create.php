<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tambah Data Tutorial Berlaku</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('TutorialData') ?>" class="breadcrumb-link">Tutorial Berlaku</a></li>
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
                        Tambah Data Tutorial Berlaku
                    </div>
                    <div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="nama_peraturan" class="col-md-2">Nama Tutorial</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_tutorial" id="nama_tutorial" class="form-control" required placeholder="Nama Tutorial">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun" class="col-md-2">Tutorial Berlaku</label>
                                <div class="col-md-10">
                                    <input type="date" name="tahun" id="tahun" class="form-control" required placeholder="Tutorial Berlaku">
                                </div>
                            </div>
                            

							<div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" id="upload_dokumen" class="form-control-file" required>
                                </div>
                            </div> 
                            <a href="<?= base_url('TutorialData') ?>" class="btn btn-sm btn-danger float-right">Batal</a>
                            <button type="submit" name="create"
                                class="btn btn-sm btn-info float-right mr-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
