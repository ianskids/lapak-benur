		<div class="modal-body">
			<div class="container-fluid">
				<div class="form-msg"></div>
				<div class="card-body">
					<table id="list-data-proses-pembagian" class="table table-bordered table-striped" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>Alamat</th>
								<th>Nama</th>
								<th>jmlBenur</th>
								<th>jmlKantong</th>
								<th style="text-align: center;">Aksi</th>
							</tr>
						</thead>
						<tbody id="data-benur">

						</tbody>
						<tfoot align="right">
							<tr><th></th><th></th><th></th><th></th><th></th><th></th></tr>
						</tfoot>
					</table>
				</div>
	
			</div>
		</div>
		<script type="text/javascript">

			var table_proses_pembagian =  $('#list-data-proses-pembagian').DataTable({
				"ajax" : {
					type  : "GET",
					url   :"<?php echo base_url('benur/pembagian/data_proses_ajax/'.$jnsBnr); ?>",
				},
				// "responsive": true, 
				// "lengthChange": false, 
				// "autoWidth": true,
			});




		</script>	