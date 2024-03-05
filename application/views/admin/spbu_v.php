<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data spbu</h1>
		</div>
		<a href="<?php echo base_url('data_spbu/tambah_spbu') ?>" class="btn btn-primary mb-3">Tambah Data</a>
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
					<th>Nama spbu</th>
					<th>Alamat</th>
					<th>Gambar</th>
					<th>Deskripsi</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($spbuu as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->nama_spbu ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->alamat ?></td>
						<td class="align-middle">
						<img width="50px " src="<?php echo base_url() . 'assets/upload/' . $mb->gambar ?>">

						</td>
						<td class="align-middle text-uppercase"><?php echo $mb->deskripsi ?></td>
						
						<td class="text-center align-middle">
						<button  type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#viewmodal" 
							data-nama="<?= $mb->nama_spbu ?>"
							data-alamat="<?= $mb->alamat ?>"
							data-gambar="<?= $mb->gambar ?>"
							data-deskripsi="<?= $mb->deskripsi ?>"
							> <i class=" fas fa-eye"></i></button>
							<a href="<?php echo base_url('data_spbu/hapus/') . $mb->id_spbu  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
							<button  type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal" 
							data-ids="<?= $mb->id_spbu ?>"
							data-nama="<?= $mb->nama_spbu ?>"
							data-alamat="<?= $mb->alamat ?>"
							data-gambar="<?= $mb->gambar ?>"
							> <i class=" fas fa-edit"></i></button>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>


<!--Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit SPBU</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>data_spbu/update" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="user">Nama SPBU</label>
						<input type="text" name="nama" id="nama" placeholder="Nama User" class="form-control" autocomplete="off" required>
						<input type="hidden" name="" id="ids" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat"  class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="gambar">Gambar</label>
						<input type="file" name="gambar" id="gambars" class="form-control" autocomplete="off" required>
						<input type="hidden" name="ids" id="gambar" class="form-control" autocomplete="off" required>
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

<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Edit SPBU</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>data_spbu/update" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="user">Nama SPBU</label>
						<div id="namav"></div>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<div id="alamatv"></div>
					</div>
					<div class="form-group">
						<label for="gambar">Gambar</label>
						<div id="gambarv"></div>
					</div>
				
					<div class="form-group">
						<label for="gambar">Deskripsi</label>
						<div id="deskripsiv"></div>
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
<script type="text/javascript">
	$(document).ready(function() {
		$('#editmodal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var ids = button.data('ids') // Button that triggered the modal
			var nama = button.data('nama') // Button that triggered the modal
			var alamat = button.data('alamat') // Extract info from data-* attributes
			var gambar = button.data('gambar') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		
			var modal = $(this)
			modal.find('#ids').val(ids)
			modal.find('#nama').val(nama)
			modal.find('#alamat').val(alamat)
			modal.find('#gambar').val(gambar)
		})

		$('#viewmodal').on('show.bs.modal', function(event) {
		
			var button = $(event.relatedTarget) // Button that triggered the modal
			var nama = button.data('nama') // Button that triggered the modal
			var alamat = button.data('alamat') // Extract info from data-* attributes
			var gambar = button.data('gambar') // Extract info from data-* attributes
			var deskripsi = button.data('deskripsi') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		
			var modal = $(this)
			modal.find('#namav').text(nama)
			modal.find('#alamatv').text(alamat)
			modal.find('#gambarv').html('<img width="50% " src="<?php echo base_url() . 'assets/upload/' ?>'+gambar+'"/>')
			modal.find('#deskripsiv').html(deskripsi)
		})
		$(function() {

			$(".alert").hide(3000);


		})
	});
</script>