<!-- Begin Page Content --> 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
       <div class="card shadow">
          <div class="card-header text-dark">
          <?php echo $title; ?>
          </div>
       <div class="card-body">
        <p><button type="" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#NewKelas"><i class="fas fa-plus"></i> Tambah Kelas</button></p>
          <div class="row">
          <div class="col-sm">
            <?php echo $this->session->flashdata('msg'); ?>
            <div class="table-responsive">
              <table class="table-striped table-responsive table-hover table-sm" id="data">
              <thead>
                <tr>
                  <th>No</th>
                  <th width="20%">Kode Kelas</th>
                  <th>Kelas</th>
                  <th>Kapasitas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $i) { ?>
                <tr>
                  <th><?php echo $no; ?></th>
                  <td><?php echo $i->kd_kelas; ?></td>
                  <td><?php echo $i->kelas; ?></td>
                  <td><?php echo $i->kapasitas; ?></td>
                  <td>
                    <a href="" class="text-primary" data-toggle="modal" data-target="#EditKelas<?php echo $i->kd_kelas; ?>"><i class="fas fa-edit"></i></a>
                    <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteKelas<?php echo $i->kd_kelas; ?>"><i class="fas fa-trash"></i></a></td>
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

<!-- Modal ADD -->
<div class="modal fade" id="NewKelas" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <?php $this->session->flashdata('msg'); ?>
        </div>
            <form action="<?php echo base_url('page/addKelas'); ?>" method="post" >
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kelas" class="form-control-label col-lg-3">Kelas</label>
                        
                        <div class="col-lg-9">
                            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas..." required>
                        </div>
                    </div>

            <div class="form-group row">
                <label for="kd_kelas" class="form-control-label col-lg-3">Kapasitas</label>
                
                <div class="col-lg-9">

                    <input type="text" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukkan Kapasitas..." required>
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

  <!-- Modal EDIT -->
  <?php foreach ($data as $i) { ?>
<div class="modal fade" id="EditKelas<?php echo $i->kd_kelas; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <?php $this->session->flashdata('msg'); ?>
        </div>
            <form action="<?php echo base_url('page/editKelas'); ?>" method="post" >
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kelas" class="form-control-label col-lg-3">Kelas</label>

                        <input type="hidden" name="kd_kelas" class="form-control" placeholder="Masukan Kelas..." value="<?php echo $i->kd_kelas; ?>" required>
                        
                        <div class="col-lg-9">
                            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas..." value="<?php echo $i->kelas; ?>" required>
                        </div>
                    </div>

            <div class="form-group row">
                <label for="kd_kelas" class="form-control-label col-lg-3">Kapasitas</label>
                
                <div class="col-lg-9">

                    <input type="text" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukkan Kapasitas..." value="<?php echo $i->kapasitas ?>" required>
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
  <!-- END MODAL EDIT -->

<!-- Delete Confirmation-->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="DeleteKelas<?php echo $i->kd_kelas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('page/hapusKelas') ?>" method="post">
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <input type="hidden" name="kd_kelas" value="<?php echo $i->kd_kelas;?>">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-danger">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- End Delete Confirmation