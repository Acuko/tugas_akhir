			   <!-- start banner Area -->
			   <section class="about-banner relative">
			   	<div class="overlay overlay-bg"></div>
			   	<div class="container">
			   		<div class="row d-flex align-items-center justify-content-center">
			   			<div class="about-content col-lg-12">
			   				<h1 class="text-white">
			   					Peta Wilayah
			   				</h1>
			   				<p class="text-white link-nav"><a href="<?php echo base_url('pengguna/dashboard') ?>">Beranda </a> <span class="lnr lnr-arrow-right"></span> <a href="#"> Peta Wilayah</a></p>
			   			</div>
			   		</div>
			   	</div>
			   </section>
			   <!-- End banner Area -->


			   <!-- peta wilayah -->

			   <section class="section-gap ">
			   	<div class="container">
			   		<div class="row">
			   			<!-- <h5>Wilayah Peta Wisata</h5> -->
			   			<div id="peta" style="width: 1200px; height: 500px;"></div>
			   			<script type="text/javascript">
			   				var center = [
			   					-6.688278, 106.171194
			   				];

			   				//Open Street Map
			   				var osm = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
			   					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			   						'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
			   					id: 'mapbox/streets-v11',
			   				})

			   				//google map
			   				googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
			   					maxZoom: 16,
			   					subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
			   				});

			   				//ersri map
			   				var Esri_NatGeoWorldMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/NatGeo_World_Map/MapServer/tile/{z}/{y}/{x}', {
			   					attribution: 'Tiles &copy; Esri &mdash; National Geographic, Esri, DeLorme, NAVTEQ, UNEP-WCMC, USGS, NASA, ESA, METI, NRCAN, GEBCO, NOAA, iPC',
			   					maxZoom: 16
			   				});

			   				var map = L.map('peta', {
			   					layers: [googleStreets],
			   					center: center,
			   					zoom: 11,
			   					zoomControl: false,
			   				});

			   				var baseTree = {
			   					label: 'BaseLayers',
			   					noShow: true,
			   					children: [{
			   						label: 'Jenis Peta',
			   						children: [{
			   								label: 'Default',
			   								layer: osm
			   							},
			   							{
			   								label: 'Google',
			   								layer: googleStreets
			   							},
			   							{
			   								label: 'Nat Geo World',
			   								layer: Esri_NatGeoWorldMap
			   							},
			   						]
			   					}, ]
			   				};

			   				var ctl = L.control.layers.tree(baseTree, null, {
			   					namedToggle: true,
			   					collapseAll: 'Tutup Semua',
			   					expandAll: 'Tampilkan Semua',
			   					collapsed: false,
			   				});

			   				ctl.addTo(map).collapseTree().expandSelected();

			   				var hasAllUnSelected = function() {
			   					return function(ev, domNode, treeNode, map) {
			   						var anySelected = true;

			   						function iterate(node) {
			   							if (node.layer && !node.radioGroup) {
			   								anySelected = anySelected || map.hasLayer(node.layer);
			   							}
			   							if (node.children && !anySelected) {
			   								node.children.forEach(function(element) {
			   									iterate(element);
			   								});
			   							}
			   						}
			   						iterate(treeNode);
			   						return !anySelected;
			   					};
			   				};

			   				var dataJsons = [
			   					<?php foreach ($kecamatan as $kec) : ?> {
			   							data: <?= json_decode(json_encode(file_get_contents(base_url('kecLebak/') . $kec->geojson), true), true); ?>,
			   							warna: "<?= $kec->warna; ?>"
			   						},
			   					<?php endforeach ?>
			   				];

			   				var jsonVar = L.geoJson(null, {});

			   				function loopAddGJson(_callback) {
			   					for (let i = 0; i < dataJsons.length; i++) {
			   						jsonVar.addData(dataJsons[i].data, {
			   							style: function(feature) {
			   								return {
			   									opacity: 0.2,
			   									color: dataJsons[i].warna,
			   									fillOpacity: 1.0,
			   									fillColor: dataJsons[i].warna,
			   								}
			   							},
			   						});
			   					}
			   					_callback();
			   				}

			   				function renderSection() {
			   					loopAddGJson(function() {
			   						geoList = new L.Control.GeoJSONSelector(jsonVar, {
			   							zoomToLayer: true,
			   							listDisabled: true,
			   							activeListFromLayer: true,
			   							activeLayerFromList: true,
			   							listOnlyVisibleLayers: true
			   						}).addTo(map);

			   						geoList.on('selector:change', function(e) {
			   							var jsonObj = $.parseJSON(JSON.stringify(e.layers[0].feature.properties));
			   							var html = 'Selection:<br /><table border="1">';
			   							$.each(jsonObj, function(key, value) {
			   								html += '<tr>';
			   								html += '<td>' + key.replace(":", " ") + '</td>';
			   								html += '<td>' + value + '</td>';
			   								html += '</tr>';
			   							});
			   							html += '</table>';

			   							$('.selection').html(html);
			   						});

			   						// map.addControl(function() {
			   						// 	var c = new L.Control({
			   						// 		position: 'bottomleft'
			   						// 	});
			   						// 	c.onAdd = function(map) {
			   						// 		return L.DomUtil.create('pre', 'selection');
			   						// 	};
			   						// 	return c;
			   						// }());
			   					});
			   					console.log("Done");
			   				}
			   				renderSection();

			   				<?php
								$CI = &get_instance();
								$CI->load->model('rental_model');
								$CI->load->model('jenis_m');

								$jenis = $this->jenis_m->getal();
								?>

			   				var markers = {
			   					label: 'baseLayerKategori',
			   					noShow: true,
			   					children: [
			   						<?php foreach ($jenis as $j) { ?> {
			   								label: '<?= $j->nama_jenis; ?>',
			   								selectAllCheckbox: true,
			   								children: [
			   									<?php
													$kategori = $this->rental_model->maps_where_kategori($j->id_jenis);
													foreach ($kategori as $k) {
														if ($k->jenis == '1') {
															$sub_category = $this->rental_model->maps_wisata($k->idkategori);
														} else if ($k->jenis == '2') {
															$sub_category = $this->rental_model->maps_kuliner($k->idkategori);
														} else if ($k->jenis == '3') {
															$sub_category = $this->rental_model->maps_penginapan($k->idkategori);
														} else if ($k->jenis == '4') {
															$sub_category = $this->rental_model->maps_spbu($k->idkategori);
														} else if ($k->jenis == '5') {
															$sub_category = $this->rental_model->maps_atm($k->idkategori);
														}
													?> {
			   											label: '<?= $k->namakategori; ?> <img width="25px " src="<?php echo base_url() . 'assets/icon/' . $k->icon ?>">',
			   											layer: new L.LayerGroup([
			   												<?php
																foreach ($sub_category as $sc) {
																?>
			   													L.marker([<?= $sc->latitude ?>, <?= $sc->longitude ?>], {
			   														icon: L.icon({
			   															iconUrl: '<?= base_url('assets/icon/') . $k->icon ?>',
			   															iconSize: [15, 22],
			   														})
			   													}).bindPopup("<div class='row'><div class='col-md-12'> <b> <?= $sc-> nama_wisata , $sc-> nama_kuliner , $sc-> nama_penginapan , $sc-> nama_spbu , $sc-> nama_atm ?> </b> <p class='text-justify'><?= $sc->alamat ?><a class='btn btn-primary btn-small btn-block text-white' href='peta_wilayah/direction/<?=$sc->id?>/<?=$sc->jenis?>'><i class='fas fa-directions'></i> Direction</a> </p></div></div>", {
																																					// 	echo substr($sc->deskripsi, 0, 50) . '...';
																																					// } else {
																																					// 	echo $sc->deskripsi;
																																					// }  ?>  </p></div></div>", {
			   														maxWidth: 160
			   													}),
			   												<?php } ?>
			   											]),
			   										},
			   									<?php } ?>
			   								],
			   							},
			   						<?php } ?>
			   					],
			   				};

			   				var makePopups = function(node) {
			   					if (node.layer) {
			   						node.layer.bindPopup(node.label);
			   					}
			   					if (node.children) {
			   						node.children.forEach(function(element) {
			   							makePopups(element);
			   						});
			   					}
			   				};
			   				makePopups(markers);

			   				ctl
			   					.setOverlayTree(markers)
			   					.collapseTree(true)
			   					.expandSelected(true);
			   			</script>
			   			
			   		</div>
			   	</div>
			   </section>