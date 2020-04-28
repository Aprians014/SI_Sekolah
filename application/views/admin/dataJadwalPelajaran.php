<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
       <div class="card shadow">
          <div class="card-header text-dark">
          <?php echo $title; ?>
          </div>

       <div class="card-body">
        <p <?php if ($this->session->userdata('akses')=='3'): ?>
            hidden="true";
        <?php endif ?>><button type="" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#NewJadwal"><i class="fas fa-plus"></i> Tambah Pelajaran</button></p>
          <div class="row">
          <div class="col-sm">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered table-sm" id="data">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Kelas</th>
                  <th>Mata Pelajaran</th>
                  <th>Guru Pengampu</th>
                  <th>Jam Masuk</th>
                  <th>Hari</th>
                  <th width="15%" <?php if ($this->session->userdata('akses')=='3'): ?>
                    hidden="true";
                  <?php endif ?>>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $i) { ?>
                <tr>
                  <th><?php echo $no; ?></th>
                  <td><?php echo $i->kelas; ?></td>
                  <td><?php echo $i->nm_pel; ?></td>
                  <td><?php echo $i->nm_guru; ?></td>
                  <td><?php echo $i->jam_masuk; ?></td>
                  <td><?php echo $i->hari_masuk; ?></td>
                  <td <?php if ($this->session->userdata('akses')=='3'): ?>
                    hidden="true";
                  <?php endif ?>>
                    <a href="<?php echo base_url('page/detailJadwalPelajaran/'.$i->id_jadwal) ?>" class="text-info"><i class="fas fa-laptop"></i></a>
                    <a href="" class="text-primary" data-toggle="modal" data-target="#EditJadwal<?php echo $i->id_jadwal; ?>"><i class="fas fa-edit"></i></a>
                    <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteJadwal<?php echo $i->id_jadwal; ?>"><i class="fas fa-trash"></i></a></td>
                </tr>
                <?php $no++; ?>
              <?php } ?>
              </tbody>
            </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
  
  </div>
 
  
  

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal ADD JADWAL -->
<div class="modal fade" id="NewJadwal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <?php $this->session->flashdata('msg'); ?>
        </div>
            <form action="<?php echo base_url('page/addJadwalPelajaran'); ?>" method="post" >
                <div class="modal-body">
                    <!-- <div class="form-group row">
                        <label for="id_jadwal" class="form-control-label col-lg-3">Id Jadwal</label>
                        
                        <div class="col-lg-9">
                            <input type="text" name="id_jadwal" class="form-control" placeholder="Masukan Id..." required>
                        </div>
                    </div> -->

            <div class="form-group row">
                <label for="kd_kelas" class="bmd-label-floating col-lg-3">Kelas</label>
                
                <div class="col-lg-9">
                  <select name="kd_kelas" class="form-control">
                    <option value="">--Pilih--</option>}
                    option
                  <?php foreach ($kd_kelas as $i) { ?>
                    <option value="<?php echo $i->kd_kelas; ?>"><?php echo $i->kelas; ?></option>
                  <?php } ?>
                  </select>

                    <!-- <input type="text" name="kd_kelas" class="form-control" placeholder="Masukkan Kode Kelas..." required> -->
                </div>
            </div>

            <div class="form-group row">
                <label for="kd_pel" class="form-control-label col-lg-3">Mata Pelajaran</label>

                <div class="col-lg-9">
                  <select name="kd_pel" class="form-control">
                    <option value="">--Pilih--</option>
                    <?php foreach ($kd_pel as $i) { ?>
                    <option value="<?php echo $i->kd_pel; ?>"><?php echo $i->nm_pel; ?></option>
                  <?php } ?>
                  </select>
                    <!-- <input type="text" name="kd_pel" class="form-control" placeholder="Masukkan Kode Pelajaran..." required> -->
                </div>
            </div>

            <div class="form-group row">
                <label for="nik" class="form-control-label col-lg-3">Guru Pengampu</label>
                
                <div class="col-lg-9">
                  <select name="nik" class="form-control">
                    <option value="">--Pilih--</option>}
                    <?php foreach ($nik as $i) { ?>
                    <option value="<?php echo $i->nik; ?>"><?php echo $i->nm_guru; ?></option>
                    <?php } ?>
                  </select>
                    <!-- <input type="text" name="nik" class="form-control" placeholder="Masukan NIK..." required> -->
                </div>
            </div>


            <div class="form-group row">
                <label for="jam_masuk" class="form-control-label col-lg-3">Jam Masuk</label>
                
                <div class="col-lg-9">
                    <input type="time" name="jam_masuk" class="form-control" placeholder="Jam Masuk..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="hari_masuk" class="form-control-label col-lg-3">Hari Masuk</label>
                
                <div class="col-lg-9">
                    <input type="text" name="hari_masuk" class="form-control" placeholder="Masukkan Hari Masuk..." required>
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
  <!-- END MODAL ADD JADWAL -->

  <!-- Modal EDIT JADWAL -->
  <?php foreach ($data as $i) { ?>
  <div class="modal fade" id="EditJadwal<?php echo $i->id_jadwal; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
  
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <?php $this->session->flashdata('msg'); ?>
        </div>
            <form action="<?php echo base_url('page/editJadwalPelajaran'); ?>" method="post" >
                <div class="modal-body">

                <input type="hidden" name="id_jadwal" class="form-control" placeholder="Masukan Id..." value="<?php echo $i->id_jadwal; ?>" required>

            <div class="row">
              <div class="col-sm-6">
                <div class="form-group row">
                    <label for="kd_kelas" class="form-control-label col-lg-4">Kode Kelas</label>

                  <div class="col-lg-8">
                    <input type="text" name="kd_kelas" id="kd_kelas" class="form-control" placeholder="Masukkan Kode Kelas..." value="<?php echo $i->kd_kelas; ?>" required>
                  </div>

                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group row">
                    <label for="kelas" class="form-control-label col-lg-3">Kelas</label>

                  <div class="col-lg-9">
                    <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan Kelas..." value="<?php echo $i->kelas; ?>" readonly>
                  </div>

                  </div>

                </div>
              </div>
            
            <div class="form-group row">
                <label for="kd_pel" class="form-control-label col-lg-3">Kode Pelajaran</label>
                
              <div class="col-lg-9">                
                <input type="text" name="kd_pel" id="kd_pel" class="form-control" placeholder="Masukkan Kode Pelajaran..." value="<?php echo $i->kd_pel; ?>" required>
              </div>

            </div>
            
            <div class="form-group row">
                <label for="nik" class="form-control-label col-lg-3">NIK</label>
                
              <div class="col-lg-9"> 
                <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK..." value="<?php echo $i->nik; ?>" required>
              </div>

            </div>
               
            <div class="form-group row">
                <label for="jam_masuk" class="form-control-label col-lg-3">Jam Masuk</label>
                
                <div class="col-lg-9">
                    <input type="time" name="jam_masuk" class="form-control" placeholder="Jam Masuk..." value="<?php echo $i->jam_masuk; ?>" required>
                </div>
            </div>


            <div class="form-group row">
                <label for="hari_masuk" class="form-control-label col-lg-3">Hari Masuk</label>
                
                <div class="col-lg-9">
                    <input type="text" name="hari_masuk" class="form-control" placeholder="Masukkan Hari Masuk..." value="<?php echo $i->hari_masuk; ?>" required>
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
  <?php } ?>
  <!-- END MODAL EDIT JADWAL -->

  <!-- Delete Confirmation-->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="DeleteJadwal<?php echo $i->id_jadwal; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('page/hapusJadwal') ?>" method="post">
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <input type="hidden" name="id_jadwal" value="<?php echo $i->id_jadwal; ?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Delete Confirmation -->

