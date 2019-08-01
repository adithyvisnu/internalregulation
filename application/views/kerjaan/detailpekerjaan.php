<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content grey darken-3 lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
        <?php $no = $this->uri->segment(3); foreach($kerjaan as $row): ?>
    <?php endforeach; ?>
    <!--      <a href="<?php echo base_url('kerjaan/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light amber tooltipped" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
    -->  </div>
      <div class="card-content">
        <div class="row">
          <div class="input-field col s12 m6">
              <input readonly id="desk_pekerjaan" name="desk_pekerjaan" type="text" value="<?php echo $kerjaan->desk_pekerjaan; ?>">
              <label for="desk_pekerjaan" class=""><span class="text-danger">*</span>Deskripsi Pekerjaan</label>
          </div>

           <div class="input-field col s12 m6">
              <input readonly id="tgl_mulai" name="tgl_mulai" type="text" value="<?php echo $kerjaan->tgl_mulai; ?>">
              <label for="tgl_mulai" class=""><span class="text-danger">*</span>Tanggal Mulai Pekerjaan</label>
          </div>


          <div class="input-field col s12 m6">
              <input readonly id="tgl_berakhir" name="tgl_berakhir" type="text" value="<?php echo $kerjaan->tgl_berakhir; ?>">
              <label for="tgl_berakhir" class=""><span class="text-danger">*</span>Tanggal Akhir Pekerjaan</label>
          </div>

         

          <div class="input-field col s12 m6">
              <input readonly id="status" name="status" type="text" value="<?php echo $kerjaan->status; ?>">
              <label for="status" class=""><span class="text-danger">*</span>Status</label>
          </div>


           <div class="input-field col s12 m6">
             
              <label for="keterangan" class=""><span class="text-danger">*</span>Keterangan</label>
               <input readonly id="keterangan" name="keterangan" type="text" value="<?php echo $kerjaan->keterangan; ?>">
          </div>

        </div>
      </div>
    </div>
  </div>
  </div>
<div class="card-content">