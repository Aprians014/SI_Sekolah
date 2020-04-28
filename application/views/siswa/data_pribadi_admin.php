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
                    <table class=" table-responsive table-sm">
                      <tbody>
                        <tr>
                          <td>No.Induk Siswa</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->nis; ?></td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->nm_siswa; ?></td>
                        </tr>
                        <tr>
                          <td>Tempat Lahir</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->tmpt_lhr_siswa; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Lahir</td>
                          <td>:</td>
                          <td><?php $ubah=$tb_siswa->tgl_lhr_siswa; echo date("d M Y", strtotime($ubah)) ?></td>
                        </tr>
                        <tr>
                          <td>Agama</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->agm_siswa; ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->jk_siswa; ?></td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->almt_siswa; ?></td>
                        </tr>
                        <tr>
                          <td>Telepon</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->tlp_siswa; ?></td>
                        </tr>
                        <tr>
                          <td>Asal Sekolah</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->asal_sekolah; ?></td>
                        </tr>
                        <tr>
                          <td>Nama Wali</td>
                          <td>:</td>
                          <td><?php echo $tb_siswa->nm_wali; ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <p><a class="mt-2 ml-1"  href="" data-toggle="modal" data-target="#EditDataPribadiSiswaAdmin<?php echo $tb_siswa->nis; ?>">Edit Data</a>
                <a class="mt-2 ml-1" href="<?php echo base_url('page/dataSiswa'); ?>">Kembali</a></p>
              </div>
            </div>
          </div>
          
          </div>
         
          
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Modal EDIT Data Pribadi SISWA -->
<div class="modal fade" id="EditDataPribadiSiswaAdmin<?php echo $tb_siswa->nis; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url('page/editDataPribadiSiswaAdmin'); ?>" method="post" >
        <div class="modal-body">

          <input type="hidden" name="nis" class="form-control" required value="<?php echo $tb_siswa->nis; ?>">

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group row">
                <label for="nm_siswa" class="form-control-label col-sm-3">Nama</label>
                
                <div class="col-sm-9">
                    <input type="text" name="nm_siswa" class="form-control" placeholder="Masukkan Nama..." required value="<?php echo $tb_siswa->nm_siswa; ?>">
                </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tmpt_lhr_siswa" class="form-control-label col-lg-4">Tempat Lahir</label>

                  <div class="col-lg-8">
                      <input type="text" name="tmpt_lhr_siswa" class="form-control" placeholder="Masukkan Tempat Lahir..." required value="<?php echo $tb_siswa->tmpt_lhr_siswa; ?>">
                  </div>
              </div>
            </div>
          </div>
            
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group row">
                  <label for="tgl_lhr_siswa" class="form-control-label col-lg-4">Tanggal Lahir</label>
                  
                  <div class="col-lg-8">
                      <input type="date" name="tgl_lhr_siswa" class="form-control" placeholder="Tanggal Lahir..." required value="<?php echo $tb_siswa->tgl_lhr_siswa; ?>">
                  </div>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group row">
                  <label for="agm_siswa" class="form-control-label col-lg-3">Agama</label>
                  
                  <div class="col-lg-9">
                      <input type="text" name="agm_siswa" class="form-control" placeholder="Agama..." required value="<?php echo $tb_siswa->agm_siswa; ?>">
                  </div>
              </div>
            </div>
          </div>

            <div class="form-group row">
                <label for="jk_siswa" class="form-control-label col-lg-3">Jenis Kelamin</label>
                
                <div class="col-lg-9">
                   <select name="jk_siswa" class="form-control">
                       
                       <option value="">--Pilih--</option>
                       <option value="Laki-laki" <?php if ($tb_siswa->jk_siswa=='Laki-laki') {
                         echo "selected";
                       } ?>>Laki-laki</option>
                       <option value="Perempuan" <?php if ($tb_siswa->jk_siswa=='Perempuan') {
                         echo "selected";
                       } ?>>Perempuan</option>
                       
                   </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="almt_siswa" class="form-control-label col-lg-3">Alamat</label>
                
                <div class="col-lg-9">
                    <input type="text" name="almt_siswa" class="form-control" placeholder="Alamat..." required value="<?php echo $tb_siswa->almt_siswa; ?>">
                </div>
            </div>

            <input type="hidden" name="pass_siswa" class="form-control" required value="<?php echo $tb_siswa->pass_siswa; ?>">

            <div class="form-group row">
                <label for="tlp_siswa" class="form-control-label col-lg-3">Telepon</label>
                
                <div class="col-lg-9">
                    <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon..." required value="<?php echo $tb_siswa->tlp_siswa; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="asal_sekolah" class="form-control-label col-lg-3">Asal Sekolah</label>
                
                <div class="col-lg-9">
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah..." required value="<?php echo $tb_siswa->asal_sekolah; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_wali" class="form-control-label col-lg-3">Nama Wali</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_wali" class="form-control" placeholder="Nama Wali..." required value="<?php echo $tb_siswa->nm_wali; ?>">
                </div>
            </div>

            <input type="hidden" name="level" class="form-control" placeholder="Level..." required value="<?php echo $tb_siswa->level; ?>">

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