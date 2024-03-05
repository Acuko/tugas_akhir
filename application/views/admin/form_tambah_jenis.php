  <div class="main-content">
  	<section class="section">
  		<div class="section-header">
  			<h1>Form Tambah Jenis</h1>
  		</div>

  		<div class="card">
  			<div class="card-body">
  				<form method="POST" action="<?php echo base_url('jenis/tambah_jenis_aksi') ?>" enctype="multipart/form-data">
  					<div class="row">
  						<div class=" col-md-12">

  							<div class="form-group">
  								<label>Nama Jenis</label>
  								<input type="text" name="nama_jenis" class="form-control" autocomplete="off">
  								<?php echo form_error('nama_jenis', '<div class="text-small text-danger">', '</div>') ?>
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
