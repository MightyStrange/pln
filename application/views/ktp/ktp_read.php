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
                    <h2 class="pageheader-title">Data Ktp</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('ktp') ?>" class="breadcrumb-link">Ktp</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Ktp</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Data Ktp
                        <?php if ($this->session->userdata('level') != 'user') : ?>
                            <a href="<?= base_url('ktp/tambah') ?>" class="btn btn-sm btn-success float-right">
                                <i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('ktp/cetak') ?>" target="_blank" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-print"></i> Cetak Data</a>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Upload Dokumen</th>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($ktp as $t) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $t->no_ktp ?></td>
                                        <td><?= $t->nama ?></td>
                                        <td><?= $t->alamat ?></td>
                                        <td><?= $t->tanggal_lahir ?></td>
                                        <td><a href="<?= base_url('upload/file_ktp/' . $t->upload_dokumen); ?>" 
   												class="btn btn-primary btn-sm" 
   												target="_blank">
  												 <?= $t->upload_dokumen ?>
													</a>
														</td>
                                        <?php if ($this->session->userdata('level') != 'user') : ?>
                                            <td>
                                            <a href="<?= base_url('ktp/ubah/') ?><?= $t->id_ktp ?>" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i>Ubah</a>
                                            
                                            <a href="<?= base_url('ktp/hapus/') ?><?= $t->id_ktp ?>" onclick="return confirm('Yakin ingin menghapus Data ini')" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i>Hapus</a>
                                            
                                           
                                        </td>
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
<!-- Modal -->
<div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-labelledby="documentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="documentModalLabel">Dokumen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Konten PDF.js atau ViewerJS akan dimuat di sini -->
                <iframe id="documentViewer" width="100%" height="600" style="border: none;"></iframe>
            </div>
        </div>
    </div>
</div>
