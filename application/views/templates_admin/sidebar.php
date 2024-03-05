<body>
	<div id="app">
		<div class="main-wrapper">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">

				</form>
				<ul class="navbar-nav navbar-right">


					<li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama_admin') ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">Logged in 5 min ago</div>

							<div class="dropdown-divider"></div>
							<a href="<?= base_url('') ?>auth/logout" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="index.html">Administrator</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="index.html">St</a>
					</div>
					<ul class="sidebar-menu">

						<li><a class="nav-link" href="<?php echo base_url('dashboard') ?>"><i class="fas fa-tachometer-alt"></i>
								<span>Dashboard</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('data_wisata') ?>"><i class="fas fa-campground"></i>
								<span>Data Wisata</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('data_kuliner') ?>"><i class="fas fa-utensils"></i>
								<span>Data Kuliner</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('data_penginapan') ?>"><i class="fas fa-home"></i>
								<span>Data Penginapan</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('Berita') ?>"><i class="fas fa-newspaper"></i>
								<span>Data Berita</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('Kategory') ?>"><i class="fas fa-newspaper"></i>
								<span>Data Kategory</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('jenis') ?>"><i class="fas fa-newspaper"></i>
								<span>Data Jenis</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('data_kecamatan') ?>"><i class="fas fa-random"></i>
								<span>Data Kecamatan</span></a></li>
						<li><a class="nav-link" href="<?php echo base_url('data_like') ?>"><i class="fas fa-thumbs-up"></i>
								<span>Data Like</span></a></li>
						<li><a class="nav-link" href="<?php echo base_url('data_komentar') ?>"><i class="fas fa-comment"></i>
								<span>Data Komentar</span></a></li>
						<li><a class="nav-link" href="<?php echo base_url('data_user') ?>"><i class="fas fa-user"></i>
								<span>Data User</span></a></li>
						<li><a class="nav-link" href="<?php echo base_url('data_transportasi') ?>"><i class="fas fa-car"></i>
								<span>Data Transportasi</span></a></li>
						<li><a class="nav-link" href="<?php echo base_url('data_spbu') ?>"><i class="fas fa-gas-pump"></i>
								<span>Data SPBU</span></a></li>

						<li><a class="nav-link" href="<?php echo base_url('data_atm') ?>"><i class="fas fa-credit-card"></i>
								<span>Data ATM</span></a></li>

						<!-- <li><a class="nav-link" href="<?php echo base_url('laporan') ?>"><i class="fas fa-clipboard-list"></i>
              <span>Laporan</span></a></li> -->

					</ul>
				</aside>
			</div>