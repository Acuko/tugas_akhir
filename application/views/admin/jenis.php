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
 			<h1>Data Jenis</h1>
 		</div>

 		<a href="<?php echo base_url('jenis/tambah_jenis') ?>" class="btn btn-primary mb-3">Tambah Data</a>
 		<?php echo $this->session->flashdata('pesan', 'Data Berhasil Ditambahkan') ?>
 		<table class="table table-hover table-striped table-borderd">
 			<thead>
 				<tr>
 					<th>No</th>
 					<th>Nama Jenis</th>

 					<th width="150px">Aksi</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php
					$no = 1;
					foreach ($jenis as $mb) : ?>
 					<tr>
 						<td><?php echo $no++ ?></td>
 						<td><?php echo $mb->nama_jenis ?></td>

 						<td>
 							<a href="<?php echo base_url('jenis/delete_jenis/') . $mb->id_jenis ?>" class="btn btn-sm btn-danger"><i class=" fas fa-trash"></i></a>
 							<a href="<?php echo base_url('jenis/update_jenis/') . $mb->id_jenis ?>" class="btn btn-sm btn-primary"><i class=" fas fa-edit"></i></a>
 						</td>
 					</tr>
 				<?php endforeach; ?>
 			</tbody>
 		</table>
 		<?= $this->pagination->create_links(); ?>



 	</section>
 </div>
