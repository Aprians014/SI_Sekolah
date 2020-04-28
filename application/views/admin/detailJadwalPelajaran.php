         <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm">
                 <div class="card shadow">
                    <div class="card-header text-dark">
                    <?php echo $title; ?>
                    </div>
                 <div class="card-body">
                    <div class="row">
                    <div class="col-sm">
                      <table class="table-responsive table-sm">
                      <tbody>
                        <tr>
                          <td>Id Jadwal</td>
                          <td>:</td>
                          <td><?php echo $jadwal->id_jadwal; ?></td>
                        </tr>
                        <tr>
                          <td>Kode Kelas</td>
                          <td>:</td>
                          <td><?php echo $jadwal->kd_kelas; ?></td>
                        </tr>
                        <tr>
                          <td>Kelas</td>
                          <td>:</td>
                          <td><?php echo $jadwal->kelas; ?></td>
                        </tr>
                        <tr>
                          <td>Kode Pelajaran</td>
                          <td>:</td>
                          <td><?php echo $jadwal->kd_pel; ?></td>
                        </tr>
                        <tr>
                          <td>Mata Pelajaran</td>
                          <td>:</td>
                          <td><?php echo $jadwal->nm_pel; ?></td>
                        </tr>
                        <tr>
                          <td>NIK</td>
                          <td>:</td>
                          <td><?php echo $jadwal->nik; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Guru</td>
                          <td>:</td>
                          <td><?php echo $jadwal->nm_guru; ?></td>
                        </tr>
                        <tr>
                          <td>Jam Masuk</td>
                          <td>:</td>
                          <td><?php echo $jadwal->jam_masuk; ?></td>
                        </tr>
                        <tr>
                          <td>Hari Masuk</td>
                          <td>:</td>
                          <td><?php echo $jadwal->hari_masuk; ?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <p><a class="mt-2 ml-1"  href="" data-toggle="modal" data-target="#EditDataPribadiSiswaAdmin<?php echo $jadwal->nik; ?>">Edit Data</a>
                  <a class="mt-2 ml-1" href="<?php echo base_url('page/dataGuru'); ?>">Kembali</a></p>
                </div>
              </div>
            </div>
            
            </div>
           
            
            

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Modal EDIT Data Pribadi SISWA -->
  <div class="modal fade" id="EditDataPribadiSiswaAdmin<?php echo $jadwal->nik; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <form action="<?php echo base_url('page/editDataPribadiGuruAdmin'); ?>" method="post" >
          <div class="modal-body">

            <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                              <label for="nik" class="form-control-label">NIK*</label>
                                <input type="text" name="nik" class="form-control" autocomplete="off" placeholder="NIK" value="<?php echo $jadwal->nik; ?>" required>
                          </div>
                        </div>
                        
                        <div class="col-md-7">
                          <div class="form-group">
                              <label for="nm_guru" class="form-control-label">Nama*</label>
                                <input type="text" name="nm_guru" class="form-control" autocomplete="off" placeholder="Nama" value="<?php echo $jadwal->nm_guru; ?>" required>
                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="gelar_depan" class="form-control-label">Gelar Depan*</label>
                              <input type="text" name="gelar_depan" class="form-control" autocomplete="off" placeholder="Gelar Depan" value="<?php echo $jadwal->gelar_depan; ?>" >
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="gelar_belakang" class="form-control-label">Gelar Belakang*</label>
                                <input type="text" name="gelar_belakang" class="form-control" autocomplete="off" value="<?php echo $jadwal->gelar_belakang; ?>" placeholder="Gelar Belakang">
                          </div>
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="tmpt_lhr_guru" class="form-control-label">Tempat Lahir*</label>
                              <input type="text" name="tmpt_lhr_guru" class="form-control" autocomplete="off" placeholder="Tempat Lahir" value="<?php echo $jadwal->tmpt_lhr_guru; ?>" required>
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="tgl_lhr_guru" class="form-control-label">Tanggal Lahir*</label>
                                <input type="date" name="tgl_lhr_guru" class="form-control" value="<?php echo $jadwal->tgl_lhr_guru; ?>" required>
                          </div>
                        </div>
                      </div>
                          
                      <div class="row">
                        <!-- <div class="col-md-4">
                          <div class="form-group">
                              <label for="pass_guru" class="form-control-label">Password*</label> -->
                                <input type="hidden" name="pass_guru" class="form-control" placeholder="Password..." value="<?php echo $jadwal->pass_guru; ?>" required>
                         <!--  </div>
                        </div> -->
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="agm_guru" class="form-control-label">Agama*</label>
                                <input type="text" name="agm_guru" class="form-control" autocomplete="off" placeholder="Agama..." value="<?php echo $jadwal->agm_guru; ?>" required>
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="jk_guru" class="form-control-label">Jenis Kelamin*</label>
                                 <select name="jk_guru" class="form-control" required>
                                     <option value="">--Pilih--</option>
                                     <option value="Laki-laki" <?php if ($jadwal->jk_guru=='Laki-laki') {
                                       echo "selected";
                                     } ?>>Laki-laki</option>
                                     <option value="Perempuan" <?php if ($jadwal->jk_guru=='Perempuan') {
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
                              
                                <input type="text" name="tlp_guru" class="form-control" autocomplete="off" placeholder="Telepon..." value="<?php echo $jadwal->tlp_guru; ?>" required>
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="email_guru" class="form-control-label">Email*</label>
                              
                                <input type="email" name="email_guru" class="form-control" autocomplete="off" placeholder="Email..." value="<?php echo $jadwal->email_guru; ?>" required>
                          </div>
                        </div>

                      </div>
                
                      <div class="row">

                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="almt_guru" class="form-control-label">Alamat*</label>
                                <textarea name="almt_guru" class="form-control" autocomplete="off" placeholder="Alamat" required><?php echo $jadwal->almt_guru; ?></textarea>
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="pend_guru" class="form-control-label">Pendidikan*</label>
                              
                                <input type="text" name="pend_guru" class="form-control" autocomplete="off" placeholder="Pendidikan" value="<?php echo $jadwal->pend_guru; ?>" required>
                          </div>
                        </div>
                          
                      </div>
                
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="status_kawin" class="form-control-label">Status*</label>
                              
                                <input type="text" name="status_kawin" class="form-control" autocomplete="off" placeholder="Status..." value="<?php echo $jadwal->status_kawin; ?>" required>
                          </div>
                        </div>
                          
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="jab" class="form-control-label">Jabatan</label>
                              
                                <input type="text" name="jab" class="form-control" autocomplete="off" placeholder="Jabatan..." value="<?php echo $jadwal->jab; ?>" required>
                          </div>
                        </div>
                          
                         <!-- <div class="col-md-4">
                          <div class="form-group">
                              <label for="level" class="form-control-label">Level</label> -->
                              
                                <input type="hidden" name="level" class="form-control" value="<?php echo $jadwal->level; ?>">
                                
                          <!-- </div>
                        </div> -->
                          
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
    <!-- END MODAL EDIT Data Pribadi SISWA -->