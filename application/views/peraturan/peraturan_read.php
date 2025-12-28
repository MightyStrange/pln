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
                    <h2 class="pageheader-title">Data Peraturan Berlaku</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('peraturan') ?>" class="breadcrumb-link">Peraturan Berlaku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Peraturan Berlaku</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Data Peraturan Berlaku
                        <?php if ($this->session->userdata('level') != 'user') : ?>
                            <a href="<?= base_url('peraturan/tambah') ?>" class="btn btn-sm btn-success float-right">
                                <i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('peraturan/cetak') ?>" target="_blank" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-print"></i> Cetak Data</a>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Peraturan</th>
                                    <th>Tahun Berlaku</th>
									<th>Upload Dokumen</th>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($peraturan as $p) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $p->nama_peraturan ?></td>
                                        <td><?= $p->tahun_berlaku ?></td>
										<td><a href="<?= base_url('upload/file_peraturan/'. $p->upload_dokumen); ?>"class="btn btn-primary btn-sm"  target="_blank"><?= $p->upload_dokumen ?></a></td>

                                        <?php if ($this->session->userdata('level') != 'user') : ?>
                                            <td><a href="<?= base_url('peraturan/ubah/') ?><?= $p->id_peraturan ?>" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i>Ubah</a>
                                            <a href="<?= base_url('peraturan/hapus/') ?><?= $p->id_peraturan ?>" onclick="return confirm('Yakin ingin menghapus Data ini')" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i>Hapus</a></td>
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
