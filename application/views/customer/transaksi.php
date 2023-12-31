<div class="container">
	<div class="card mx-auto" style="margin-top: 180px; margin-bottom: 50px; width: 92%">
		
		<div class="card-header">
			Data Transaksi Anda
		</div>
		<span class="mt-2 p-2"><?php echo $this->session->flashdata('pesan') ?></span>
		<div class="card-body">
			<table class="table table-bordered table-striped table-responsive">
				
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Harga/hari</th>
					<th>Denda/hari</th>
					<th>Tanggal Sewa</th>
					<th>Tanggal Selesai</th>
					<th>Action</th>
					<!-- <th>Batal</th> -->
				</tr>

				<?php $no = 1; foreach($transaksi as $tr) : ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $tr->merk ?></td>
						<td><?php echo $tr->no_plat ?></td>
						<td><?php echo number_format($tr->harga,0,',','.')?></td>
						<td><?php echo number_format($tr->denda,0,',','.')?></td>
						<td><?php echo date('d/m/Y', strtotime($tr->tanggal_rental)); ?></td>
						<td><?php echo date('d/m/Y', strtotime($tr->tanggal_kembali)); ?></td>
						<td>
							
							<?php if($tr->status_rental == "Selesai") { ?>

								<button class="btn btn-sm btn-primary" disabled>Sewa Selesai</button>

							<?php } else { ?>

								<a href="<?php echo base_url('customer/transaksi/pembayaran/' . $tr->id_rental) ?>" class="btn btn-sm btn-success">Pembayaran</a>

								<a onclick="return confirm('Anda yakin membatalkan?')" class="btn btn-sm btn-danger" href="<?php echo base_url('customer/transaksi/batal_transaksi/' . $tr->id_rental) ?>">Batal</a>

							<?php } ?>

						</td>
<!-- 						<td>
							<a onclick="return confirm('Anda yakin membatalkan?')" class="btn btn-sm btn-danger" href="<?php echo base_url('customer/transaksi/batal_transaksi/' . $tr->id_rental) ?>">Batal</a>
						</td> -->
					</tr>

				<?php endforeach; ?>
			</table>	
		</div>

	</div>
</div>