<div class="row">
  <div class="col s12">
    <div class="card">
      <div class="card-content grey darken-3 lighten-1 white-text">
        <span class="card-title"><?php echo $pageTitle; ?></span>
      </div>
      <div class="card-content">
        <form class="row" id="add-user-form" method="post" action="">
          <?php if(validation_errors()): ?>
            <div class="col s12">
              <div class="card-panel red">
                <span class="white-text"><?php echo validation_errors('<p>', '</p>'); ?></span>
              </div>
            </div>
          <?php endif; ?>
          <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <div class="input-field col s12 m6">
              <input id="desk_pekerjaan" name="desk_pekerjaan" type="text" value="<?php echo set_value('desk_pekerjaan'); ?>">
              <label for="desk_pekerjaan" class=""><span class="text-danger">*</span>Judul Regulator</label>
          </div>


          <div class="input-field col s12 m6">
              <input id="tgl_mulai" class="datepicker" name="tgl_mulai" type="text" value="<?php echo set_value('tgl_mulai'); ?>">
              <label for="tgl_mulai" class=""><span class="text-danger">*</span>Tanggal Penyerahan</label>
          </div>

           <div class="input-field col s12 m6">
              <input id="tgl_berakhir" class="datepicker" name="tgl_berakhir" type="text" value="<?php echo set_value('tgl_berakhir'); ?>">
              <label for="tgl_berakhir" class=""><span class="text-danger">*</span>Tanggal Jatuh Tempo</label>
          </div>

          
       <div class="form-group">
        <div class="input-field col s12 m6">
         <select name="status" id="status" class="form-control" required="required">
          <option disabled selected><span class="text-danger">*</span>Pilih Status</option>
          <option value="Waiting">Waiting</option>
                      <option value="On Progress">On Progress</option>
                       <option value="Closed">Publish</option>
         </select>
       </div>
      </div>

           <div class="col s12 m12">
              <label for="keterangan">Keterangan</label>
              <textarea id="keterangan" name="keterangan" type="text" value="<?php echo set_value('keterangan'); ?>"></textarea>
          </div> 


        <div class="input-field col s12 right-align">
              <button type="submit" name="submit" value="add_event" class="btn amber waves-effect blue-grey darken-4">Save</button>
              <button type="reset" name="reset" value="Reset" class="btn amber waves-effect blue-grey darken-4">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
