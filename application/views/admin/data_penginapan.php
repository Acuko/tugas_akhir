 <style>
 	.modal-backdrop {
 		position: none;
 		top: 0;
 		left: 0;
 		z-index: -1040;
 		width: 0;
 		height: 0;
 		background-color: none;
 	}
 </style>
 <div class="main-content">
 	<section class="section">
 		<div class="section-header">
 			<h1>Data Penginapan</h1>
 		</div>

 		<a href="<?php echo base_url('data_penginapan/tambah_penginapan') ?>" class="btn btn-primary mb-3">Tambah Data</a>
 		<button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#exampleModal">
 			Import Excell
 		</button>
 		<?php echo $this->session->flashdata('pesan', 'Data Berhasil Ditambahkan') ?>
 		<table class="table table-hover table-striped table-borderd">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Gambar</th>
 					<th>Nama Penginapan</th>
 					<th>Alamat</th>
 					<th>Latitude</th>
 					<th>Longitude</th>
 					<th width="150px">Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php
					$no = 1;
					foreach ($penginapan as $mb) : ?>
 					<tr>
 						<td><?php echo $no++ ?></td>
 						<td>
 							<img width="50px " src="<?php echo base_url() . 'assets/upload/' . $mb->gambar ?>">
 						</td>
 						<td><?php echo $mb->nama_penginapan ?></td>
 						<td><?php echo $mb->alamat ?></td>
 						<td><?php echo $mb->latitude ?></td>
 						<td><?php echo $mb->longitude ?></td>

 						<td>
 							<a href="<?php echo base_url('data_penginapan/detail_penginapan/') . $mb->id_penginapan ?>" class="btn btn-sm btn-success"><i class=" fas fa-eye"></i></a>
 							<a href="<?php echo base_url('data_penginapan/delete_penginapan/') . $mb->id_penginapan ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
 							<a href="<?php echo base_url('data_penginapan/update_penginapan/') . $mb->id_penginapan ?>" class="btn btn-sm btn-primary"><i class=" fas fa-edit"></i></a>
 						</td>
 					</tr>
 				<?php endforeach; ?>
 			</tbody>
 		</table>
 		<?= $this->pagination->create_links(); ?>


 		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 			<div class="modal-dialog" role="document">
 				<div class="modal-content">
 					<div class="modal-header">
 						<h5 class="modal-title" id="exampleModalLabel">Import Excell</h5>
 						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
 							<span aria-hidden="true">&times;</span>
 						</button>
 					</div>
 					<form action="<?= base_url('data_penginapan/import_excel'); ?>" method="post" enctype="multipart/form-data">

 						<div class="modal-body">

 							<?php if (!empty($this->session->flashdata('status'))) { ?>
 								<div class="alert alert-info" role="alert"><?= $this->session->flashdata('status'); ?></div>
 							<?php } ?>
 							<div class="form-group">
 								<label>Pilih File Excel</label>
 								<input type="file" name="fileExcel">
 							</div>

 						</div>
 						<div class="modal-footer">
 							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 							<button class='btn btn-success' type="submit">
 								<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
 								Import
 							</button>
 						</div>
 					</form>
 				</div>
 			</div>
 		</div>
 	</section>
 </div>
