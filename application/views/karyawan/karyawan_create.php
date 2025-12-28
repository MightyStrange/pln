<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Tambah Data Karyawan</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('karyawan') ?>" class="breadcrumb-link">Karyawan</a></li>
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
                        Tambah Data Karyawan
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="username" class="col-md-2">Username</label>
                                <div class="col-md-10">
                                    <input type="text" name="username" id="username" class="form-control" required placeholder="Username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-2">Password</label>
                                <div class="col-md-10">
                                    <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nipeg" class="col-md-2">Nipeg</label>
                                <div class="col-md-10">
                                    <input type="text" name="nipeg" id="nipeg" class="form-control" required placeholder="Nipeg">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama_karyawan" class="col-md-2">Nama Karyawan</label>
                                <div class="col-md-10">
                                    <input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control" required placeholder="Nama Karyawan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="unit" class="col-md-2">Unit</label>
                                <div class="col-md-10">
                                    <input type="text" name="unit" id="unit" class="form-control" required placeholder="Unit">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="divisi" class="col-md-2">Divisi</label>
                                <div class="col-md-10">
                                    <input type="text" name="divisi" id="divisi" class="form-control" required placeholder="Divisi">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-2">Email</label>
                                <div class="col-md-10">
                                    <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="level" class="col-md-2">Level</label>
                                <div class="col-md-10">
                                    <input type="text" name="level" id="level" class="form-control" required placeholder="Level">
                                </div>
                            </div>
                            <a href="<?= base_url('karyawan') ?>" class="btn btn-sm btn-danger float-right">Batal</a>
                            <button type="submit" name="create" class="btn btn-sm btn-info float-right mr-1">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
