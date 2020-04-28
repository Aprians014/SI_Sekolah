<!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row mx-1">
            <div class="card shadow">
                <div class="card-header">
                    <?php echo $title; ?>
                </div>
                <div class="card-body">
                    <?php if ($this->session->userdata('akses')=='1'): ?>
                    <h3>Selamat Datang <b><?php echo $this->session->userdata('ses_nm'); ?></b>, Ini adalah halaman admin gunakan fasilitas ini dengan baik.</h3>
                    <?php elseif ($this->session->userdata('akses')=='2'): ?>
                    <h3>Selamat Datang <b><?php echo $this->session->userdata('ses_nm'); ?></b>, Ini adalah halaman guru gunakan fasilitas ini dengan baik.</h3>
                    <?php else: ?>
                    <h3>Selamat Datang <b><?php echo $this->session->userdata('ses_nm'); ?></b>, Ini adalah halaman siswa gunakan fasilitas ini dengan baik.</h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>

     
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->