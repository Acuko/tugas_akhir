<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data User</h1>
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
					<th>nama</th>
					<th>email</th>
					<th>password</th>
					<th>nohp</th>
					<th>alamat</th>
					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($useru as $mb) : ?>
					<tr>
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $mb->nama ?></td>
						<td class="align-middle"><?php echo $mb->email ?></td>
						<td class="align-middle text-uppercase">*****</td>
						<td class="align-middle text-uppercase"><?php echo $mb->nohp ?></td>
						<td class="align-middle"><?php echo $mb->alamat ?></td>
						<td class="text-center align-middle">
							<a href="<?php echo base_url('data_user/hapus/') . $mb->id ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
							<button  type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editmodal" 
							data-idu="<?= $mb->id ?>"
							data-nama="<?= $mb->nama ?>"
							data-email="<?= $mb->email ?>"
							data-nohp="<?= $mb->nohp ?>"
							data-alamat="<?= $mb->alamat ?>"
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>data_user/saave" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="user">Nama user</label>
						<input type="text" name="nama" id="user" placeholder="Nama User" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="Email" name="email" id="email" placeholder="email@email.co" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="Password" name="password" id="password" placeholder="******" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="nohp">No HP</label>
						<input type="number" name="nohp" id="nohp" placeholder="08232323232" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
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
				<h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>data_user/update" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="user">Nama user</label>
						<input type="text" name="nama" id="nama" placeholder="Nama User" class="form-control" autocomplete="off" required>
						<input type="hidden" name="idu" id="idu" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="Email" name="email" id="email" placeholder="email@email.co" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="nohp">No HP</label>
						<input type="number" name="nohp" id="nohp" placeholder="08232323232" class="form-control" autocomplete="off" required>
					</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
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
			var idu = button.data('idu') // Button that triggered the modal
			var nama = button.data('nama') // Button that triggered the modal
			var email = button.data('email') // Extract info from data-* attributes
			var nohp = button.data('nohp') // Extract info from data-* attributes
			var alamat = button.data('alamat') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('#idu').val(idu)
			modal.find('#nama').val(nama)
			modal.find('#email').val(email)
			modal.find('#nohp').val(nohp)
			modal.find('#alamat').val(alamat)
		})
		$(function() {

			$(".alert").hide(3000);


		})
	});
</script>
