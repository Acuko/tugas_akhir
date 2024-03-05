 <div class="main-content">
 	<section class="section">
 		<div class="section-header">
 			<h1>Update Kuliner</h1>
 		</div>

 		<div class="card">
 			<div class="card-body">

 				<?php foreach ($kuliner as $mb) : ?>
 					<form method="POST" action="<?php echo base_url('data_kuliner/update_kuliner_aksi') ?>" enctype="multipart/form-data">
 						<div class="row">
 							<div class=" col-md-12">
 								<input type="hidden" name="id_kuliner" class="form-control" value=" <?php echo $mb->id_kuliner ?> ">

 								<div class="form-group">
 									<label>Nama Kuliner</label>
 									<input type="text" name="nama_kuliner" class="form-control" value=" <?php echo $mb->nama_kuliner ?> ">
 									<?php echo form_error('nama_kuliner', '<div class="text-small text-danger">', '</div>') ?>
 								</div>

 								<div class="form-group">
 									<label>Alamat</label>
 									<input type="text" name="alamat" class="form-control" value=" <?php echo $mb->alamat ?> ">
 									<?php echo form_error('alamat', '<div class="text-small text-danger">', '</div>') ?>
 								</div>

 								<div class="form-group">
 									<label>Latitude</label>
 									<input type="text" name="latitude" class="form-control" value=" <?php echo $mb->latitude ?> ">
 									<?php echo form_error('latitude', '<div class="text-small text-danger">', '</div>') ?>
 								</div>

 								<div class="form-group">
 									<label>Longitude</label>
 									<input type="text" name="longitude" class="form-control" value=" <?php echo $mb->longitude ?> ">
 									<?php echo form_error('longitude', '<div class="text-small text-danger">', '</div>') ?>
 								</div>
 								<div class="form-group">
 									<label>Kategori</label>
 									<select name="kategori" class="form-control" id="" required>
 										<option value="">Pilih Kategori</option>
 										<?php
											foreach ($kategori as $key) {
											?>
 											<option value="<?= $key->idkategori ?>" <?= $key->idkategori == $mb->idkategori ? "selected" : "" ?>><?= $key->namakategori  ?></option>
 										<?php } ?>
 									</select>
 									<?php echo form_error('kategori', '<div class="text-small text-danger">', '</div>') ?>
 								</div>
 								<div class="form-group">
 									<label>Gambar</label>
 									<input type="file" name="gambar" class="form-control" value=" <?php echo $mb->gambar ?> ">
 								</div>

 								<div class="form-group">
 									<label>Deskripsi</label>
 									<textarea type="" id="summernote" name="deskripsi" class="form-control"><?php echo $mb->deskripsi ?></textarea>
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
