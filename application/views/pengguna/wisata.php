	<!-- start banner Area -->
	<section class="about-banner relative">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Wisata
					</h1>
					<p class="text-white link-nav"><a href="<?php echo base_url('pengguna/dashboard') ?>"> Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Wisata </a></p>
				</div>
			</div>
		</div>
	</section>
	<!-- End banner Area -->

	<!-- Start destinations Area -->
	<section class="destinations-area section-gap">
		<div class="container">
			<!-- <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Destinasi Wisata Populer</h1>
		                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast, day to.</p>
		                    </div>
		                </div>
		            </div> -->

			<form action="<?= base_url('') ?>pengguna/wisata" method="get">
				<div class="row">
					<div class="col-md-8">
						<input type="text" name="q" class="form-control" placeholder="Cari Wisata" autocomplete="off">
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-sm btn-block btn-primary fa fa-search"></button>
					</div>
				</div>
			</form>
			<div class="mbr-gallery-filter container gallery-filter-active">
				<ul buttons="0">
					<li class="mbr-gallery-filter-all">
						<a class="btn btn-md btn-primary-outline active display-4" href="<?= base_url('') ?>pengguna/wisata">All</a>
					</li>

					<?php foreach ($kategori as $item) : ?>
						<li><a class="btn btn-md btn-primary-outline display-4" href="<?= base_url('') ?>pengguna/wisata?q=<?= $item->namakategori ?>"><?= $item->namakategori ?></a></li>

					<?php endforeach; ?>
				</ul>
			</div>

			<hr>


			<div class="row">
				<div class="col-md-2">
						<h5><b>Rekomendasi</b></h5>
						<hr>
						<a href="<?= base_url('') ?>pengguna/wisata?l=2">Wisata Populer</a>
				</div>
				<div class="col-md-10">
					<div class="row">
						<?php foreach ($wisata as $mb) : ?>
							<div class="col-lg-4">
								<div class="single-destinations">
									<div class="thumb">
										<img height="220px" , width="320px " src="<?php echo base_url('assets/upload/' . $mb->gambar) ?>" alt="">
									</div>
									<div class="details">
										<h4 class="d-flex justify-content-between">
											<span><?php echo $mb->nama_wisata ?></span>
										</h4>
										<p>
											<?php echo $mb->alamat ?>
											
										</p>
										<?php
										if($mb->rat!=null){
										
											for($i=1; $i<= $mb->rat; $i++){
												echo '<i class="fa fa-star text-warning"></i>';
											}
										}
										?>
										<ul class="package-list">
											<li class="d-flex justify-content-between align-items-center">
												<a href="<?php echo base_url('pengguna/wisata/detail_wisata/' . $mb->id_wisata) ?>" class="price-btn">Lihat Detail</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>

		<nav class="blog-pagination justify-content-center d-flex">
			<?= $this->pagination->create_links(); ?>
		</nav>
	</section>
	<!-- End destinations Area -->