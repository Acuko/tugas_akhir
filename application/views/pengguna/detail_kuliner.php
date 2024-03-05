<style>
	div.ex3 {
		background-color: #f4f4f4;
 		width: 100%;
 		height: 210px;
 		overflow-y: scroll;
 		border-radius: 10px;
	}
</style>
<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Detail Kuliner
				</h1>
				<p class="text-white link-nav"><a href="<?php echo base_url('pengguna/dashboard') ?>"> Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="<?php echo base_url('pengguna/kuliner') ?>"> Kuliner</a><span class="lnr lnr-arrow-right"></span> <a href="#"> Detail Kuliner</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start insurence-one Area -->
<section class="insurence-one-area section-gap">
	<div class="container">
		<div class="row align-items-center">
			<?php foreach ($detail as $dt) : ?>

				<div class="col-lg-6 insurence-left">
					<img height="520px" src="<?php echo base_url('assets/upload/' . $dt->gambar) ?>" id="header1" alt="">
				</div>
				<div class="col-lg-6 insurence-right">
					<h1 class="text-uppercase"><?php echo $dt->nama_kuliner ?></h1>
					<h5><?php echo $dt->alamat ?></h5>
					<br>
					<?php
					foreach ($totrating as $mb) :
						if ($mb->rat != null) {

							for ($i = 1; $i <= $mb->rat; $i++) {
								if ($this->session->userdata('login_status') == TRUE) {
									echo '<i class="fa fa-star text-warning" data-toggle="modal" data-target="#exampleModal"></i>';
									} else {
										echo '<i class="fa fa-star text-warning"></i>';
									}
							}
							echo ' '.round($mb->rat,2);
						}else{
							if ($this->session->userdata('login_status') == TRUE) {
							echo '<i class="fa fa-star text-black" data-toggle="modal" data-target="#exampleModal"></i>';
							echo '<i class="fa fa-star text-black" data-toggle="modal" data-target="#exampleModal"></i>';
							echo '<i class="fa fa-star text-black" data-toggle="modal" data-target="#exampleModal"></i>';
							echo '<i class="fa fa-star text-black" data-toggle="modal" data-target="#exampleModal"></i>';
							echo '<i class="fa fa-star text-black" data-toggle="modal" data-target="#exampleModal"></i>';
							#echo ' 0';
							} else{
								echo '<i class="fa fa-star text-black" ></i>';
								echo '<i class="fa fa-star text-black" ></i>';
								echo '<i class="fa fa-star text-black" ></i>';
								echo '<i class="fa fa-star text-black" ></i>';
								echo '<i class="fa fa-star text-black" ></i>';
							}
						}
					endforeach;
					?>
					<hr>
					<!-- <div id="komen">
 						<div class="ex3">
 							<?php foreach ($komentar as $kom) : ?>
 								<div class="ml-3"><?= $kom->komentar ?></div>
								<hr>
 							<?php endforeach ?>

 						</div>
 						<?php if ($this->session->userdata('login_status') != FALSE) { ?>
 							<form role="form" method="POST" action="<?= base_url('') ?>pengguna/kuliner/komentar">
 								<div class="input-group mb-3">
 								<input type="hidden" name="idkuliner" id="idkuliner" value="<?= $dt->id_kuliner ?>">	
								<input type="hidden" name="iduser" value="<?= $this->session->userdata('id_user') ?>">
 									<input type="text" name="kome" class="form-control" placeholder="Komentar" aria-label="Recipient's username" aria-describedby="button-addon2" required>
 									<div class="input-group-append">
 										<button class="btn btn-outline-primary" type="submit" id="button-addon2">Kirim</button>
 									</div>
 								</div>
 							</form>
 						<?php } ?>
 					</div> -->
					<p>
						<b>
							<font color="black"><?php echo $dt->deskripsi ?></font>
						</b>
					</p>
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Rating</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<form role="form" method="POST" action="<?= base_url('') ?>pengguna/kuliner/rating">
									<div class="modal-body">
										<div class="form-group">
											<label for="">Rating</label>
											<?php for ($i = 5; $i >= 1; $i--) { ?>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="ratings" value="<?= $i ?>" id="ratings">
													<label class="form-check-label" for="flexRadioDefault1">
														<?php for ($j = 1; $j <= $i; $j++) { ?>
															<i class="fa fa-star text-warning"></i>
														<?php } ?>
													</label>
												</div>
											<?php } ?>
											<input type="hidden" name="jenisid" id="jenisid" value="<?= $dt->id_kuliner ?>">
											<input type="hidden" name="iduser" value="<?= $this->session->userdata('id_user') ?>">
											<input type="hidden" name="jenis" value="kuliner">
										</div>
										<div class="form-group">
											<label for="">Note</label>
											<textarea name="note" id="" cols="30" rows="3" class="form-control form-control-sm"></textarea>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Rating</button>
									</div>

								</form>
							</div>
						</div>
					</div>
					<!-- <div class="list-wrap">
								<ul>
									<li>Strategic approach towards redesigning brand.</li>
									<li>logo design strategy ensures a perfectly crafted
									logo for your business.</li>
									<li>Branding that stands out in the crowd.</li>
									<li>Modern and evergreen logo for your business.</li>
								</ul>
							</div> -->
							<h5><b class="text-black">Rating</b></h5>
 					<div class="ex3">
 						<?php

							foreach ($ratings as $mbs) : ?>
 							<div class="ml-3" style="color: black;">
 								<?= $mbs->nama ?> <br>
 								<?php for ($i = 1; $i <= $mbs->ratings; $i++) {
										echo '<i class="fa fa-star text-warning"></i>';
									} ?> <br>
 								<?= $mbs->note ?></div>
 							<hr>

 						<?php endforeach;
							?>
 					</div>
				</div>
			<?php endforeach; ?>
			
		</div>
		<hr>
		<div class="row">
			<?php foreach ($gambar as $dt) : ?>
				<div class="col-md-2 p1">
					<img style="width: 100%; max-height: 100px;" class="ubah" src=" <?php echo base_url() . 'assets/upload/' . $dt->gambar ?> ">
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- End insurence-one Area -->
<script>
	$(document).ready(function() {
		$("#komen").hide();
		$("#komentar").click(function() {
			$("#komen").fadeToggle("slow");
		});
		$(".ubah").click(function() {
			var value = $(this).attr('src');
			$('#header1').attr('src', value);
		})

		//like

	});
</script>