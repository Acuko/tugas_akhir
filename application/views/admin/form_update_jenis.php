  <div class="main-content">
  	<section class="section">
  		<div class="section-header">
  			<h1>Update Jenis</h1>
  		</div>

  		<div class="card">
  			<div class="card-body">

  				<?php foreach ($jenis as $mb) : ?>
  					<form method="POST" action="<?php echo base_url('jenis/update_jenis_aksi') ?>" enctype="multipart/form-data">
  						<div class="row">
  							<div class=" col-md-12">
  								<input type="hidden" name="id_jenis" class="form-control" value=" <?php echo $mb->id_jenis ?> ">

  								<div class="form-group">
  									<label>Nama Jenis</label>
  									<input type="text" name="nama_jenis" class="form-control" value=" <?php echo $mb->nama_jenis ?> ">
  									<?php echo form_error('nama_jenis', '<div class="text-small text-danger">', '</div>') ?>
  								</div>

  								<button type="submit" class="btn btn-primary mt-4">Simpan</button>
  								<button type="submit" class="btn btn-danger mt-4 ">Reset</button>
  							</div>
  						</div>
  					</form>
  				<?php endforeach; ?>
  			</div>
  		</div>
  	</section>
  </div>
