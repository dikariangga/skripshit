<?php include('inc_admin_atas.php'); ?>

<h3>Data Kelas</h3>

<?php include('inc_admin_pesan.php'); ?>

<hr>

<table border="0" class="table table-striped">
<?php /* sesuaikan nama field dengan label yang ingin ditampilkan */ ?>
	<tr>
		<th>No.</th>
		<th>Kode Kelas</th>
		<th>Nama Kelas</th>
		<th>Kapasitas</th>
		<th colspan="2">Aksi</th>
	</tr>

	<?php
	/* jika data masih kosong */
	if ($kelas->num_rows() == 0) {
	?>
	<tr>
		<td colspan="8">Maaf, belum ada Data Kelas</td>
	</tr>
	<?php
	/* jika data sudah ada */
	} else {
		foreach ($kelas->result() as $row) {
			$no++;
	?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row->kodekelas_nama; ?></td>
				<td><?php echo $row->kelas_nama; ?></td>
				<td><?php echo $row->kelas_kapasitas; ?></td>
				<td>
					<a href="<?php echo base_url().'kelas/index/ubahdata/'.$row->id_kelas; ?>" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Perbarui</a>
				
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Modal<?php echo $row->id_kelas; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</button>

					<!-- Modal 1 -->
					<div class="modal fade" id="Modal<?php echo $row->id_kelas; ?>" role="dialog">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Tutup"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Notifikasi</h4>
								</div>
								<div class="modal-body">
									Apakah Anda Ingin Menghapus Kelas "<?php echo $row->kelas_nama; ?>" ?
								</div>
								<div class="modal-footer">
									<a href="<?php echo base_url().'kelas/updatestatus/'.$row->id_kelas;?>/0" class="btn btn-primary">Ya</a>
									<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
								</div>
							</div>
						</div>
					</div>
				</td>
			</tr>
		<?php
		} // end foreach
	} // end if kelas
	?>
</table>
<hr>
<div class="row">
	<div class="col-md-2">
		<a class="btn btn-default" href="<?php echo base_url().'kelas';?>"><span class="glyphicon glyphicon-plus"></span> Tambah Kelas</a>
	</div>
	<div class="col-sm-4" align="right"><?php echo $pagination; ?></div>
</div>

<?php include('inc_admin_bawah.php'); ?>