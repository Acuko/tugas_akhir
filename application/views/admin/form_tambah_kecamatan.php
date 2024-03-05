  <div class="main-content">
  	<section class="section">
  		<div class="section-header">
  			<h1>Form Tambah Kecamatan</h1>
  		</div>

  		<div class="card">
  			<div class="card-body">
  				<form method="POST" action="<?php echo base_url('data_kecamatan/tambah_kecamatan_aksi') ?>" enctype="multipart/form-data">
  					<div class="row">
  						<div class=" col-md-12">

  							<div class="form-group">
  								<label>Nama Kecamatan</label>
  								<input type="text" name="nama_kecamatan" class="form-control" autocomplete="off">
  								<?php echo form_error('nama_kecamatan', '<div class="text-small text-danger">', '</div>') ?>
  							</div>

  							<div class="form-group">
  								<label>Warna</label>
  								<input type="text" name="warna" class="form-control" autocomplete="off">
  								<?php echo form_error('warna', '<div class="text-small text-danger">', '</div>') ?>
  							</div>

  							<div class="form-group">
  								<label>Geojson</label>
  								<input type="text" name="geojson" class="form-control" autocomplete="off">
  								<?php echo form_error('geojson ', '<div class="text-small text-danger">', '</div>') ?>
  							</div>

  							<button type="submit" class="btn btn-primary mt-4 ">Simpan</button>
  							<button type="submit" class="btn btn-danger mt-4 ">Reset</button>
  						</div>
  					</div>
  				</form>
  			</div>
  		</div>
  	</section>
  </div>
