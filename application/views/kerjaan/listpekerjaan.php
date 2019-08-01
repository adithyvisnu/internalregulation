   <div class="row">
   <div class="col s12">
      <div class="card">
   <div class="card-content grey darken-3 lighten-1 white-text">
          <span class="card-title">Daftar Dokumen</span>
       <?php $no = $this->uri->segment(3); foreach($kerjaan as $row): ?>
    <?php endforeach; ?>
          <a href="<?php echo base_url('kerjaan/add'); ?>" class="btn-floating right halfway-fab waves-effect waves-light blue-grey darken-4" data-position="top" data-tooltip="Tambah Data"><i class="material-icons">add</i></a>
        </div>
<div class="card-content">
   <?php if($message = $this->session->flashdata('message')): ?>
            <div class="col s12">
              <div class="card-panel <?php echo ($message['status']) ? 'green' : 'red'; ?>">
                <span class="white-text"><?php echo $message['message']; ?></span>
              </div>
            </div>
          <?php endif; ?>
          <table id="table_id" class="table table-striped table-bordered">
              <thead>
                  <tr>
                      <th class="center">No</th>
                      <th class="center">Judul</th>
                      <th class="center">Tanggal Penyerahan</th>
                      <th class="center">Tanggal Jatuh Tempo</th>
                      <th style="width:125px;" class="center-align">Status</th>
                      <th style="width:125px;" class="center-align">Aksi</th>
                  </tr>
              </thead>
             <tbody>
                <?php if($kerjaan): ?>
                  <?php $no = $this->uri->segment(3); foreach($kerjaan as $row): ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $row->desk_pekerjaan; ?></td>
                      <td><?php echo $row->tgl_mulai; ?></td>
                      <td><?php echo $row->tgl_berakhir; ?></td>
                      <td class="center-align">
                                        <?php if($row->status == "Waiting"){ ?>
                                        <span class="label label-danger">Waiting</span>

                                        <?php } elseif ($row->status == "On Progress"){ ?>
                                        <span class="label label-warning">On Progress</span>
                                        <?php } else { ?>

                                        <span class="label label-success">Publish</span>
                                        <?php } ?>
                      </td>

                       <td class="center-align"> 
                        <a href="<?php echo base_url('kerjaan/detail/' . $row->id_pekerjaan); ?>" class="btn-floating halfway-fab waves-effect waves-light blue-grey darken-4" data-position="top" data-tooltip="Detail"><i class="material-icons">list</i></a>
                      
                        <a href="<?php echo base_url('kerjaan/edit/' . $row->id_pekerjaan); ?>" class="btn-floating halfway-fab waves-effect waves-light blue-grey darken-4" data-position="top" data-tooltip="Edit Data"><i class="material-icons">edit</i></a>

                        <a href="<?php echo base_url('kerjaan/delete/' . $row->id_pekerjaan); ?>" class="btn-floating halfway-fab waves-effect waves-light blue-grey darken-4" data-position="top" data-tooltip="Delete Data"><i class="material-icons">delete</i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td class="center-align" colspan="7">Belum ada data Pekerjaan</td>
                  </tr>
                <?php endif; ?>
              </tbody>
          </table>
          <div class="center-align">
            <?php echo $this->pagination->create_links(); ?>
          </div>
            </div>
