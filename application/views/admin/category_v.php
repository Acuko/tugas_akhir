<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data Kategori</h1>
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Tambah Data
		</button>
		<hr>
		<?php if ($this->session->flashdata('success')) : ?>
			<br>
			<div class="alert alert-success" role="alert">
				<i class="text-white fas fa-times p-1"></i>

				<?php echo $this->session->flashdata('success');
				?>
			</div>
		<?php endif; ?>
		<table class="table table-hover " id="example">
			<thead>
				<tr>
					<th>No</th>
					<th>Kategori</th>
					<th>Jenis</th>
					<th>Icon</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($kategori as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->namakategori ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->nama_jenis ?></td>
						<td class="align-middle text-center">
							<img width="50px " src="<?php echo base_url() . 'assets/icon/' . $mb->icon ?>">
						</td>
						<td class="text-center align-middle">
							<a href="<?php echo base_url('kategory/hapus/') . $mb->idkategori  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal" data-id="<?= $mb->idkategori  ?>" data-nama="<?= $mb->namakategori  ?>" data-jenis="<?= $mb->jenis  ?>" data-icon="<?= $mb->icon  ?>"><i class=" fas fa-edit"></i> </button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambah Kategory</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>kategory/saave" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="kategori">Nama Kategori</label>
						<input type="text" name="nama" id="kategori" placeholder="Nama Kategori" class="form-control" autocomplete="off" required>
					</div>

					<div class="form-group">
						<label for="jenis">Jenis</label>
						<select name="jenis" class="form-control" id="" required>
							<option value="">Pilih Jenis</option>
							<?php
							foreach ($jenis as $key) {
							?>
								<option value="<?= $key->id_jenis ?>"><?= $key->nama_jenis  ?></option>
							<?php } ?>
						</select>
						<?php echo form_error('jenis', '<div class="text-small text-danger">', '</div>') ?>
					</div>

					<div class="form-group">
						<label for="icon">Icon</label>
						<input type="file" name="icon" id="icon" class="form-control" required>
						<?php echo form_error('icon', '<div class="text-small text-danger">', '</div>') ?>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit Kategory</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>kategory/Update" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="nama">Nama Kategori</label>
						<input type="hidden" name="id" id="id">
						<input type="text" name="nama" id="nama" placeholder="Nama Kategori" class="form-control" required>
					</div>

					<div class="form-group">
						<label for="jeniss">Jenis</label>
						<select name="jenis" id="jeniss" class="form-control" required>
							<option value="">Pilih Kategori</option>
							<?php
							foreach ($jenis as $key) {
							?>
								<option value="<?= $key->id_jenis ?>"><?= $key->nama_jenis  ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="icon">Icon</label>
						<input type="file" name="icon" id="icon" class="form-control">
						<input type="hidden" name="foto_old" id="foto_old" class="form-control">
						<?php echo form_error('icon', '<div class="text-small text-danger">', '</div>') ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Update changes</button>
					</div>
			</form>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#editmodal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('id') // Button that triggered the modal
			var nama = button.data('nama') // Button that triggered the modal
			var jenis = button.data('jenis') // Extract info from data-* attributes
			var icon = button.data('icon') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('#id').val(id)
			modal.find('#nama').val(nama)
			modal.find('#jeniss').val(jenis)
			modal.find('#foto_old').val(icon)
		})
		$(function() {

			$(".alert").hide(3000);


		})
	});
</script>
