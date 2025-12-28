<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Perbaharui Data SK</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('sk') ?>" class="breadcrumb-link">SK</a></li>
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
                    <div class="card-header">Perbaharui Data SK</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_sk" value="<?= $sk->id_sk ?>">
                            <div class="form-group row">
                                <label for="nama" class="col-md-2">Nama</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama" value="<?= $sk->nama ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nipeg" class="col-md-2">NIPEG</label>
                                <div class="col-md-10">
                                    <input type="text" name="nipeg" value="<?= $sk->nipeg ?>" class="form-control" required >
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomor_sk" class="col-md-2">Nomor SK</label>
                                <div class="col-md-10">
                                    <input type="text" name="no_sk" required value="<?= $sk->no_sk ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_pembuatan_sk" class="col-md-2">Tanggal Pembuatan SK</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_pembuatan_sk" required value="<?= $sk->tanggal_pembuatan_sk ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal_berlaku" class="col-md-2">Tanggal Berlaku</label>
                                <div class="col-md-10">
                                    <input type="date" name="tanggal_berlaku" required value="<?= $sk->tanggal_berlaku ?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="upload_dokumen" class="col-md-2">Upload Dokumen</label>
                                <div class="col-md-10">
                                    <input type="file" name="upload_dokumen" value="<?= $sk->upload_dokumen ?>" class="form-control">
                                </div>
                            </div>
                            <a href="<?= base_url('sk') ?>" class="btn btn-sm btn-danger float-right"> Batal</a>
                            <button type="submit" name="update" class="btn btn-sm btn-info float-right mr-1"> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
