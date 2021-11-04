<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Tambah Kontruksi
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('sda') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="paket_pekerjaan">Paket Pekerjaan</label>
                    <div class="col-md-7">
                        <input value="<?= set_value('paket_pekerjaan'); ?>" name="paket_pekerjaan" id="paket_pekerjaan" type="text" class="form-control" placeholder="Paket Pekerjaan...">
                        <?= form_error('paket_pekerjaan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="lokasi">Lokasi</label>
                    <div class="col-md-7">
                        <select class="form-control" name="lokasi" id="lokasi"  placeholder="Lokasi" value="<?= set_value('lokasi'); ?>" >
                            <option value="">Kabupaten</option>
                                <option value="Kab. Boyolali">Kab. Boyolali</option>
                                <option value="Kab. Blora">Kab. Blora</option>
                                <option value="Kab. Demak">Kab. Demak</option>
                                <option value="Kab. Grobogan">Kab. Grobogan</option>
                                <option value="Kab. Jepara">Kab. Jepara</option>
                                <option value="Kab. Kendal">Kab. Kendal</option>
                                <option value="Kab. Kudus">Kab. Kudus</option>
                                <option value="Kab. Pati">Kab. Pati</option>
                                <option value="Kota Salatiga">Kota Salatiga</option>
                                <option value="Kota Semarang">Kota Semarang</option>
                                <option value="Kab. Semarang">Kab. Semarang</option>
                                <option value="Kab. Sragen">Kab. Sragen</option>        
                                <option value="Kab. Rembang">Kab. Rembang</option>
                        </select>
                            <?= form_error('lokasi', '<small class="text-danger">', '</small>'); ?>
                    </div>
      
            </div>
                 <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="output">Output</label>
                    <div class="col-md-7">
                        <input value="<?= set_value('output'); ?>" name="output" id="output" type="text" class="form-control" placeholder="Output...">
                        <?= form_error('output', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                 <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="Outcome">Outcome</label>
                    <div class="col-md-7">
                        <input value="<?= set_value('Outcome'); ?>" name="Outcome" id="Outcome" type="text" class="form-control" placeholder="Outcome...">
                        <?= form_error('Outcome', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="penyedia_jasa">Penyedia Jasa</label>
                    <div class="col-md-7">
                        <input value="<?= set_value('penyedia_jasa'); ?>" name="penyedia_jasa" id="penyedia_jasa" type="text" class="form-control" placeholder="Penyedia Jasa...">
                        <?= form_error('penyedia_jasa', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tahun_anggaran">Tahun Anggaran</label>
                    <div class="col-md-4">
                        <input maxlength="4" value="<?= set_value('tahun_anggaran'); ?>" name="tahun_anggaran" id="tahun_anggaran" type="number" class="form-control" placeholder="Tahun...">
                        <?= form_error('tahun_anggaran', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                 <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="biaya">Biaya</label>
                    <div class="col-md-7">
                        <input value="<?= set_value('biaya'); ?>" name="biaya" id="biaya" type="text" class="form-control" placeholder="Biaya...">
                        <?= form_error('biaya', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>