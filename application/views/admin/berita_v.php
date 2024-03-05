<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Data berita</h1>
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
					<th>Foto</th>
					<th>Judul</th>
					<th>Created By</th>

					<th width="150px">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no = 1;
				foreach ($berita as $mb) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td> <img width="50px " src="<?php echo base_url() . 'assets/upload/' . $mb->foto ?>"> </td>
						<td><?php echo $mb->judul ?></td>
						<td><?php echo $mb->inertedBy ?></td>
						<td>
							<a href="<?php echo base_url('berita/hapus/') . $mb->idBerita  ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editmodal" data-sdf="<?= $mb->idBerita  ?>" data-foto="<?= $mb->foto  ?>" data-judul="<?= $mb->judul  ?>" data-deskripsi="<?= $mb->deskripsi  ?>"><i class=" fas fa-edit"></i></button>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Berita</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>berita/saave" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="judul">Judul berita</label>
						<input type="text" name="judul" id="judul" placeholder="Nama judul" class="form-control" autocomplete="off" required>
					</div>
					<!-- <div class="form-group">
                        <label>Kategori</label>
                        <select name="kategori" class="form-control" id="" required>
                            <option value="">Pilih Kategori</option>
                            <?php
							foreach ($kategori as $key) {
							?>
                                <option value="<?= $key->idkategori ?>"><?= $key->namakategori  ?></option>
                            <?php } ?>
                        </select>
                        <?php echo form_error('kategori', '<div class="text-small text-danger">', '</div>') ?>
                    </div> -->
					<div class="form-group">
						<label for="Deskripsi">Deskripsi</label>
						<textarea type="" id="summernote2" name="deskripsi" class="form-control deskripsi"></textarea>
					</div>
					<div class="form-group">
						<label for="Deskripsi">Foto</label>
						<input type="file" name="gambar" id="foto" class="form-control">
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
				<h5 class="modal-title" id="exampleModalLabel">Edit Berita</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('') ?>berita/update" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="judul">Judul berita</label>
						<input type="text" name="judul" id="judul" placeholder="Nama judul" class="form-control">
						<input type="hidden" name="id" id="sdf">
					</div>
					<div class="form-group">
						<label for="Deskripsi">Deskripsi</label>
						<textarea type="" id="summernote" name="deskripsi" class="form-control deskripsi"></textarea>
					</div>
					<div class="form-group">
						<label for="Deskripsi">Foto</label>
						<input type="hidden" name="foto_old" id="foto_old" class="form-control">
						<input type="file" name="gambar" id="foto" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Update changes</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#editmodal').on('show.bs.modal', function(event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('sdf') // Button that triggered the modal
			var judul = button.data('judul') // Button that triggered the modal
			var deskripsi = button.data('deskripsi') // Button that triggered the modal
			var foto = button.data('foto') // Extract info from data-* attributes
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('#sdf').val(id)
			modal.find('#judul').val(judul)
			// modal.find('.deskripsi').val(deskripsi)
			modal.find('#foto_old').val(foto)
			$("#summernote").summernote('pasteHTML', deskripsi);
		})
		$(function() {
			$(".alert").hide(3000);
		})
	});
</script>
