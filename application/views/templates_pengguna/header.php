<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Visit Lebak</title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/linearicons.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/magnific-popup.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/jquery-ui.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/nice-select.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/animate.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/mdi/css/materialdesignicons.min.css">

	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
	<!-- <script src="<?php echo base_url('assets/assets_pengguna') ?> /js/vendor/jquery-2.2.4.min.js"></script> -->

	<!-- leaflet -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/leaflet/leaflet.css" />
	<link rel="stylesheet" href="<?php echo base_url() ?>/leaflet/style.css" />
	<script src="<?php echo base_url() ?>/leaflet/leaflet.js"></script>
	<!-- tree control -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/leaflet/L.Control.Layers.Tree.css" />
	<script src="<?php echo base_url() ?>/leaflet/L.Control.Layers.Tree.js"></script>

	<!-- geojson selector -->
	<link rel="stylesheet" href="<?php echo base_url() ?>/leaflet/leaflet-geojson-selector.css" />
	<script src="<?php echo base_url() ?>/leaflet/leaflet-geojson-selector.js"></script>

	<style>
		.pagination a,
		.pagination strong {
			border: none;
			border-radius: 8px;
			color: black;
			padding: 0px;
			margin-right: 0px;
			text-decoration: none;
		}

		.page-link {
			margin: 5px;
		}

		.pagination a:hover,
		.pagination strong {
			border: none;
			background-color: #f8b600;
			color: white;
		}

		/*-------

   Gallery

-------*/
		.mbr-gallery .mbr-gallery-item {
			position: relative;
			display: inline-block;
			width: 25%;
			cursor: pointer;
		}

		@media (max-width: 768px) {
			.mbr-gallery .mbr-gallery-item {
				width: 50%;
			}
		}

		@media (max-width: 400px) {
			.mbr-gallery .mbr-gallery-item {
				width: 100%;
			}
		}

		.mbr-gallery .icon-focus,
		.mbr-gallery .icon-video {
			position: absolute;
			top: calc(50% - 32px);
			left: calc(50% - 24px);
			font-family: 'MobiriseIcons' !important;
			font-size: 3rem !important;
			color: #fff;
			opacity: 0;
			transition: .2s opacity ease-in-out;
			z-index: 5;
		}

		.mbr-gallery .icon-focus::before {
			content: '\e96b';
		}

		.mbr-gallery .icon-video::before {
			content: '\e95c';
		}

		.mbr-gallery .mbr-gallery-item>div:hover .icon-focus,
		.mbr-gallery .mbr-gallery-item>div:hover .icon-video {
			opacity: 1;
		}

		.mbr-gallery .mbr-gallery-item img {
			width: 100%;
			opacity: 1;
			-webkit-transition: .2s opacity ease-in-out;
			transition: .2s opacity ease-in-out;
		}

		.mbr-gallery .mbr-gallery-item>div:hover img {
			opacity: 1;
		}

		.mbr-gallery .mbr-gallery-item>div {
			background: #fff;
			display: block;
			outline: none;
			position: relative;
		}

		.mbr-gallery .mbr-gallery-item .icon {
			-webkit-transform: translateX(-50%) translateY(-50%);
			-webkit-transition: .2s opacity ease-in-out;
			color: #000;
			font-size: 30px;
			height: 69px;
			left: 50%;
			opacity: 0;
			position: absolute;
			top: 50%;
			transform: translateX(-50%) translateY(-50%);
			transition: .2s opacity ease-in-out;
			width: 69px;
		}

		.mbr-gallery .mbr-gallery-item .icon::after,
		.mbr-gallery .mbr-gallery-item .icon::before {
			content: '';
			display: block;
			position: absolute;
			height: 69px;
			width: 1px;
			margin-left: 34.5px;
			background-color: #fff;
		}

		.mbr-gallery .mbr-gallery-item .icon::after {
			width: 69px;
			height: 1px;
			margin-left: 0;
			margin-top: 34.5px;
		}

		.mbr-gallery .mbr-gallery-item>div:hover .icon {
			opacity: 1;
		}

		.mbr-gallery .mbr-gallery-item>div:hover::before {
			opacity: .9;
		}

		.mbr-gallery .mbr-gallery-item>div:hover .mbr-gallery-title {
			background: transparent !important;
		}

		/* remove spacing */
		.mbr-gallery .mbr-gallery-row.no-gutter {
			margin: 0;
		}

		.mbr-gallery .mbr-gallery-row.no-gutter .mbr-gallery-item {
			padding: 0;
		}

		/* container */
		.mbr-gallery .container.mbr-gallery-layout-default {
			padding: 93px 0;
		}

		/* fix horizontal scrollbar */
		.mbr-gallery .mbr-gallery-layout-article,
		.mbr-gallery .mbr-gallery-layout-default {
			overflow: hidden;
		}

		/* lightbox */
		.mbr-gallery .modal {
			position: fixed;
			overflow: hidden;
			padding-right: 0 !important;
		}

		.mbr-gallery .modal-content {
			border-radius: 0;
			border: none;
			background: transparent;
		}

		.mbr-gallery .modal-body {
			padding: 0;
		}

		.mbr-gallery .modal-body img {
			width: 100%;
		}

		.mbr-gallery .modal .close {
			position: fixed;
			background: #1b1b1b;
			opacity: .5;
			font-size: 35px;
			font-weight: 300;
			width: 70px;
			height: 70px;
			border-radius: 50%;
			color: #fff;
			top: 2.5rem;
			right: 2.5rem;
			line-height: 70px;
			border: none;
			text-align: center;
			text-shadow: none;
			z-index: 5;
			-webkit-transition: opacity .3s ease;
			-moz-transition: opacity .3s ease;
			-o-transition: opacity .3s ease;
			transition: opacity .3s ease;
			font-family: 'MobiriseIcons';
		}

		.mbr-gallery .modal .close::before {
			content: '\e91a';
		}

		.mbr-gallery .modal .close:hover {
			opacity: 1;
			background: #000;
			color: #fff;
		}

		.mbr-gallery .modal-dialog {
			max-width: 100% !important;
		}

		.mbr-gallery .modal.in .modal-dialog {
			margin: 0 auto;
		}

		/* modal back color opacity */
		.modal-backdrop.in {
			opacity: .8;
			filter: alpha(opacity=80);
		}

		@media (max-width: 768px) {

			.mbr-gallery .carousel-control,
			.mbr-gallery .carousel-indicators,
			.mbr-gallery .modal .close {
				position: fixed;
			}
		}

		/* fix fade in effect */
		.mbr-gallery .modal.fade .modal-dialog {
			-webkit-transition: margin-top .3s ease-out;
			-moz-transition: margin-top .3s ease-out;
			-o-transition: margin-top .3s ease-out;
			transition: margin-top .3s ease-out;
		}

		.mbr-gallery .modal.fade .modal-dialog,
		.mbr-gallery .modal.in .modal-dialog {
			-webkit-transform: none;
			-ms-transform: none;
			-o-transform: none;
			transform: none;
		}

		/*-------

   Slider

-------*/
		.mbr-slider .carousel-inner>.active,
		.mbr-slider .carousel-inner>.next,
		.mbr-slider .carousel-inner>.prev {
			display: table;
		}

		.mbr-slider .carousel-control {
			position: absolute;
			width: 70px;
			height: 70px;
			top: 50%;
			margin-top: -35px;
			line-height: 70px;
			border-radius: 50%;
			font-size: 35px;
			border: 0;
			opacity: .5;
			text-shadow: none;
			z-index: 5;
			color: #fff;
			-webkit-transition: all .2s ease-in-out 0s;
			-o-transition: all .2s ease-in-out 0s;
			transition: all .2s ease-in-out 0s;
		}

		.mbr-gallery .mbr-slider .carousel-control {
			position: fixed;
		}

		@media (max-width: 991px) {
			.mbr-gallery .mbr-slider .carousel-control {
				bottom: 2.5rem;
				margin-top: 0;
				top: auto;
				z-index: 17;
			}
		}

		.mbr-gallery .mbr-slider .carousel-inner>.active {
			display: block;
		}

		.mbr-slider .carousel-control.left {
			left: 0;
			margin-left: 2.5rem;
		}

		.mbr-slider .carousel-control.right {
			right: 0;
			margin-right: 2.5rem;
		}

		.mbr-slider .carousel-control .icon-next,
		.mbr-slider .carousel-control .icon-prev {
			margin-top: -18px;
			font-size: 40px;
			line-height: 27px;
		}

		.mbr-slider .carousel-control:hover {
			background: #1b1b1b;
			color: #fff;
			opacity: 1;
		}

		.mbr-slider .carousel-indicators {
			position: absolute;
			bottom: 0;
			margin-bottom: 1.5rem !important;
		}

		@media (max-width: 543px) {
			.mbr-slider .carousel-indicators {
				display: none;
			}
		}

		.carousel-indicators .active,
		.carousel-indicators li {
			width: 15px;
			height: 15px;
			margin: 3px;
			background: #1b1b1b;
			border: 0;
			opacity: .5;
		}

		.carousel-indicators .active {
			border: 4px solid #1b1b1b;
			background: #fff;
		}

		.carousel-indicators li {
			max-width: 15px;
			max-height: 15px;
			margin: 3px;
			background: #1b1b1b;
			border: 0;
			border-radius: 50%;
			opacity: .5;
		}

		.carousel-indicators li.active {
			border: 4px solid #1b1b1b;
			background: #fff;
		}

		.container .carousel-indicators {
			margin-bottom: 3px;
		}

		.mbr-gallery .mbr-slider .carousel-indicators {
			position: fixed;
			margin-bottom: 2.5rem !important;
		}

		@media (max-width: 991px) {
			.mbr-gallery .mbr-slider .carousel-indicators {
				margin-bottom: 3.625rem !important;
				padding-left: 2.5rem;
				padding-right: 2.5rem;
			}
		}

		.mbr-slider .carousel-indicators .active,
		.mbr-slider .carousel-indicators li {
			width: 20px;
			height: 20px;
			margin: 3px;
			background: #1b1b1b;
			border: 0;
			opacity: .5;
		}

		.mbr-slider .carousel-indicators .active {
			border: 4px solid #1b1b1b;
			background: #fff;
		}

		@media (max-width: 767px) {
			.mbr-slider .carousel-control {
				top: auto;
				bottom: 20px;
			}

			.mbr-slider>.container .carousel-control {
				margin-bottom: 0;
			}
		}

		/* boxed slider */
		.mbr-slider>.boxed-slider {
			position: relative;
			padding: 93px 0;
		}

		.mbr-slider>.boxed-slider>div {
			position: relative;
		}

		.mbr-slider>.container img {
			width: 100%;
		}

		.mbr-slider>.container img+.row {
			position: absolute;
			top: 50%;
			left: 0;
			right: 0;
			-webkit-transform: translateY(-50%);
			-moz-transform: translateY(-50%);
			transform: translateY(-50%);
			z-index: 2;
		}

		.mbr-slider .mbr-section {
			padding: 0;
			background-attachment: scroll;
		}

		.mbr-slider .mbr-table-cell {
			padding: 0;
		}

		.mbr-slider>.container .carousel-indicators {
			margin-bottom: 3px;
		}

		/* article slider */
		.mbr-slider>.article-slider .mbr-section,
		.mbr-slider>.article-slider .mbr-section .mbr-table-cell {
			padding-top: 0;
			padding-bottom: 0;
		}

		.modal-backdrop.show {
			opacity: .7;
		}

		.video-container .mbr-background-video iframe {
			width: 100%;
			height: 100%;
		}

		.mbr-gallery-item__hided {
			position: absolute !important;
			left: 0 !important;
			width: 0 !important;
			height: 0;
			padding: 0 !important;
		}

		.mbr-gallery-item__hided img {
			display: none !important;
		}

		.mbr-gallery-item__hided span {
			display: none !important;
		}

		.mbr-gallery-filter {
			padding-top: 30px;
			padding-bottom: 30px;
			text-align: center;
		}

		.mbr-gallery-filter li {
			display: inline-block;
			padding: 5px 0;
			transition: all .3s ease-out;
		}

		.mbr-gallery-filter li .btn {
			cursor: pointer;
		}

		.mbr-gallery-filter.gallery-filter__bg li {
			color: #fff;
		}

		.mbr-gallery-filter.gallery-filter__bg .active {
			color: #000;
			background-color: #fff;
		}

		.mbr-gallery-filter ul {
			display: inline-block;
			width: 100%;
			padding-left: 0;
			margin-bottom: 0;
			list-style: none;
		}

		.mbr-gallery-item>div {
			position: relative;
		}

		.mbr-gallery-item--p1 {
			padding: 0.5rem;
		}

		.mbr-gallery-item--p2 {
			padding: 1rem;
		}

		.mbr-gallery-item--p3 {
			padding: 1.5rem;
		}

		.mbr-gallery-item--p4 {
			padding: 2rem;
		}

		.mbr-gallery-item--p5 {
			padding: 2.5rem;
		}

		.mbr-gallery-item--p6 {
			padding: 3rem;
		}

		.mbr-gallery .mbr-gallery-item--p4 {
			width: 33.333%;
		}

		.mbr-gallery .mbr-gallery-item--p6,
		.mbr-gallery .mbr-gallery-item--p5 {
			width: 50%;
		}

		@media (max-width: 992px) {
			.mbr-gallery-item--p1 {
				padding: 0.5rem;
			}

			.mbr-gallery-item--p2 {
				padding: 0.8rem;
			}

			.mbr-gallery-item--p3 {
				padding: 1rem;
			}

			.mbr-gallery-item--p4 {
				padding: 1.5rem;
			}

			.mbr-gallery-item--p5 {
				padding: 1.8rem;
			}

			.mbr-gallery-item--p6 {
				padding: 2rem;
			}

			.mbr-gallery .mbr-gallery-item--p2,
			.mbr-gallery .mbr-gallery-item--p3 {
				width: 50%;
			}

			.mbr-gallery .mbr-gallery-item--p6,
			.mbr-gallery .mbr-gallery-item--p5,
			.mbr-gallery .mbr-gallery-item--p4 {
				width: 100%;
			}
		}

		@media (max-width: 400px) {

			.mbr-gallery .mbr-gallery-item--p3,
			.mbr-gallery .mbr-gallery-item--p2,
			.mbr-gallery .mbr-gallery-item--p1 {
				width: 100%;
			}
		}

		/*# sourceMappingURL=style.css.map */
	</style>
