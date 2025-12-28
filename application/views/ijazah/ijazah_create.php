<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tambah Data Ijazah</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>"
                                        class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('ijazah') ?>"
                                        class="breadcrumb-link">Ijazah</a></li>
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
                        Tambah Data Ijazah
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
						<div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" id="nama_sekolah" class="form-control"
                                        required placeholder="Nama ">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_sekolah" class="col-md-2">Nama Sekolah</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_sekolah" id="nama_sekolah" class="form-control"
                                        required placeholder="Nama Sekolah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pendidikan" class="col-md-2">Pendidikan</label>
                                <div class="col-md-10">
                                    <input type="text" name="pendidikan" id="pendidikan" class="form-control" required
                                        placeholder="Pendidikan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tahun_masuk" class="col-md-2">Tahun Masuk</label>
                                <div class="col-md-10">
                                    <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" required
                                        placeholder="Tahun Masuk" min="1000" max="9999">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tahun_lulus" class="col-md-2">Tahun Lulus</label>
                                <div class="col-md-10">
                                    <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control"
                                        required placeholder="Tahun Lulus" min="1000" max="9999">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" id="upload_dokumen" class="form-control-file" required>
                                </div>
                            </div> 
                            <a href="<?= base_url('ijazah') ?>" class="btn btn-sm btn-danger float-right">Batal</a>
                            <button type="submit" name="create"
                                class="btn btn-sm btn-info float-right mr-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
