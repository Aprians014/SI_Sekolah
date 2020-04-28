<!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-8">
               <div class="card shadow">
                  <div class="card-header text-dark">
                  <?php echo $title; ?>
                  </div>
               <div class="card-body">
                <p><button type="" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#NewPelajaran"><i class="fas fa-plus"></i> Tambah Pelajaran</button></p>
                <?php echo $this->session->flashdata('msg'); ?>
                  <div class="row">
                  <div class="col-sm">
                    <table class="table table-striped table-hover table-bordered table-sm" id="data">
                      <thead>
                        <tr>
                          <th width="5%">No</th>
                          <th width="20%">Nama Pelajaran</th>
                          <th width="10%">Kkm</th>
                          <th width="15%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $no=1; ?>
                        <?php foreach($data as $i) { ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $i->nm_pel; ?></td>
                          <td><?php echo $i->kkm; ?></td>
                          <td><button type="" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#EditPelajaran<?php echo $i->kd_pel; ?>"><i class="fas fa-edit"></i> edit</button>
                            <button type="" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#DeletePelajaran<?php echo $i->kd_pel; ?>"><i class="fas fa-trash"></i> delete</button></td>
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<!-- Modal ADD Pelajaran -->
<div class="modal fade" id="NewPelajaran" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelajaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form action="<?php echo base_url('page/addPelajaran') ?>" method="post" >
          <div class="modal-body">
            
              <div class="form-group row">
                <label for="kd_pel" class="form-control-label col-lg-3">Kode Pelajaran</label>
                
                <div class="col-lg-9">
                    <input type="text" name="kd_pel" id="kd_pel" class="form-control" placeholder="Masukan Kode Pelajaran..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="nm_pel" class="form-control-label col-lg-3">Mata Pelajaran</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_pel" class="form-control" placeholder="Masukkan Mata Pelajaran..." required>
                </div>
            </div>

            <div class="form-group row">
                <label for="kkm" class="form-control-label col-lg-3">Kkm</label>

                <div class="col-lg-9">
                    <input type="text" name="kkm" class="form-control" placeholder="Masukkan Kkm..." required>
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
  <!-- END MODAL ADD Pelajaran -->

  <!-- Modal EDIT Pelajaran -->
<?php foreach ($data as $i) { ?>
<div class="modal fade" id="EditPelajaran<?php echo $i->kd_pel; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pelajaran</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <form action="<?php echo base_url('page/editPelajaran') ?>" method="post" >
          <div class="modal-body">
            
              <!-- <div class="form-group row">
                <label for="kd_pel" class="form-control-label col-lg-3">Kode Pelajaran</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="kd_pel" id="kd_pel" class="form-control" placeholder="Masukan Kode Pelajaran..." value="<?php echo $i->kd_pel; ?>">
                <!-- </div>
            </div> -->

            <div class="form-group row">
                <label for="nm_pel" class="form-control-label col-lg-3">Mata Pelajaran</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nm_pel" class="form-control" placeholder="Masukkan Mata Pelajaran..." value="<?php echo $i->nm_pel; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kkm" class="form-control-label col-lg-3">Kkm</label>

                <div class="col-lg-9">
                    <input type="text" name="kkm" class="form-control" placeholder="Masukkan Kkm..." value="<?php echo $i->kkm; ?>">
                </div>
            </div>
            
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-info">Ubah</button>
              </div>
          </div>
      </form>
        

      </div>
    </div>
  </div>
<?php } ?>
  <!-- END MODAL EDIT Pelajaran -->

 <!-- Delete Confirmation-->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="DeletePelajaran<?php echo $i->kd_pel; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('page/hapusPelajaran') ?>" method="post">
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <input type="hidden" name="kd_pel" value="<?php echo $i->kd_pel;?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Delete Confirmation -->
