<!-- Begin Page Content --> 
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6">
       <div class="card shadow">
          <div class="card-header text-dark">
          <?php echo $title; ?>
          </div>
       <div class="card-body">
          <div class="row">
          <div class="col-sm-12">
            <!-- <div class="row my-2">
              <?php foreach ($data as $i): ?>
                <div class="col-sm-2">Guru Pengajar</div>
                <div class="col-sm-10">: <?php echo $i->nm_guru; ?></div>
                <div class="col-sm-2">Mata Pelajaran</div>
                <div class="col-sm-10">: <?php echo $i->nm_pel; ?></div>

              <?php endforeach; ?>
              
            </div> -->
            <div class="table-responsive">
              <table class="table table-bordered table-sm" id="data">
              <thead>
                <tr>
                  <th width="5%">No</th>
                  <th>Kode Pelajaran</th>
                  <th>Mata Pelajaran</th>
                  <th>Nilai</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $i) { ?>
                <tr>
                  <th><?php echo $no; ?></th>
                  <td><?php echo $i->kd_pel; ?></td>
                  <td><?php echo $i->nm_pel; ?></td>
                  <td><?php echo ($i->nil_uts+$i->nil_uas+$i->nil_tgs+$i->absen)/4; ?></td>
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

