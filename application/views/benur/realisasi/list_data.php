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
						

							<div class="card border-success  mb-3">
								<div class="card-body">
									<h3 class="text-center">Benur <?php echo ucfirst($data); ?> Blok 03</h3>
							<table id="list-data-realisasi-03" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th >No</th>
										<th>Kode</th>
										<th>Alamat</th>
										<th>Nama Petambak</th>
										<th>Kirim Benur</th>
										<th>Realisasi Benur</th>										
										<th>Jml_Ktg  Kirim</th>
										<th>Jml_Ktg Realisasi</th>
										<th>Update</th>
										<th>Tagihan</th>
										<th>DP</th>
										<th>Selisih</th>
										<th style="text-align: center;">Aksi</th>
									</tr>
								</thead>
								<tbody id="data-benur">
								</tbody>
								<tfoot align="right">
									<tr>
										<th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
							<div class="card border-success  mb-3">
								<div class="card-body">
							<h3 class="text-center">Benur <?php echo ucfirst($data); ?> Blok 04</h3>
							<table id="list-data-realisasi-04" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th >No</th>
										<th>Kode</th>
										<th>Alamat</th>
										<th>Nama Petambak</th>
										<th>Kirim Benur</th>
										<th>Realisasi Benur</th>										
										<th>Jml_Ktg  Kirim</th>
										<th>Jml_Ktg Realisasi</th>
										<th>Update</th>
										<th>Tagihan</th>
										<th>DP</th>
										<th>Selisih</th>
										<th style="text-align: center;">Aksi</th>
									</tr>
								</thead>
								<tbody id="data-benur">
								</tbody>
								<tfoot align="right">
									<tr>
										<th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
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

	<?php show_my_confirm('konfirmasiHapus', 'hapus-databenur', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>

	<script type="text/javascript">
		    var table_realisasi_benur_03 =  $('#list-data-realisasi-03').DataTable({
		        "ajax" : {
		            type  : "GET",
		            url   :"<?php echo base_url('benur/realisasi/data_ajax/'.$jnsBnr.'/03/'. $id ); ?>",
		        },
		        "paging": false,
		        "responsive": true, 
		// "responsive": true, 
		        // "lengthChange": true, 
		        // "autoWidth": true,
		        columnDefs: [ { targets: [4,5,6,7], className: 'dt-body-right' } ],
		        buttons: {
		            buttons: [
		                {  text: 'Copy', extend: 'copy', className: 'bg-gradient-primary copyButton', init: function( api, node, config) {$(node).removeClass('btn-secondary')} },
		                {  text: 'Excel', extend: 'excel', className: 'bg-gradient-primary excelButton', init: function( api, node, config) {$(node).removeClass('btn-secondary')}}
		                ]
		        },
		        "footerCallback": function ( row, data, start, end, display ) {
		            var api = this.api(), data;
		// converting to interger to find total
		            var intVal = function ( i ) {
		                return typeof i === 'string' ?
		                i.replace(/[\$,.]/g, '')*1 :
		                typeof i === 'number' ?
		                i : 0;
		            };
		// computing column Total the complete result 
		            var jmlBenur = api.column( 4 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
		            var jmlBenurkirim = api.column( 5 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
		            var jmlkantong = api.column( 7 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
		// Update footer by showing the total with the reference of the column index 
		            $( api.column( 1 ).footer() ).html('Total');
		            $( api.column( 4 ).footer() ).html(ribuan(jmlBenur));
		            $( api.column( 5 ).footer() ).html(ribuan(jmlBenurkirim));
		            $( api.column( 7 ).footer() ).html((jmlkantong));
		        },
		        "initComplete": function(settings, json) {
		            table_realisasi_benur_03.buttons().container().appendTo( $('.col-md-6:eq(0)', table_realisasi_benur_03.table().container()));
		        },
		    })
		    var table_realisasi_benur_04=  $('#list-data-realisasi-04').DataTable({
		            "ajax" : {
		                type  : "GET",
		                url   :"<?php echo base_url('benur/realisasi/data_ajax/'.$jnsBnr.'/04/'. $id ); ?>",
		            },
		            "paging": false,
		            "responsive": true, 
		    // "responsive": true, 
		            // "lengthChange": true, 
		            // "autoWidth": true,
		            columnDefs: [ { targets: [4,5,6,7], className: 'dt-body-right' } ],
		            buttons: {
		                buttons: [
		                    {  text: 'Copy', extend: 'copy', className: 'bg-gradient-primary copyButton', init: function( api, node, config) {$(node).removeClass('btn-secondary')} },
		                    {  text: 'Excel', extend: 'excel', className: 'bg-gradient-primary excelButton', init: function( api, node, config) {$(node).removeClass('btn-secondary')}}
		                    ]
		            },
		            "footerCallback": function ( row, data, start, end, display ) {
		                var api = this.api(), data;
		    // converting to interger to find total
		                var intVal = function ( i ) {
		                    return typeof i === 'string' ?
		                    i.replace(/[\$,.]/g, '')*1 :
		                    typeof i === 'number' ?
		                    i : 0;
		                };
		    // computing column Total the complete result 
		                var jmlBenur = api.column( 4 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
		                var jmlBenurkirim = api.column( 5 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
		                var jmlkantong = api.column( 7 ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
		    // Update footer by showing the total with the reference of the column index 
		                $( api.column( 1 ).footer() ).html('Total');
		                $( api.column( 4 ).footer() ).html(ribuan(jmlBenur));
		                $( api.column( 5 ).footer() ).html(ribuan(jmlBenurkirim));
		                $( api.column( 7 ).footer() ).html((jmlkantong));
		            },
		            "initComplete": function(settings, json) {
		                table_realisasi_benur_04.buttons().container().appendTo( $('.col-md-6:eq(0)', table_realisasi_benur_04.table().container()));
		            },
		        })









		$(document).on("click", ".up-kantongbenur", function() {
		  var id = $(this).attr("data-id");
		  $.ajax({
		    method: "POST",
		    url: "<?php echo base_url('benur/pembagian/update_kantong/'.$jnsBnr.'/'. $id ); ?>",
		    data: "id=" +id +"&kantong=1"
		  })
		  .done(function(data) {
					var out = jQuery.parseJSON(data);
		    table_pembagian_benur_03.ajax.reload(); 
		    table_pembagian_benur_04.ajax.reload();  
		    document.getElementById('kebutuhan').value = (out.jmlBenurKirim);
		    sum_selisih();
		  })
		})
		$(document).on("click", ".down-kantongbenur", function() {
		  var id = $(this).attr("data-id");
		  $.ajax({
		    method: "POST",
		    url: "<?php echo base_url('benur/pembagian/update_kantong/'.$jnsBnr.'/'. $id ); ?>",
		    data: "id=" +id +"&kantong=-1"
		  })
		  .done(function(data) {
		  	var out = jQuery.parseJSON(data);
		  	table_pembagian_benur_03.ajax.reload(); 
		  	table_pembagian_benur_04.ajax.reload();  
		  	document.getElementById('kebutuhan').value = (out.jmlBenurKirim);
		  	sum_selisih();
		  })
		})
		$(document).on("click", ".up-kantongbenur-realisasi", function() {
		  var id = $(this).attr("data-id");
		  $.ajax({
		    method: "POST",
		    url: "<?php echo base_url('benur/realisasi/update_kantong/'.$jnsBnr.'/'. $id ); ?>",
		    data: "id=" +id +"&kantong=1"
		  })
		  .done(function(data) {
					var out = jQuery.parseJSON(data);
		    table_realisasi_benur_03.ajax.reload(); 
		    table_realisasi_benur_04.ajax.reload(); 
		  })
		})
		$(document).on("click", ".down-kantongbenur-realisasi", function() {
		  var id = $(this).attr("data-id");
		  $.ajax({
		    method: "POST",
		    url: "<?php echo base_url('benur/realisasi/update_kantong/'.$jnsBnr.'/'. $id ); ?>",
		    data: "id=" +id +"&kantong=-1"
		  })
		  .done(function(data) {
		  	var out = jQuery.parseJSON(data);
		  	table_realisasi_benur_03.ajax.reload(); 
		  	table_realisasi_benur_04.ajax.reload();  
		  })
		})

	</script>