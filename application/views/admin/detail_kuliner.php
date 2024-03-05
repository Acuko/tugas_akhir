<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Detail Kuliner</h1>
		</div>

	</section>

	<?php foreach ($detail as $dt) : ?>
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col-md-5">
						<img width="380px" src=" <?php echo base_url() . 'assets/upload/' . $dt->gambar ?> ">
					</div>
					<div class="col-md-7">
						<table class="table">
							<tr>
								<td>Nama Kuliner</td>
								<td><?php echo $dt->nama_kuliner ?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?php echo $dt->alamat ?></td>
							</tr>
							<tr>
								<td>Latitude</td>
								<td><?php echo $dt->latitude ?></td>
							</tr>
							<tr>
								<td>Longitude</td>
								<td><?php echo $dt->longitude ?></td>
							</tr>
							<tr>
								<td>Deskripsi</td>
								<td><?php echo $dt->deskripsi ?></td>
							</tr>
						</table>
						<a class="btn btn-sm btn-danger ml-4" href="<?php echo base_url('data_kuliner') ?>">Kembali</a>
						<a class="btn btn-sm btn-primary ml-3" href="<?php echo base_url('admin/data_kuliner/update_kuliner/' . $dt->id_kuliner) ?>">Update</a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<h5><b>Detail Gambar</b></h5>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<?php foreach ($gambar as $dt) : ?>
							<div class="col-md-4">
							<img width="200px" height="200px" src=" <?php echo base_url() . 'assets/upload/' . $dt->gambar ?> ">
						<br>
						<a href="<?php echo base_url('data_kuliner/delete_foto/') , $dt->id ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
							</div>
						<?php endforeach; ?>

					</div>
				</div>
				<div class="col-md-4">
					<form method="POST" action="<?php echo base_url('data_kuliner/tambah_gambar') ?>" enctype="multipart/form-data">

						<label for="">Upload Gambar</label>
						<input type="file" name="gambar" multiple id="gambar" class="form-control">
						<br>
						<input type="hidden" name="jenis" value="kuliner">
						<input type="hidden" name="idw" value="<?= $idw ?>">
						<button type="submit" class="btn btn-primary btn-block"> Upload</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>