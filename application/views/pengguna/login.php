	<!-- start banner Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-between">
				<div class="col-lg-7 col-md-4 banner-left">
					<h6 class="text-white">Selamat Datang Di Sistem Informasi Objek Pariwisata</h6>
					<h1 class="text-white">Kabupaten Lebak</h1>
					<p class="text-white">
						Visit lebak adalah sebuah portal informasi pemetaan objek pariwisata yang ada di Kabupaten Lebak, Banten. Situs ini mencakup informasi tentang objek pariwisata berupa wisata , kuliner dan penginapan serta konten berita yang ada di Kabupaten Lebak. Situs ini dikelola oleh Badan Perencanaan dan Penelitian Pengembangan Pembangunan Daerah Kabupaten Lebak.
					</p>
					<a href="<?php echo base_url('pengguna/peta_wilayah') ?>" class="primary-btn text-uppercase">Peta Wilayah</a>
				</div>
				<div class="col-md-5">
					<div class="card" id="login">
						<div class="card-body">

							<h5><b>Login</b></h5>
							<hr>
							<?php if ($this->session->flashdata('pesan')) : ?>
								<br>
								<div class="alert alert-success" role="alert">
									<i class="text-white fa fa-times p-1"></i>

									<?php echo $this->session->flashdata('pesan');
									?>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('gagal')) : ?>
								<br>
								<div class="alert alert-danger" role="alert">

									<?php echo $this->session->flashdata('gagal');
									?>
								</div>
							<?php endif; ?>
							<form role="form" method="POST" action="<?= base_url('') ?>pengguna/login/cek_user">
								<div class="form-group">
									<label for="">Email</label>
									<input type="email" name="username" class="form-control" placeholder="Enter Email" required>
								</div>
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="text-right">
									<button class="btn btn-sm btn-primary" id="regis">
										<span style="color: white;">Registrasi</span>
									</button>
								</div><br>
								<div class="text-center">
									<button type="submit" class="btn btn-primary rounded-pill btn-block">Login</button>
									<?php
									if (!isset($login_button)) {

										$user_data = $this->session->userdata('user_data');
										echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
										echo '<img src="' . $user_data['profile_picture'] . '" class="img-responsive img-circle img-thumbnail" />';
										echo '<h3><b>Name : </b>' . $user_data["first_name"] . ' ' . $user_data['last_name'] . '</h3>';
										echo '<h3><b>Email :</b> ' . $user_data['email_address'] . '</h3>';
										//echo '<h3><a href="http://localhost/login_google/google/logout">Logout</h3></div>';
									} else {
										echo '<div align="center">' . $login_button . '</div>';
									}
									?>
								</div>
							</form>



						</div>
					</div>
					<div class="card" id="registrasi" style="margin-top: 120px;">
						<div class="card-body">

							<h5><b>Registrasi</b></h5>
							<hr>
							<?php if ($this->session->flashdata('pesan')) : ?>
								<br>
								<div class="alert alert-success" role="alert">
									<i class="text-white fa fa-times p-1"></i>

									<?php echo $this->session->flashdata('pesan');
									?>
								</div>
							<?php endif; ?>
							<?php if ($this->session->flashdata('gagal')) : ?>
								<br>
								<div class="alert alert-danger" role="alert">

									<?php echo $this->session->flashdata('gagal');
									?>
								</div>
							<?php endif; ?>
							<form action="<?= base_url('') ?>pengguna/login/saave" method="post" enctype="multipart/form-data">

								<div class="form-group">
									<label for="user">Nama user</label>
									<input type="text" name="nama" id="user" placeholder="Nama User" class="form-control form-control-sm" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="Email" name="email" id="email" placeholder="email@email.co" class="form-control form-control-sm" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="Password" name="password" id="password" placeholder="******" class="form-control form-control-sm" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label for="nohp">No HP</label>
									<input type="number" name="nohp" id="nohp" placeholder="08232323232" class="form-control form-control-sm" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="2" required></textarea>
								</div>
								<div class="text-right">
									<button class="btn btn-sm btn-primary" id="loginclick">
										<span>Login</span>
									</button>
								</div>
								<br>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Daftar</button>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function() {
			$("#registrasi").hide();
		});
		$("#regis").click(function() {
			$("#login").hide();
			$("#registrasi").show();
		})
		$("#loginclick").click(function() {
			$("#registrasi").hide();
			$("#login").show();
		})
	</script>
	<!-- End banner Area -->