<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <?php
                $this->load->view('/template/notifikasi') //memanggil notifikasi.php
                ?>
                <div class="page-header">
                    <h2 class="pageheader-title">Data MCU</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('mcu') ?>" class="breadcrumb-link">MCU</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data MCU</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Data MCU
                        <?php if ($this->session->userdata('level') != 'user') : ?>
                            <a href="<?= base_url('mcu/tambah') ?>" class="btn btn-sm btn-success float-right">
                                <i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="<?= base_url('mcu/cetak') ?>" target="_blank" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-print"></i> Cetak Data</a>
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama</th>
                                    <th>NIPEG</th>
                                    <th>Tahun Pelaksanaan</th>
                                    <th>Kesimpulan Pemeriksaan</th>
                                    <th>Saran</th>
                                    <th>Upload Dokumen</th>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($mcu as $m) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $m->nama ?></td>
                                        <td><?= $m->nipeg ?></td>
                                        <td><?= $m->tahun_pelaksanaan ?></td>
                                        <td><?= $m->kesimpulan_pemeriksaan ?></td>
                                        <td><?= $m->saran ?></td>
                                        <td><a href="<?= base_url('upload/file_mcu/'.$m->upload_dokumen); ?>"class="btn btn-primary btn-sm"  target="_blank"><?= $m->upload_dokumen ?></a></td>
                                        <?php if ($this->session->userdata('level') != 'user') : ?>
                                            <td>
                                                <a href="<?= base_url('mcu/ubah/') ?><?= $m->id_mcu ?>" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i> Ubah
                                                </a>
                                                <a href="<?= base_url('mcu/hapus/') ?><?= $m->id_mcu ?>" onclick="return confirm('Yakin ingin menghapus Data ini')" class="btn btn-danger btn-sm">
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
