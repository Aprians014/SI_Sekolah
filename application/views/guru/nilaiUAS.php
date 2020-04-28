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
            <div class="row my-2">
                <div class="col-sm-2">Guru Pengajar</div>
                <div class="col-sm-10">: <?php echo $uas['nm_guru']; ?></div>             
            </div>
            <hr>
            <div class="table-responsive">
              <table class="table table-bordered table-sm" id="data">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai UAS</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $i) { ?>
                <tr>
                  <th><?php echo $no; ?></th>
                  <td><?php echo $i->nis; ?></td>
                  <td><?php echo $i->nm_siswa; ?></td>
                  <td><?php echo $i->nm_pel; ?></td>
                  <td><?php echo $i->nil_uas; ?></td>
                  <td>
                    <button type="" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#EditNilai<?php echo $i->kd_kelas ?>"><i class="fas fa-edit"></i> edit</button>
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
    </div>
  </div>
  
  </div>
 
  
  

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal EDIT GURU -->
<?php foreach ($data as $i): ?>
<div class="modal fade" id="EditNilai<?php echo $i->kd_kelas; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Guru</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="<?php echo base_url('page/editNilaiUAS') ?>" method="post" >
        <div class="modal-body">
            <!-- <div class="form-group row">
                <div class="col-lg-9">
                    <label for="kd_kelas" class="form-control-label">Kode Kelas*</label> -->
                    <input type="hidden" name="kd_kelas" class="form-control" placeholder="Masukan Kode Kelas..." required value="<?php echo $i->kd_kelas; ?>">
                <!-- </div>
            </div> -->

            <!-- <div class="form-group row">
                <div class="col-lg-9">
                    <label for="nik" class="form-control-label">NIK*</label> -->
                    <input type="hidden" name="nik" class="form-control" placeholder="Masukan NIK..." required value="<?php echo $i->nik; ?>">
               <!--  </div>
            </div> -->

            <!-- <div class="form-group row">
                <label for="nm_guru" class="form-control-label col-lg-3">Nama</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="nis" class="form-control" placeholder="Masukkan Nama..." required value="<?php echo $i->nis; ?>">
                <!-- </div>
            </div> -->

            <!-- <div class="form-group row">
                <label for="nik" class="form-control-label col-lg-3">Tempat Lahir</label>

                <div class="col-lg-9"> -->
                    <input type="hidden" name="nik" class="form-control" placeholder="Masukkan Tempat Lahir..." required value="<?php echo $i->nik; ?>">
               <!--  </div>
            </div> -->

            <!-- <div class="form-group row">
                <label for="kd_pel" class="form-control-label col-lg-3">Agama</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="kd_pel" class="form-control" placeholder="Agama..." required value="<?php echo $i->kd_pel; ?>">
                <!-- </div>
            </div> -->

            <!-- <div class="form-group row">
                <label for="nil_uts" class="form-control-label col-lg-3">Nilai UTS*</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="nil_uts" class="form-control" placeholder="Masukkan nilai UTS..." value="<?php echo $i->nil_uts; ?>">
                <!-- </div>
            </div> -->

            <div class="form-group row">
                <label for="nil_uas" class="form-control-label col-lg-3">Nilai UAS</label>
                
                <div class="col-lg-9">
                    <input type="text" name="nil_uas" class="form-control" placeholder="Nilai UAS..." required value="<?php echo $i->nil_uas; ?>">
                </div>
            </div>

            <!-- <div class="form-group row">
                <label for="nil_tgs" class="form-control-label col-lg-3">Pendidikan</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="nil_tgs" class="form-control" placeholder="Pendidikan..." required value="<?php echo $i->nil_tgs; ?>">
                <!-- </div>
            </div> -->

            <!-- <div class="form-group row">
                <label for="absen" class="form-control-label col-lg-3">Status</label>
                
                <div class="col-lg-9"> -->
                    <input type="hidden" name="absen" class="form-control" placeholder="Status..." required value="<?php echo $i->absen; ?>">
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
  <!-- END MODAL EDIT GURU