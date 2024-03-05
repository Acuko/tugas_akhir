<!-- start banner Area -->
<section class="about-banner relative">
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Detail Berita
				</h1>
				<p class="text-white link-nav"><a href="<?php echo base_url('pengguna/dashboard') ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="<?php echo base_url('pengguna/berita') ?>"> Berita</a><span class="lnr lnr-arrow-right"></span> <a href="#"> Detail Berita</a></p>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- Start post-content Area -->
<section class="sample-text-area">
	<div class="container">
		<?php foreach ($detail as $dt) : ?>
			<h3 class="text-heading"><?php echo $dt->judul ?></h3>
		<?php endforeach; ?>
	</div>
</section>

<section class="post-content-area single-post-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<?php foreach ($detail as $dt) : ?>
							<div class="feature-img">
								<img height="520px" src="<?php echo base_url('assets/upload/' . $dt->foto) ?>" alt="">
							</div>
						<?php endforeach; ?>
					</div>

					<!-- <div class="col-lg-3  col-md-3 meta-details">
									<div class="user-details row">
										<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
										<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
									</div>
								</div> -->

					<div class="col-lg-12 col-md-12">
						<br>
						<?php foreach ($detail as $dt) : ?>
							<p class="excert text-justify ">
								<b><font color="black"><?php echo $dt->deskripsi ?></font></b>
							</p>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">
					<div class="single-sidebar-widget post-category-widget">
						<div class="single-sidebar-widget user-info-widget">
							<img src="<?php echo base_url('assets/assets_pengguna') ?> /img/blog/userin.png" alt="">
							<?php foreach ($detail as $dt) : ?>
								<a href="#">
									<h4><?php echo $dt->inertedBy ?></h4>
								</a>
								<p>
									<?php echo $dt->insertedDate ?>
								</p>
							<?php endforeach; ?>
						</div>
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
						<!-- <div class="single-sidebar-widget post-category-widget">
									<h4 class="category-title">Post Catgories</h4>
									<ul class="cat-list">
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Technology</p>
												<p>37</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Lifestyle</p>
												<p>24</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Fashion</p>
												<p>59</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Art</p>
												<p>29</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Food</p>
												<p>15</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Architecture</p>
												<p>09</p>
											</a>
										</li>
										<li>
											<a href="#" class="d-flex justify-content-between">
												<p>Adventure</p>
												<p>44</p>
											</a>
										</li>															
									</ul>
								</div> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End post-content Area -->
