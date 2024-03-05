<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->

    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Visit Lebak</title>


    <link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_pengguna') ?>/css/main.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
<script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

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
                            <li><a href="<?php echo base_url('pengguna/login/logout') ?>">Logout</a></li>
                        <?php  } ?>
                    </ul>
                </nav><!-- #nav-menu-container -->
            </div>
        </div>
    </header><!-- #header -->



    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Direction Peta Wilayah
                    </h1>
                    <p class="text-white link-nav"><a href="<?php echo base_url('pengguna/dashboard') ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="<?php echo base_url('pengguna/peta_wilayah') ?>"> Peta Wilayah</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
   <div id="map" style="height: 400px;"></div>

    <!-- peta wilayah -->

    <script type="text/javascript">
        var map = L.map('map').setView([0, 0], 13); // Default to center of the map

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // Update the map center to the user's location
            map.setView([latitude, longitude], 13);

            // Define your route coordinates (user's location as the starting point)
            var routeCoordinates = [
                [latitude, longitude],
                [<?= $peta->latitude ?>, <?= $peta->longitude ?>]
            ];

            L.Routing.control({
                waypoints: [
                    L.latLng(latitude, longitude),
                    L.latLng(<?= $peta->latitude ?>, <?= $peta->longitude ?>)
                ]
            }).addTo(map);
            // Create a Polyline and add it to the map
            // L.polyline(routeCoordinates, {
            //     color: 'red'
            // }).addTo(map);


            // Define the starting and ending points as markers
            var startMarker = L.marker(routeCoordinates[0]).addTo(map);
            var endMarker = L.marker(routeCoordinates[routeCoordinates.length - 1]).addTo(map);

            // Bind popups to the markers
            startMarker.bindPopup('Your Location').openPopup();
            endMarker.bindPopup('Destination').openPopup();
        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    alert("User denied the request for Geolocation.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("Location information is unavailable.");
                    break;
                case error.TIMEOUT:
                    alert("The request to get user location timed out.");
                    break;
                case error.UNKNOWN_ERROR:
                    alert("An unknown error occurred.");
                    break;
            }
        }

        // Get user's location when the page loads
        getLocation();
    </script>