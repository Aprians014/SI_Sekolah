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
                <div class="col-sm-10">: <?php echo $nilai['nm_guru']; ?></div>
              
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-sm" id="data">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Mata Pelajaran</th>
                  <!-- <th>Aksi</th> -->
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
                  <!-- <td>
                    <button type="" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#EditNilai<?php echo $i->kd_kelas ?>"><i class="fas fa-edit"></i> edit</button>
                  </td> -->

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

