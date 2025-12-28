<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $this->load->view('/template/notifikasi') //memanggil notifikasi.php
                ?>
                <div class="page-header">
                    <h2 class="pageheader-title">Data Sertifikasi</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('sertifikasi') ?>" class="breadcrumb-link">Sertifikasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Sertifikasi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Data Sertifikasi
                     <?php if ($this->session->userdata('level') != 'user') : ?>
						<a href="<?= base_url('sertifikasi/export_excel') ?>" class="btn btn-sm btn-info float-right" style="margin-right: 10px;">
         					  		 <i class="fas fa-file-excel"></i> Download Excel
      						    </a>
                            <a href="<?= base_url('sertifikasi/tambah') ?>" class="btn btn-sm btn-success float-right">
                                <i class="fas fa-plus"></i> Tambah Data</a>
								
                            <a href="<?= base_url('sertifikasi/cetak') ?>" target="_blank" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-print"></i> Cetak Data</a>
                        <?php endif; ?></div>

                    <div class="card-body">
                        <table class="table-responsive" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>NIPEG</th>
                                    <th>Nama Sertifikasi</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Tanggal Expired</th>
                                    <th>Lembaga Penyelenggara</th>
                                    <th>Upload Dokumen</th>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($sertifikasi as $s) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $s->nama ?></td>
                                        <td><?= $s->nipeg ?></td>
                                        <td><?= $s->nama_sertifikasi ?></td>
                                        <td><?= $s->tanggal_pelaksanaan ?></td>
                                        <td><?= $s->tanggal_expired ?></td>
                                        <td><?= $s->lembaga_penyelenggara ?></td>
                                        <td><a href="<?= base_url('upload/file_sertifikasi/' . $s->upload_dokumen); ?>"class="btn btn-primary btn-sm"  target="_blank"><?= $s->upload_dokumen ?></a></td>
                                        <?php if ($this->session->userdata('level') != 'user') : ?>
                                            <td>
                                                <a href="<?= base_url('sertifikasi/ubah/') ?><?= $s->id_sertifikasi ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i> Ubah
                                                </a>
                                                <a href="<?= base_url('sertifikasi/hapus/') ?><?= $s->id_sertifikasi ?>" onclick="return confirm('Yakin ingin menghapus Data ini')" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                                
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

<!-- Add this script at the end of your HTML fil
