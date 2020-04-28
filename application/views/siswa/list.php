       <!-- Begin Page Content -->
        <div class="container-fluid">
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
            </div>
            <div class="card-body">
              <p><button type="" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#NewSiswa"><i class="fas fa-plus"></i> Tambah Data Siswa</button></p>
              <?php echo $this->session->flashdata('msg'); ?>
              <div class="table-responsive">
                <table class="table table-striped table-responsive table-bordered table-hover table-sm" id="data">
                  <thead>
                    <tr class="text-center">
                      <th width="5%">No</th>
                      <th width="10%">NIS</th>
                      <th>Nama</th>
                      <th width="20%">Tempat Tanggal Lahir</th>
                      <th width="15%">Jenis Kelamin</th>
                      <th width="5%">Level</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $no=1; ?>
                      <?PHP foreach($data as $i) { ?>
                        <tr>
                            <th><?php echo $no; ?></th>
                            <td><?php echo $i->nis; ?></td>
                            <td><?php echo $i->nm_siswa; ?></td>
                            <td><?php echo $i->tmpt_lhr_siswa; ?>, <?php echo date('d-m-Y',strtotime($i->tgl_lhr_siswa)); ?></td>
                            <td><?php echo $i->jk_siswa; ?></td>
                            <td><?php echo $i->level; ?></td>
                            <td>
                            <a class="btn btn-outline-info btn-sm mb-1" href="<?php echo base_url('page/detailSiswa/'.$i->nis) ?>" ><i class="fas fa-laptop"></i> Detail</a>
                            <button type="" class="btn btn-outline-primary btn-sm mb-1" data-toggle="modal" data-target="#EditSiswa<?php echo $i->nis; ?>"><i class="fas fa-edit"></i> Edit</button>
                            <button type="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#DeleteSiswa<?php echo $i->nis; ?>"><i class="fas fa-trash"></i> Hapus</button>
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

<!-- Modal EDIT SISWA -->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="EditSiswa<?php echo $i->nis; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url('page/editSiswa'); ?>" method="post" >
        <div class="modal-body">
            <div class="form-group row">
                <label for="nis" class="form-control-label col-lg-3">NIS</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nis" class="form-control" placeholder="Masukan NIS..." required value="<?php echo $i->nis; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_siswa" class="form-control-label col-lg-3">Nama</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_siswa" class="form-control" placeholder="Masukkan Nama..." required value="<?php echo $i->nm_siswa; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tmpt_lhr_siswa" class="form-control-label col-lg-3">Tempat Lahir</label>

                <div class="col-lg-9">
                    <input type="text" name="tmpt_lhr_siswa" class="form-control" placeholder="Masukkan Tempat Lahir..." required value="<?php echo $i->tmpt_lhr_siswa; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_lhr_siswa" class="form-control-label col-lg-3">Tanggal Lahir</label>
                
                <div class="col-lg-9">
                    <input type="date" name="tgl_lhr_siswa" class="form-control" placeholder="Tanggal Lahir..." required value="<?php echo $i->tgl_lhr_siswa; ?>">
                </div>
            </div>


            <div class="form-group row">
                <label for="agm_siswa" class="form-control-label col-lg-3">Agama</label>
                
                <div class="col-lg-9">
                    <input type="text" name="agm_siswa" class="form-control" placeholder="Agama..." required value="<?php echo $i->agm_siswa; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="jk_siswa" class="form-control-label col-lg-3">Jenis Kelamin</label>
                
                <div class="col-lg-9">
                   <select name="jk_siswa" class="form-control">
                       <?php 
                       if ($i->jk_siswa==''): 
                        ?>
                       <option value="" selected>--Pilih--</option>
                       <option value="Laki-laki">Laki-laki</option>
                       <option value="Perempuan">Perempuan</option>
                       <?php
                        elseif ($i->jk_siswa=='Laki-laki'): 
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

            <div class="form-group row">
                <label for="almt_siswa" class="form-control-label col-lg-3">Alamat</label>
                
                <div class="col-lg-9">
                    <input type="text" name="almt_siswa" class="form-control" placeholder="Alamat..." required value="<?php echo $i->almt_siswa; ?>">
                </div>
            </div>

            <input type="hidden" name="pass_siswa" class="form-control" required value="<?php echo $i->pass_siswa; ?>">

            <div class="form-group row">
                <label for="tlp_siswa" class="form-control-label col-lg-3">Telepon</label>
                
                <div class="col-lg-9">
                    <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon..." required value="<?php echo $i->tlp_siswa; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="asal_sekolah" class="form-control-label col-lg-3">Asal Sekolah</label>
                
                <div class="col-lg-9">
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah..." required value="<?php echo $i->asal_sekolah; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_wali" class="form-control-label col-lg-3">Nama Wali</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_wali" class="form-control" placeholder="Alamat..." required value="<?php echo $i->nm_wali; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="form-control-label col-lg-3">Level</label>
                
                <div class="col-lg-9">
                    <input type="text" name="level" class="form-control" placeholder="Level..." required value="<?php echo $i->level; ?>">
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
  <!-- END MODAL EDIT SISWA -->

<!-- Modal ADD SISWA -->
<div class="modal fade" id="NewSiswa" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form action="<?php echo base_url('page/addSiswa') ?>" method="post" >
          <div class="modal-body">
            
              <div class="form-group row">
                <label for="nis" class="form-control-label col-lg-3">NIS</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nis" class="form-control" placeholder="Masukan NIS..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_siswa" class="form-control-label col-lg-3">Nama</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_siswa" class="form-control" placeholder="Masukkan Nama..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="tmpt_lhr_siswa" class="form-control-label col-lg-3">Tempat Lahir</label>

                <div class="col-lg-9">
                    <input type="text" name="tmpt_lhr_siswa" class="form-control" placeholder="Masukkan Tempat Lahir..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl_lhr_siswa" class="form-control-label col-lg-3">Tanggal Lahir</label>
                
                <div class="col-lg-9">
                    <input type="date" name="tgl_lhr_siswa" class="form-control" placeholder="Tanggal Lahir..." required>
                </div>
            </div>


            <div class="form-group row">
                <label for="agm_siswa" class="form-control-label col-lg-3">Agama</label>
                
                <div class="col-lg-9">
                    <input type="text" name="agm_siswa" class="form-control" placeholder="Agama..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="jk_siswa" class="form-control-label col-lg-3">Jenis Kelamin</label>
                
                <div class="col-lg-9">
                   <select name="jk_siswa" class="form-control">
                      
                       <option value="">--Pilih--</option>
                       <option value="Laki-laki">Laki-laki</option>
                       <option value="Perempuan">Perempuan</option>
                       
                   </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="almt_siswa" class="form-control-label col-lg-3">Alamat</label>
                
                <div class="col-lg-9">
                    <input type="text" name="almt_siswa" class="form-control" placeholder="Alamat..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="pass_siswa" class="form-control-label col-lg-3">Password</label>
                
                <div class="col-lg-9">
                    <input type="password" name="pass_siswa" id="pass_siswa" class="form-control" placeholder="Password..." required>
                    
                </div>
            </div>

            <div class="form-group row">
                <label for="tlp_siswa" class="form-control-label col-lg-3">Telepon</label>
                
                <div class="col-lg-9">
                    <input type="text" name="tlp_siswa" class="form-control" placeholder="Telepon..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="asal_sekolah" class="form-control-label col-lg-3">Asal Sekolah</label>
                
                <div class="col-lg-9">
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_wali" class="form-control-label col-lg-3">Nama Wali</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_wali" class="form-control" placeholder="Alamat..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="level" class="form-control-label col-lg-3">Level</label>
                
                <div class="col-lg-9">
                    <input type="text" name="level" class="form-control" placeholder="Level..." required>
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
  <!-- END MODAL ADD SISWA -->

  <!-- Delete Confirmation-->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="DeleteSiswa<?php echo $i->nis; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('page/hapusSiswa') ?>" method="post">
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <input type="hidden" name="nis" value="<?php echo $i->nis;?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Delete Confirmation -->