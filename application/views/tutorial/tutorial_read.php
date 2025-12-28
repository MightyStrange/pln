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
                    <h2 class="pageheader-title">Data Tutorial Berlaku</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url('tutorial') ?>" class="breadcrumb-link">Tutorial Berlaku</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Tutorial Berlaku</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">Data Tutorial Berlaku
                        <?php if ($this->session->userdata('level') != 'user') : ?>
                            <a href="<?= base_url('TutorialData/tambah') ?>" class="btn btn-sm btn-success float-right">
                                <i class="fas fa-plus"></i> Tambah Data</a>
								<a href="<?= base_url('TutorialData/cetak') ?>" target="_blank" class="btn btn-sm btn-info float-right">
                                <i class="fas fa-print"></i> Cetak Data</a>
                            
                        <?php endif; ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="mytable">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Tutorial</th>
                                    <th>Tutorial Berlaku</th>
									<th>Upload Dokumen</th>
                                    <?php if ($this->session->userdata('level') != 'user') : ?>
                                        <th>Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($tutorial as $k) : ?>	
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $k->nama_tutorial ?></td>
                                        <td><?= $k->tahun ?></td>
										<td><a href="<?= base_url('upload/file_tutorial/'. $k->upload_dokumen); ?>"class="btn btn-primary btn-sm"  target="_blank"><?= $k->upload_dokumen ?></a></td>

                                        <?php if ($this->session->userdata('level') != 'user') : ?>
                                            <td><a href="<?= base_url('TutorialData/ubah/') ?><?= $k->id_tutorial ?>" class="btn btn-info btn-sm" ><i class="fas fa-edit"></i>Ubah</a>
                                            <a href="<?= base_url('TutorialData/hapus/') ?><?= $k->id_tutorial ?>" onclick="return confirm('Yakin ingin menghapus Data ini')" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i>Hapus</a></td>
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
