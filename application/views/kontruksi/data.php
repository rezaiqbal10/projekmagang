<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Pelaksanaan Kontruksi
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('kontruksi/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Pelaksanaan Kontruksi
                    </span>
                </a>
            </div>
        </div>
    </div>
	
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Paket Pekerjaan</th>
                     <th>Lokasi</th>
                      <th>Output</th>
                       <th>Outcome</th>
                    <th>Penyedia Jasa</th>
                    <th>Tahun Anggaran</th>
                    <th>Biaya</th>
                     <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($kontruksi) :
                    foreach ($kontruksi as $j) :
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $j['paket_pekerjaan']; ?></td>
                            <td><?= $j['lokasi']; ?></td>
                            <td><?= $j['output']; ?></td>
                            <td><?= $j['outcome']; ?></td>
                             <td><?= $j['penyedia_jasa']; ?></td>
                             <td><?= $j['tahun_anggaran']; ?></td>
                             <td><?= $j['biaya']; ?></td>
                            <td>
                                <a href="<?= base_url('kontruksi/edit/') . $j['id'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('kontruksi/delete/') . $j['id'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
