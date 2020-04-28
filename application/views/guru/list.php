         <!-- Begin Page Content -->
          <div class="container-fluid">
            
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
              </div>
              <div class="card-body">
                <p><button type="" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#NewGuru"><i class="fas fa-plus"></i> Tambah Data Guru</button></p>
                <?php echo $this->session->flashdata('msg'); ?>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover table-sm" cellspacing="0"  id="data" >
                    <thead>
                      <tr class="text-sm-left">
                        <th class="text-center">No</th>
                        <th>Nama</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Pendidikan</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php $no=1; ?>
                        <?PHP foreach($data as $i) { ?>
                          <tr>
                              <th class="text-center"><?php echo $no; ?></th>
                              <td><?php echo $i->gelar_depan; ?> <?php echo $i->nm_guru; ?><?php echo $i->gelar_belakang ?></td>
                              <td><?php echo $i->tmpt_lhr_guru; ?>, <?php echo date('d-m-Y', strtotime($i->tgl_lhr_guru)); ?></td>
                              <td><?php echo $i->jk_guru; ?></td>
                              <td><?php echo $i->pend_guru; ?></td>
                              <td><?php echo $i->jab; ?></td>
                              <td>
                                <a href="<?php echo base_url('page/detailGuru/'.$i->nik) ?>" class="text-warning mr-1"><i class="fas fa-laptop"></i></a>
                                <a href="" class="text-primary mr-1" data-toggle="modal" data-target="#EditGuru<?php echo $i->nik; ?>"><i class="fas fa-edit"></i></a>
                                <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteGuru<?php echo $i->nik; ?>"><i class="fas fa-trash"></i></a>
                              </td>
                          </tr>
                          <?php $no++; ?>
                          <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

  <!-- Modal EDIT GURU -->
  <?php foreach ($data as $i): ?>
  <div class="modal fade" id="EditGuru<?php echo $i->nik; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url('page/editGuru') ?>" method="post" >
          <div class="modal-body">
              <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label for="nik" class="form-control-label">NIK*</label>
                              <input type="text" name="nik" class="form-control" autocomplete="off" placeholder="NIK" value="<?php echo $i->nik; ?>" required>
                        </div>
                      </div>
                      
                      <div class="col-md-7">
                        <div class="form-group">
                            <label for="nm_guru" class="form-control-label">Nama*</label>
                              <input type="text" name="nm_guru" class="form-control" autocomplete="off" placeholder="Nama" value="<?php echo $i->nm_guru; ?>" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="gelar_depan" class="form-control-label">Gelar Depan*</label>
                            <input type="text" name="gelar_depan" class="form-control" autocomplete="off" placeholder="Gelar Depan" value="<?php echo $i->gelar_depan; ?>">
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="gelar_belakang" class="form-control-label">Gelar Belakang*</label>
                              <input type="text" name="gelar_belakang" class="form-control" autocomplete="off" placeholder="Gelar Belakang" value="<?php echo $i->gelar_belakang; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tmpt_lhr_guru" class="form-control-label">Tempat Lahir*</label>
                            <input type="text" name="tmpt_lhr_guru" class="form-control" autocomplete="off" placeholder="Tempat Lahir" value="<?php echo $i->tmpt_lhr_guru; ?>" required>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lhr_guru" class="bmd-label-floating">Tanggal Lahir*</label>
                              <input type="date" name="tgl_lhr_guru" class="form-control" value="<?php echo $i->tgl_lhr_guru; ?>" required>
                        </div>
                      </div>
                    </div>
                        
                    <div class="row">
                      <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label for="pass_guru" class="form-control-label">Password*</label> -->
                              <input type="hidden" name="pass_guru" class="form-control" placeholder="Password..." value="<?php echo $i->pass_guru ?>" required>
                        <!-- </div>
                      </div> -->
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="agm_guru" class="form-control-label">Agama*</label>
                              <input type="text" name="agm_guru" class="form-control" autocomplete="off" placeholder="Agama..." value="<?php echo $i->agm_guru; ?>" required>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="jk_guru" class="form-control-label">Jenis Kelamin*</label>
                               <select name="jk_guru" class="form-control" required>
                                   <option value="">--Pilih--</option>
                                   <option value="Laki-laki" <?php if ($i->jk_guru=='Laki-laki') {
                                     echo "selected";
                                   } ?>>Laki-laki</option>
                                   <option value="Perempuan" <?php if ($i->jk_guru=='Perempuan') {
                                     echo "selected";
                                   } ?>>Perempuan</option>
                               </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="tlp_guru" class="form-control-label">Telepon*</label>
                            
                              <input type="text" name="tlp_guru" class="form-control" autocomplete="off" placeholder="Telepon..." value="<?php echo $i->tlp_guru; ?>" required>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_guru" class="form-control-label">Email*</label>
                            
                              <input type="email" name="email_guru" class="form-control" autocomplete="off" placeholder="Email..." value="<?php echo $i->email_guru; ?>" required>
                        </div>
                      </div>

                    </div>
              
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="almt_guru" class="form-control-label">Alamat*</label>
                              <textarea name="almt_guru" class="form-control" autocomplete="off" placeholder="Alamat" required><?php echo $i->almt_guru; ?></textarea>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="pend_guru" class="form-control-label">Pendidikan*</label>
                            
                              <input type="text" name="pend_guru" class="form-control" autocomplete="off" placeholder="Pendidikan" value="<?php echo $i->pend_guru; ?>" required>
                        </div>
                      </div>
                        
                    </div>
              
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="status_kawin" class="form-control-label">Status*</label>
                            
                              <input type="text" name="status_kawin" class="form-control" autocomplete="off" placeholder="Status..." value="<?php echo $i->status_kawin; ?>" required>
                        </div>
                      </div>
                        
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="jab" class="form-control-label">Jabatan*</label>
                            
                              <input type="text" name="jab" class="form-control" autocomplete="off" placeholder="Jabatan..." value="<?php echo $i->jab; ?>" required>
                        </div>
                      </div>
                        
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="level" class="form-control-label">Level</label>
                            
                              <select name="level" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="1" <?php if ($i->level=='1') {
                                  echo "selected";
                                } ?>>Admin</option>
                                <option value="2" <?php if ($i->level=='2') {
                                  echo "selected";
                                } ?>>Guru</option>
                                <option value="3"<?php if ($i->level=='3') {
                                  echo "selected";
                                } ?>>Siswa</option>
                              </select>
                        </div>
                      </div>
                        
                    </div>
              
              
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-info">Update</button>
          </div>
      </div>
          </form>
          

        </div>
      </div>
    </div>
  <?php endforeach; ?>
    <!-- END MODAL EDIT GURU -->


  <!-- Modal ADD GURU -->
  <div class="modal fade" id="NewGuru" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Guru</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
              <form action="<?php echo base_url('page/addGuru'); ?>" method="post" >
                  <div class="modal-body">
                    <?php $this->session->flashdata('msg') ?>
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                            <label for="nik" class="form-control-label">NIK*</label>
                              <input type="text" name="nik" class="form-control" autocomplete="off" placeholder="NIK" required>
                        </div>
                      </div>
                      
                      <div class="col-md-7">
                        <div class="form-group">
                            <label for="nm_guru" class="form-control-label">Nama*</label>
                              <input type="text" name="nm_guru" class="form-control" autocomplete="off" placeholder="Nama" required>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="gelar_depan" class="form-control-label">Gelar Depan*</label>
                            <input type="text" name="gelar_depan" class="form-control" autocomplete="off" placeholder="Gelar Depan">
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="gelar_belakang" class="form-control-label">Gelar Belakang*</label>
                              <input type="text" name="gelar_belakang" class="form-control" autocomplete="off" placeholder="Gelar Belakang">
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="tmpt_lhr_guru" class="form-control-label">Tempat Lahir*</label>
                            <input type="text" name="tmpt_lhr_guru" class="form-control" autocomplete="off" placeholder="Tempat Lahir" required>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="tgl_lhr_guru" class="bmd-label-floating">Tanggal Lahir*</label>
                              <input type="date" name="tgl_lhr_guru" class="form-control" required>
                        </div>
                      </div>
                    </div>
                        
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="pass_guru" class="form-control-label">Password*</label>
                              <input type="password" name="pass_guru" class="form-control" placeholder="Password..." required>
                        </div>
                      </div>
                        
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="agm_guru" class="form-control-label">Agama*</label>
                              <input type="text" name="agm_guru" class="form-control" autocomplete="off" placeholder="Agama..." required>
                        </div>
                      </div>
                        
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="jk_guru" class="form-control-label">Jenis Kelamin*</label>
                               <select name="jk_guru" class="form-control" required>
                                   <option value="">--Pilih--</option>
                                   <option value="Laki-laki">Laki-laki</option>
                                   <option value="Perempuan">Perempuan</option>
                               </select>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="tlp_guru" class="form-control-label">Telepon*</label>
                            
                              <input type="text" name="tlp_guru" class="form-control" autocomplete="off" placeholder="Telepon..." required>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="email_guru" class="form-control-label">Email*</label>
                            
                              <input type="email" name="email_guru" class="form-control" autocomplete="off" placeholder="Email..." required>
                        </div>
                      </div>

                    </div>
              
                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="almt_guru" class="form-control-label">Alamat*</label>
                              <textarea name="almt_guru" class="form-control" autocomplete="off" placeholder="Alamat" required></textarea>
                        </div>
                      </div>
                        
                      <div class="col-md-6">
                        <div class="form-group">
                            <label for="pend_guru" class="form-control-label">Pendidikan*</label>
                            
                              <input type="text" name="pend_guru" class="form-control" autocomplete="off" placeholder="Pendidikan" required>
                        </div>
                      </div>
                        
                    </div>
              
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="status_kawin" class="form-control-label">Status*</label>
                            
                              <input type="text" name="status_kawin" class="form-control" autocomplete="off" placeholder="Status..." required>
                        </div>
                      </div>
                        
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="jab" class="form-control-label">Jabatan</label>
                            
                              <input type="text" name="jab" class="form-control" autocomplete="off" placeholder="Jabatan..." required>
                        </div>
                      </div>
                        
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="level" class="form-control-label">Level</label>
                            
                              <select name="level" class="form-control">
                                <option value="">--Pilih--</option>
                                <option value="1">Admin</option>
                                <option value="2">Guru</option>
                                <option value="3">Siswa</option>
                              </select>
                        </div>
                      </div>
                        
                    </div>
              
              
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-info">Simpan</button>
          </div>
      </div>
          </form>
          

        </div>
      </div>
    </div>
    <!-- END MODAL ADD GURU -->

    <!-- Delete Confirmation-->
  <?php foreach ($data as $i): ?>
  <div class="modal fade" id="DeleteGuru<?php echo $i->nik; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url('page/hapusGuru') ?>" method="post">
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
        <div class="modal-footer">
          <input type="hidden" name="nip" value="<?php echo $i->nik;?>">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-danger">Delete</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php endforeach; ?>