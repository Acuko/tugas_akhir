<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Like</h1>
		</div>
		<button class="btn btn-primary" onclick="wisata()">Like Wisata</button>
		<button class="btn btn-warning" onclick="kuliner();">Like Kuliner</button>
		<button class="btn btn-success" onclick="penginapan()">Like Penginapan</button>
		<hr>
		<?php if ($this->session->flashdata('success')) : ?>
			<br>
			<div class="alert alert-success" role="alert">
				<i class="text-white fas fa-times p-1"></i>

				<?php echo $this->session->flashdata('success');
				?>
			</div>
		<?php endif; ?>
		<!-- wisata -->
		<div class="wisata">
		<b>Wisata</b>
		<table class="table table-hover " id="example">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Like</th>
					<th>User</th>
					<th>Like</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($likew as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->nama_wisata ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->nama ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->jumlah_like ?></td>

						<td class="text-center align-middle">
							<a href="<?php echo base_url('data_like/hapus/') . $mb->id  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		<!-- penginapan -->
		<div class="penginapan">
		<b>Penginapan</b>
		<table class="table table-hover " id="example1">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Like</th>
					<th>User</th>
					<th>Like</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($likep as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->nama_wisata ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->nama ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->jumlah_like ?></td>

						<td class="text-center align-middle">
							<a href="<?php echo base_url('data_like/hapus/') . $mb->id  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		<!-- kuliner  -->
		<div class="kuliner">
		<b>Kuliner</b>
		<table class="table table-hover " id="example2">
			<thead>
				<tr>
					<th>No</th>
					<th>Jenis Like</th>
					<th>User</th>
					<th>Like</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($likek as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->nama_wisata ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->nama ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->jumlah_like ?></td>

						<td class="text-center align-middle">
							<a href="<?php echo base_url('data_like/hapus/') . $mb->id  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		</div>
	</section>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".kuliner").hide()
		$(".penginapan").hide()

	});

	function wisata() {
		$(".wisata").show()
		$(".kuliner").hide()
		$(".penginapan").hide()
	}

	function kuliner() {
		$(".wisata").hide()
		$(".kuliner").show()
		$(".penginapan").hide()
	}

	function penginapan() {
		$(".wisata").hide()
		$(".kuliner").hide()
		$(".penginapan").show()
	}
</script>