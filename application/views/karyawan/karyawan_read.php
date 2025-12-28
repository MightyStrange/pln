<!-- Add this script at the end of your HTML file -->
<script>
    $(document).ready(function () {
        $('#mytable').DataTable();
    });
</script>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $this->load->view('/template/notifikasi') //memanggil notifikasi.php
                ?>
                <div class="page-header">
                    <h2 class="pageheader-title">Data Karyawan</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('karyawan') ?>" class="breadcrumb-link">Karyawan</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Data Karyawan
                        <?php if ($this->session->userdata('level') != 'user') : ?>
                            <a href="<?= base_url('karyawan/tambah') ?>" class="btn btn-sm btn-success float-right">
                                <i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('karyawan/cetak') ?>" target="_blank" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-print"></i> Cetak Data</a>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>USERNAME</th>
                                    <th>NIPEG</th>
                                    <th>NAMA KARYAWAN</th>
                                    <th>UNIT</th>
                                    <th>DIVISI</th>
                                    <th>EMAIL</th>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                        <th>LEVEL</th>
                                        <th>AKSI</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($karyawan as $k) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $k->username ?></td>
                                        <td><?= $k->nipeg ?></td>
                                        <td><?= $k->nama_karyawan ?></td>
                                        <td><?= $k->unit ?></td>
                                        <td><?= $k->divisi ?></td>
                                        <td><?= $k->email ?></td>
                                        <?php if ($this->session->userdata('level') != 'user') : ?>
                                            <td><?= $k->level ?></td>
                                            <td><a href="<?= base_url('karyawan/ubah/') ?><?= $k->id ?>" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i>Ubah</a>
                                            <a href="<?= base_url('karyawan/hapus/') ?><?= $k->id ?>" onclick="return confirm('Yakin ingin menghapus Data ini')" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i>Hapus</a></td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
