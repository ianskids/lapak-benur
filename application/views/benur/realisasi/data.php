	<div class="msg" style="display:none;">
	  <?php echo @$this->session->flashdata('msg'); ?>
	</div><!-- Main content -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo $title; ?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">

						<table id="list-faktur" class="table table-bordered table-striped" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode</th>
									<th>Kode Benur</th>
									<th>isi</th>
									<th>tersedia</th>
									<th>kebutuhan</th>
									<th>selisih</th>
									<th>selisih ktg</th>
									<th>Tanggal</th>
									<th style="text-align: center;">Aksi</th>
								</tr>
							</thead>
							<tbody id="data-benur">
								<?php
								  $no = 1;
								  $sum = 0;
								  foreach ($dataBenur as $benur) {
								    ?>
								    <tr>
								      <td ><?php echo $no; ?></td>
								      <td style="min-width:230px;"><?php echo $benur->kode; ?> / <?php echo $benur->pl; ?> / <?php echo angka_indo($benur->box); ?> / <?php echo angka_indo($benur->perbox); ?> / <?php echo angka_indo($benur->stok_tersedia); ?></td>
								      <td ><?php echo $benur->kode; ?></td>
								      <td><?php echo $benur->perkantong; ?></td>
								      <td><?php echo $benur->stok_tersedia; ?></td>
								      <td><?php echo $benur->stok_kebutuhan; ?></td>
								      <td><?php echo angka_indo($benur->selisih); ?></td>
								      <td><?php echo angka_indo($benur->selisih_kantong); ?></td>
								       <td><?php echo time_convert($benur->tanggal); ?></td>
								      <td>
								        <a href="<?php echo base_url('benur/realisasi/list_data/'.$jenis_benur.'/'.$benur->id); ?>" class="btn btn-success btn-sm">Detail</a>
								        <div class="btn btn-danger btn-sm" onclick="PopupCenter('<?php echo base_url('benur/realisasi/print/'.$jenis_benur.'/'.$benur->id); ?>', 'myPop1',720,450)" >Print</div>
								      </td>
								    </tr>
								    <?php
								    $no++;
								  }
								?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
		<div id="tempat-modal"></div>

