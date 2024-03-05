<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Berita
				</h1>
				<p class="text-white link-nav"><a href="<?php echo base_url('pengguna/dashboard') ?>"> Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Berita </a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->


<!-- Start post-content Area -->
<section class="post-content-area pt-90 pb-90">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<?php
				$no = 1;
				foreach ($berita as $item) : ?>
					<div class="single-post row">
						<div class="col-lg-3  col-md-3 meta-details">

							<div class="user-details row">
								<p class="user-name col-lg-12 col-md-12 col-6"><a href="#"><?= $item->inertedBy ?></a> <span class="lnr lnr-user"></span></p>
								<p class="date col-lg-12 col-md-12 col-6"><a href="#"><?= $item->insertedDate ?></a> <span class="lnr lnr-calendar-full"></span></p>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 ">
							<div class="feature-img">
								<img class="img-fluid" src="<?php echo base_url() . 'assets/upload/' . $item->foto ?>" alt="">
							</div>
							<a class="posts-title" href="#">
								<h3><?= $item->judul ?></h3>
							</a>

							<a href="<?= base_url('') ?>pengguna/berita/detail_berita/<?= $item->idBerita  ?>" class="primary-btn">View More</a>
						</div>
					</div>

				<?php endforeach; ?>

			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">
					<div class="single-sidebar-widget post-category-widget">
						<form action="<?= base_url('') ?>pengguna/berita" method="get">
							<input type="text" name="q" id="" placeholder="Search..." class="form-control">
							<br>
							<button type="submit" class="btn btn-primary btn-block">Search</button>
							<br>
						</form>

						<div class="single-sidebar-widget popular-post-widget">
							<h4 class="popular-title">Berita Terbaru</h4>
							<div class="popular-post-list">
								<div class="single-post-list flex-row align-items-center">
									<?php
									$no = 1;
									foreach ($recent as $item) : ?>
										<div class="thumb">
											<img width="50%" class="img-fluid" src="<?php echo base_url() . 'assets/upload/' . $item->foto ?>" alt="">
										</div>
										<div class="details">
											<a href="<?= base_url('') ?>pengguna/berita/detail_berita/<?= $item->idBerita  ?>">
												<h6 style="font-size: 15px;"><?= $item->judul ?></h6>
											</a>
											<!-- <p><?= $item->insertedDate ?></p> -->
										</div>
									<?php endforeach; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<nav class="blog-pagination justify-content-center d-flex">
			<?= $this->pagination->create_links(); ?>
		</nav>
</section>
<!-- End post-content Area -->