</head>

<body>
	<header id="header">
		<div class="header-top">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-sm-6 col-6 header-top-right">
						<div class="header-social">

							<br>
							<!-- <a href="<?php echo base_url('admin/auth') ?>"><i class="fa fa-user"></i></a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container main-menu">
			<div class="row align-items-center justify-content-between d-flex">
				<div id="logo">
					<a href="<?php echo base_url('pengguna/dashboard') ?>"><img src="<?php echo base_url('assets/assets_pengguna') ?>/img/vl.png" alt="" title="" /></a>
				</div>
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li><a href="<?php echo base_url('pengguna/dashboard') ?>">Beranda</a></li>
						<li><a href="<?php echo base_url('pengguna/wisata') ?>">Wisata</a></li>
						<li><a href="<?php echo base_url('pengguna/kuliner') ?>">Kuliner</a></li>
						<li><a href="<?php echo base_url('pengguna/penginapan') ?>">Penginapan</a></li>
						<li><a href="<?php echo base_url('pengguna/peta_wilayah') ?>">Peta Wilayah</a></li>
						<li><a href="<?php echo base_url('pengguna/berita') ?>">Berita</a></li>
						<li><a href="<?php echo base_url('pengguna/kontak') ?>">Kontak</a></li>
						<?php if ($this->session->userdata('login_status') != TRUE) { ?>
							<li><a href="<?php echo base_url('pengguna/login') ?>">Login</a></li>
						<?php } else { ?>
							<li><a href="<?php echo base_url('pengguna/login/profil') ?>">Profile</a></li>
						<?php  } ?>

						
					</ul>
				</nav><!-- #nav-menu-container -->
			</div>
		</div>
	</header><!-- #header -->
</body>

</html>