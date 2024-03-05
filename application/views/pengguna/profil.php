	<!-- start banner Area -->
	<section class="banner-area relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div style="height: 150px;"></div>
			<div class="row fullscreen ">
				<div class="col-lg-7 col-md-4 banner-left">
					<div class="card">
						<div class="card-body">
							<h5><b>Profil</b></h5>
						
							<table class="table">
								<?php foreach ($user as $item) : ?>
									<tr>
										<td style="width: 10%;">
											Nama
										</td>
										<td style="width: 10%;">
											<?= $item->nama?>
										</td>
									</tr>
									<tr>
										<td style="width: 10%;">
											Email
										</td>
										<td style="width: 10%;">
										<?= $item->email?>
										</td>
									</tr>
									<tr>
										<td style="width: 10%;">
											No HP
										</td>
										<td style="width: 10%;">
											<?= $item->nohp?>
										</td>
									</tr>
									<tr>
										<td style="width: 10%;">
											Alamat
										</td>
										<td style="width: 10%;">
										<?= $item->alamat?>
										</td>
									</tr>
								<?php endforeach; ?>


							</table>

						</div>
						<a href="<?php echo base_url('pengguna/login/logout') ?>" class="btn btn-danger"> Logout</a>
					</div>
				</div>
				<div class="col-md-5">
					<div class="card" id="login">
						<div class="card-body">

							<h5><b>Detail Activity</b></h5>

							<table class="table">
								<?php foreach ($ratings as $item) : ?>
									<tr>
										<td style="width: 10%;">
											<div style="width: 50px; height: 50px; background: black; border-radius: 50%;"></div>
										</td>
										<td>
											<a href="<?php echo base_url('pengguna/' . $item->jenis . '/detail_' . $item->jenis . '/' . $item->jenisid) ?>"> <?= $item->nama ?> - Rating <?= $item->jenis ?> <br>
												<?php for ($i = 1; $i <= $item->ratings; $i++) {
													echo '<i class="fa fa-star text-warning"></i>';
												} ?> <br>
												<?= $item->note ?>
											</a>
						</div>
						</td>
						</tr>
					<?php endforeach; ?>


					</table>



					</div>
				</div>

			</div>
		</div>
		</div>
	</section>