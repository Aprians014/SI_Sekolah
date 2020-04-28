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
                        <td>No.Induk Karyawan</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['nik']; ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['gelar_depan']; ?> <?php echo $tb_guru['nm_guru'];?><?php echo $tb_guru['gelar_belakang']; ?></td>
                      </tr>
                      <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['tmpt_lhr_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['tgl_lhr_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['agm_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['jk_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Telepon</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['tlp_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['email_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['almt_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['pend_guru']; ?></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['status_kawin']; ?></td>
                      </tr>
                      <tr>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td><?php echo $tb_guru['jab']; ?></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                </div>
                <p><a class="mt-2 ml-1"  href="" data-toggle="modal" data-target="#EditDataPribadiGuru<?php echo $tb_guru['nik']; ?>">Edit Data</a></p>
              </div>
            </div>
          </div>
          
          </div>
         
          
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


<!-- Modal EDIT DATA PRIBADI GURU -->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="EditDataPribadiGuru<?php echo $i->nik; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url('page/editDataPribadiGuru') ?>" method="post" >
        <div class="modal-body">
           <!--  <div class="form-group row">
                <label for="nik" class="form-control-label col-lg-3">NIK</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="nik" class="form-control" placeholder="Masukan NIK..." required value="<?php echo $i->nik; ?>">
                <!-- </div>
            </div> -->

            <div class="form-group row">
                <label for="nm_guru" class="form-control-label col-lg-3">Nama</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_guru" class="form-control" placeholder="Masukkan Nama..." required value="<?php echo $i->nm_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tmpt_lhr_guru" class="form-control-label col-lg-3">Tempat Lahir</label>

                <div class="col-lg-9">
                    <input type="text" name="tmpt_lhr_guru" class="form-control" placeholder="Masukkan Tempat Lahir..." required value="<?php echo $i->tmpt_lhr_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_lhr_guru" class="form-control-label col-lg-3">Tanggal Lahir</label>
                
                <div class="col-lg-9">
                    <input type="date" name="tgl_lhr_guru" class="form-control" placeholder="Tanggal Lahir..." required value="<?php echo $i->tgl_lhr_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="agm_guru" class="form-control-label col-lg-3">Agama</label>
                
                <div class="col-lg-9">
                    <input type="text" name="agm_guru" class="form-control" placeholder="Agama..." required value="<?php echo $i->agm_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="jk_guru" class="form-control-label col-lg-3">Jenis Kelamin</label>
                
                <div class="col-lg-9">
                   <select name="jk_guru" class="form-control">
                       <?php 
                       if ($i->jk_guru==''): 
                        ?>
                      <option value="" selected>--Pilih--</option>
                       <option value="Laki-laki">Laki-laki</option>
                       <option value="Perempuan">Perempuan</option>
                       <?php 
                       elseif ($i->jk_guru=='Laki-laki'): 
                        ?>
                      <option value="">--Pilih--</option>
                       <option value="Laki-laki" selected>Laki-laki</option>
                       <option value="Perempuan">Perempuan</option>
                       <?php
                        else: 
                        ?>
                       <option value="">--Pilih--</option>
                       <option value="Laki-laki">Laki-laki</option>
                       <option value="Perempuan" selected>Perempuan</option>
                   <?php endif; ?>
                   </select>
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="pass_guru" class="form-control-label col-lg-3">Password</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="pass_guru" class="form-control" placeholder="Password..." required value="<?php echo $i->pass_guru; ?>">
                <!-- </div>
            </div> -->

            <div class="form-group row">
                <label for="tlp_guru" class="form-control-label col-lg-3">Telepon</label>
                
                <div class="col-lg-9">
                    <input type="text" name="tlp_guru" class="form-control" placeholder="Telepon..." required value="<?php echo $i->tlp_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="email_guru" class="form-control-label col-lg-3">Email</label>
                
                <div class="col-lg-9">
                    <input type="email" name="email_guru" class="form-control" placeholder="Email..." required value="<?php echo $i->email_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="almt_guru" class="form-control-label col-lg-3">Alamat</label>
                
                <div class="col-lg-9">
                    <input type="text" name="almt_guru" class="form-control" placeholder="Alamat..." required value="<?php echo $i->almt_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="pend_guru" class="form-control-label col-lg-3">Pendidikan</label>
                
                <div class="col-lg-9">
                    <input type="text" name="pend_guru" class="form-control" placeholder="Pendidikan..." required value="<?php echo $i->pend_guru; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="status_kawin" class="form-control-label col-lg-3">Status</label>
                
                <div class="col-lg-9">
                    <input type="text" name="status_kawin" class="form-control" placeholder="Status..." required value="<?php echo $i->status_kawin; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="jab" class="form-control-label col-lg-3">Jabatan</label>
                
                <div class="col-lg-9">
                    <input type="text" name="jab" class="form-control" placeholder="Jabatan..." required value="<?php echo $i->jab; ?>">
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="level" class="form-control-label col-lg-3">Level</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="level" class="form-control" placeholder="Level..." required value="<?php echo $i->level; ?>">
                <!-- </div>
            </div> -->
            
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
  <!-- END MODAL EDIT DATA PRIBADI GURU -->