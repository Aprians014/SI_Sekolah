<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
       <div class="card shadow">
          <div class="card-header text-dark">
          <?php echo $title; ?>
          </div>
       <div class="card-body">
        <p><button type="" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#NewDataNilai"><i class="fas fa-plus"></i> Tambah Data Nilai Siswa</button></p>
        <?php $this->session->flashdata('msg') ?>
          <div class="row">
          <div class="col-sm">
            <div class="table-responsive">
              <table class="table table-striped table-hover table-bordered table-sm" id="data">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kelas</th>
                  <th>Nama Siswa</th>
                  <th>Guru Pengampu</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai UTS</th>
                  <th>Nilai UAS</th>
                  <th>Nilai Tugas</th>
                  <th>Absen</th>
                  <th>Rata-rata</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $i) { ?>
                <tr>
                  <th><?php echo $no; ?></th>
                  <td><?php echo $i->kelas; ?></td>
                  <td><?php echo $i->nm_siswa; ?></td>
                  <td><?php echo $i->nm_guru; ?></td>
                  <td><?php echo $i->nm_pel; ?></td>
                  <td><?php echo $i->nil_uts; ?></td>
                  <td><?php echo $i->nil_uas; ?></td>
                  <td><?php echo $i->nil_tgs; ?></td>
                  <td><?php echo $i->absen; ?></td>
                  <td><?php echo ($i->nil_uts+$i->nil_uas+$i->nil_tgs+$i->absen)/4; ?></td>
                  <td><a href="" class="text-primary" data-toggle="modal" data-target="#EditNilai<?php echo $i->kd_kelas; ?>"><i class="fas fa-edit"></i></a>
                    <a href="" class="text-danger" data-toggle="modal" data-target="#DeleteJadwal<?php echo $i->kd_kelas; ?>"><i class="fas fa-trash"></i></a></td>
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

<!-- --------------------------------------------------- -->
<!-- Modal EDIT  -->
<!-- --------------------------------------------------- -->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="EditNilai<?php echo $i->kd_kelas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Nilai</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url('page/editDataNilai') ?>" method="post" >
        <div class="modal-body">
            <div class="form-group">
                <label for="kd_kelas" class="form-control-label">Kode Kelas*</label>

                  <input type="text" name="kd_kelas" class="form-control" placeholder="Masukan Kode Kelas..." required value="<?php echo $i->kd_kelas; ?>">

            </div>

            <div class="form-group">
                <label for="nis" class="form-control-label">NIS*</label>
                
                    <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS..." required value="<?php echo $i->nis; ?>">

            </div>

            <div class="form-group">
                <label for="nik" class="form-control-label">NIK*</label>

                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK..." required value="<?php echo $i->nik; ?>">
            </div>

            <div class="form-group">
                <label for="kd_pel" class="form-control-label">Kode Pelajaran*</label>
                
                    <input type="text" name="kd_pel" class="form-control" placeholder="Masukkan Kode Pelajaran..." required value="<?php echo $i->kd_pel; ?>">

            </div>

            <div class="form-group">
                <label for="nil_uts" class="form-control-label">Nilai UTS*</label>
                    <input type="hidden" name="nil_uts" class="form-control" placeholder="Masukkan Kode Pelajaran..." value="<?php echo $i->nil_uts; ?>">
            </div>

            <input type="hidden" name="nil_uas" class="form-control" placeholder="Masukkan Kode Pelajaran..." required value="<?php echo $i->nil_uas; ?>">

            <input type="hidden" name="nil_tgs" class="form-control" placeholder="Masukkan Kode Pelajaran..." required value="<?php echo $i->nil_tgs; ?>">

            <input type="hidden" name="absen" class="form-control" placeholder="Masukkan Kode Pelajaran..." required value="<?php echo $i->absen; ?>">
            
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
  <!-- END MODAL -->


<!-- Modal ADD -->
<div class="modal fade" id="NewDataNilai" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Nilai Siswa</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
            <form action="<?php echo base_url('page/addDataNilai'); ?>" method="post" >
                <div class="modal-body">
                  
            <div class="form-group">
                <label for="kd_kelas" class="form-control-label">Kode Kelas*</label>

                  <input type="text" name="kd_kelas" class="form-control" placeholder="Masukan Kode Kelas..." required>

            </div>

            <div class="form-group">
                <label for="nis" class="form-control-label">NIS*</label>
                
                    <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS..." required>

            </div>

            <div class="form-group">
                <label for="nik" class="form-control-label">NIK*</label>

                    <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK..." required>
            </div>

            <div class="form-group">
                <label for="kd_pel" class="form-control-label">Kode Pelajaran*</label>
                
                    <input type="text" name="kd_pel" class="form-control" placeholder="Masukkan Kode Pelajaran..." required>

            </div>

            <!-- <div class="form-group">
                <label for="nil_uts" class="form-control-label">Nilai UTS*</label>
                    <input type="hidden" name="nil_uts" class="form-control" placeholder="Masukkan Kode Pelajaran...">
            </div>

            <input type="hidden" name="nil_uas" class="form-control" placeholder="Masukkan Kode Pelajaran..." required>

            <input type="hidden" name="nil_tgs" class="form-control" placeholder="Masukkan Kode Pelajaran..." required>

            <input type="hidden" name="absen" class="form-control" placeholder="Masukkan Kode Pelajaran..." required> -->
            
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
<div class="modal fade" id="DeleteJadwal<?php echo $i->kd_kelas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?php echo base_url('page/hapusNilai') ?>" method="post">
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