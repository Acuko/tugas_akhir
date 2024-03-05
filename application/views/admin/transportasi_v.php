<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data transportasi</h1>
		</div>
		
		<button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary mb-3">Tambah Data</button>
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
					<th>Jenis transportasi</th>
					<th>Nama wisata</th>
					<th>Alamat wisata</th>
					<th>Waktu Tempuh</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($transportasiu as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->jenis_transportasi ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->nama_wisata ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->alamat ?></td>
						<td class="align-middle text-uppercase"><?php echo $mb->waktu ?></td>
						
						<td class="text-center align-middle">
							<a href="<?php echo base_url('data_transportasi/hapus/') . $mb->id  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
							<button  type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal" 
							data-idt="<?= $mb->id ?>"
							data-idw="<?= $mb->id_wisata ?>"
							data-jenist="<?= $mb->jenis_transportasi ?>"
							data-waktu="<?= $mb->waktu ?>"
							> <i class=" fas fa-edit"></i></button>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah transportasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>data_transportasi/saave" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="wisata">Wisata</label>
						<select name="idw" id="idw" class="form-control" >
							<option value="" selected disabled>Pilih Wisata</option>
							<?php
							foreach ($wisata as $key) {
							?>
								<option value="<?= $key->id_wisata ?>"><?= $key->nama_wisata  ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="jenis">Jenis Transportasi</label>
						<input type="text" name="jenis" id="jenis" placeholder="mobil" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="waktu">Waktu</label>
						<input type="text" name="waktu" id="waktu" placeholder="1h 30m" class="form-control" autocomplete="off" required>
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
				<h5 class="modal-title" id="exampleModalLabel">Edit transportasi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>data_transportasi/update" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="wisata">Wisata</label>
						<select name="idw" id="idw" class="form-control" >
							<option value="" selected disabled>Pilih Wisata</option>
							<?php
							foreach ($wisata as $key) {
							?>
								<option value="<?= $key->id_wisata ?>"><?= $key->nama_wisata  ?></option>
							<?php } ?>
						</select>
						<input type="hidden" name="idt" id="idt">
					</div>
					<div class="form-group">
						<label for="jenis">Jenis Transportasi</label>
						<input type="text" name="jenis" id="jenist" placeholder="mobil" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="waktu">Waktu</label>
						<input type="text" name="waktu" id="waktu" placeholder="1h 30m" class="form-control" autocomplete="off" required>
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

<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#editmodal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var idt = button.data('idt') // Button that triggered the modal
			var idw = button.data('idw') // Button that triggered the modal
			var jenist = button.data('jenist') // Button that triggered the modal
			var waktu = button.data('waktu') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('#idt').val(idt)
			modal.find('#idw').val(idw)
			modal.find('#jenist').val(jenist)
			modal.find('#waktu').val(waktu)
		})
		$(function() {

			$(".alert").hide(3000);


		})
	});
</script>
