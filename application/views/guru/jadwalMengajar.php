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