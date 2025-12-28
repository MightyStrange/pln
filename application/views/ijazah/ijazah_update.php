<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-l2 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui Data Ijazah</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo base_url('ijazah') ?>" class="breadcrumb-link">Ijazah</a></li>
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
                    <div class="card-header">Perbaharui Data Ijazah</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_ijazah" value="<?= $ijazah->id_ijazah ?>">
							<div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" required value="<?= $ijazah->nama ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_sekolah" class="col-md-2">Nama Sekolah</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_sekolah" required value="<?= $ijazah->nama_sekolah ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pendidikan" class="col-md-2">Pendidikan</label>
                                <div class="col-md-10">
                                    <input type="text" name="pendidikan" value="<?= $ijazah->pendidikan?>" required class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_masuk" class="col-md-2">Tahun Masuk</label>
                                <div class="col-md-10">
                                    <input type="number" name="tahun_masuk" required value="<?= $ijazah->tahun_masuk ?>" class="form-control" pattern="\d{4}"
                                        title="Masukkan tahun dengan format 4 digit angka">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_lulus" class="col-md-2">Tahun Lulus</label>
                                <div class="col-md-10">
                                    <input type="number" name="tahun_lulus" required value="<?= $ijazah->tahun_lulus ?>" class="form-control" pattern="\d{4}"
                                        title="Masukkan tahun dengan format 4 digit angka">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" value="<?= $ijazah->upload_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('ijazah') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
