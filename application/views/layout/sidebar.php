  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="navAccordion">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand bg-light text-dark d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-fw fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-1"><h5>SMK TUNAS BANGSA</h5></div>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Home -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('page')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Akses Menu Admin -->
        <?php if ($this->session->userdata('akses')=='1'): ?>
        <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">Informasi</div>

          <!-- menu Data Guru -->
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?php echo base_url('page/dataGuru')?>"><i class="fas fa-fw fa-users"></i><span>Data Guru</span></a>
          </li>

          <!-- menu Data Siswa -->
           <li class="nav-item "><a class="nav-link pb-0" href="<?php echo base_url('page/dataSiswa')?>"><i class="fas fa-fw fa-users"></i><span>Data Siswa</span></a></li>

           <!-- menu Jadwal Pelajaran -->
           <li class="nav-item "><a class="nav-link pb-0" href="<?php echo base_url('page/dataPelajaran')?>"><i class="fas fa-fw fa-book"></i><span>Data Pelajaran</span></a></li>

           <li class="nav-item "><a class="nav-link pb-0" href="<?php echo base_url('page/dataJadwal')?>"><i class="fas fa-fw fa-calendar"></i><span>Data Jadwal</span></a></li>

           <li class="nav-item "><a class="nav-link pb-0" href="<?php echo base_url('page/dataKelas')?>"><i class="fas fa-fw fa-home"></i><span>Data Kelas</span></a></li>

           <li class="nav-item "><a class="nav-link" href="<?php echo base_url('page/dataNilai')?>"><i class="fas fa-fw fa-book"></i><span>Nilai Siswa</span></a></li>
 
      <!-- / Akses Menu Admin -->

          <!-- Akses Menu Guru -->
        <?php elseif ($this->session->userdata('akses')=='2'): ?>
        <!-- Divider -->
          <hr class="sidebar-divider my-0">
          <!-- Heading -->
          <div class="sidebar-heading">Personal</div>

          <!-- Nav Item - Tables -->
          <li class="nav-item"><a class="nav-link" href="<?php echo base_url('page/dataPribadiGuru')?>"><i class="fas fa-fw fa-user"></i><span>Data Pribadi</span></a></li>

          <hr class="sidebar-divider my-0">
          <!-- Heading -->
          <div class="sidebar-heading">Mengajar</div>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link pb-0" href="<?php echo base_url('page/jadwalMengajar')?>"><i class="fas fa-fw fa-user"></i><span>Jadwal Mengajar</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('page/masterSiswa')?>"><i class="fas fa-fw fa-user"></i><span>Master Siswa</span></a>
          </li>

          <!-- / Akses Menu Guru -->

          <hr class="sidebar-divider">
          <!-- Heading -->
          <div class="sidebar-heading">
            Nilai
          </div>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('page/nilaiPresensi')?>">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Nilai Absen</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link pt-0" href="<?php echo site_url('page/nilaiTGS')?>">
              <i class="fas fa-fw fa-calendar"></i>
              <span>Nilai Tugas</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link pt-0" href="<?php echo site_url('page/nilaiUTS')?>">
              <i class="fas fa-fw fa-calendar"></i>
              <span>Nilai UTS</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link pt-0" href="<?php echo site_url('page/nilaiUAS')?>">
              <i class="fas fa-fw fa-calendar"></i>
              <span>Nilai UAS</span></a>
          </li>

      <!-- Akses Menu Siswa -->
        <?php else: ?>
        <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Personal
          </div>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('page/dataPribadiSiswa')?>">
              <i class="fas fa-fw fa-user"></i>
              <span>Data Pribadi</span></a>
          </li>

          <hr class="sidebar-divider">
          <!-- Heading -->
          <div class="sidebar-heading">
            Informasi
          </div>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo site_url('page/dataJadwal')?>">
              <i class="fas fa-fw fa-clipboard-list"></i>
              <span>Jadwal Pelajaran</span></a>
          </li>

          <hr class="sidebar-divider">
          <!-- Heading -->
          <div class="sidebar-heading">
            Nilai
          </div>

          <!-- Nav Item - Tables -->
          <li class="nav-item">
            <a class="nav-link pt-0" href="<?php echo site_url('page/nilaiSiswa')?>">
              <i class="fas fa-fw fa-calendar"></i>
              <span>Nilai</span></a>
          </li>
          
      <!-- / Akses Menu Siswa -->
        <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Tables -->
          <li class="nav-item"><a class="nav-link pt-0" href="" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i><span>Logout</span></a></li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->