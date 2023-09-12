	<div class="msg" style="display:none;">
		<?php echo @$this->session->flashdata('msg'); ?>
	</div><!-- Main content -->
	<section class="section">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo $judul; ?></h3>
					</div>
					<!-- /.card-header -->
					<div class="card-body">
						<button class="btn btn-sm btn-primary form-add-pembagian-benur">Tambah Alamat</button>
						<button class="btn btn-sm btn-warning form-custom-kantong">Update Perkantong</button>
						<div class="row mt-2"></div>
						

						<form method="POST" id="form-kode-benur" action="<?php echo base_url('/benur/pembagian/form_add_kode/'); ?>">
							<div class="card border-success  mb-3">
								<div class="card-body">
										<h4>Data Pengiriman Benur</h4>
										<input type="hidden" name="benur" value="<?php echo $data; ?>">
										<div class="row">
											<div class="col-sm-2 ">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Kode">Kode</label>
													<input type="text" class="form-control form-control-sm" placeholder="Kode Benur" name="kode" id="kode" aria-describedby="sizing-addon2" value="" required>
												</div>
											</div>
											<div class="col-sm-1">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Kode">PL</label>
													<input type="text" class="form-control form-control-sm" placeholder="PL Benur" name="pl" id="pl" aria-describedby="sizing-addon2" value="" required>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Kode">BOX</label>
													<input type="text" class="form-control form-control-sm" placeholder="Box" name="box" id="box" aria-describedby="sizing-addon2" value="" onkeyup="sum_total_ktg(); "required>
												</div>
											</div>
											<div class="col-sm-1">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Kode">Perbox</label>
													<input type="text" class="form-control form-control-sm" placeholder="Perbox" name="perbox" id="perbox" aria-describedby="sizing-addon2" onkeyup="sum_total_ktg(); " value="" required>
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Kode">Total Kantong</label>
													<input type="text" class="form-control form-control-sm" placeholder="Total Kantong" name="total_kantong" id="total_kantong" aria-describedby="sizing-addon2" value="" onkeyup="sum_total_ktg(); "required>
												</div>
											</div>
										</div>
										<div class="row fixed-menu">
											<div id="fixed-menu-0" class="col-sm-2" style="display: none;">
												<label for="Alamat">Tambah Alamat</label>
												<div class="btn btn-sm btn-primary form-add-pembagian-benur" >Tambah Alamat</div>
											</div>

											<div id="fixed-menu-1" class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Alamat">Perkantong</label>
													<input type="text" class="form-control form-control-sm" placeholder="Isi Kantong" name="perkantong_kirim" id="perkantong_kirim" aria-describedby="sizing-addon2" value="" onkeyup="sum_total_ktg();  sum_selisih(); ribuan_ketik('perkantong_kirim'); " required>
												</div>
											</div>
											<div id="fixed-menu-2" class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Alamat">Stok tersedia</label>
													<input type="text" class="form-control form-control-sm" placeholder="Stok dari BLK" name="stok" id="stok" aria-describedby="sizing-addon2" value="" onkeyup="sum_selisih(); ribuan_ketik('stok');" required>
												</div>
											</div>
											<div id="fixed-menu-3" class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Alamat">Stok Kebutuhan</label>
													<input type="text" class="form-control form-control-sm" placeholder="Stok Kebutuhan" name="kebutuhan" id="kebutuhan" aria-describedby="sizing-addon2" value="" onkeyup="sum_selisih(); ribuan_ketik('kebutuhan');" required>
												</div>
											</div>
											<div id="fixed-menu-4" class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Alamat">Selisih</label>
													<input type="text" class="form-control form-control-sm" placeholder="Stok Kebutuhan" name="selisih" id="selisih" aria-describedby="sizing-addon2" value="" required>
												</div>
											</div>
											<div id="fixed-menu-5" class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="Alamat">Selisih Ktg</label>
													<input type="text" class="form-control form-control-sm" placeholder="Stok Kebutuhan" name="selisihKantong" id="selisihKantong" aria-describedby="sizing-addon2" value="" required >
												</div>
											</div>
											<div id="fixed-menu-6" class="col-sm-2">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="tanggal" >Tanggal Tebar</label>
													<input type="date" class="form-control form-control-sm flatpickr-no-config flatpickr-input" placeholder="Select date.."  name=" tanggal"
													 required/>
												</div>
											</div>
											<!-- <div class="col-sm-10"></div> -->
											<div class="col-sm-1">
												<div class="form-group">
													<label class="col-form-label col-form-label-sm" for="tanggal" >Simpan</label>
														<button type="submit" class="btn btn-sm btn-primary"> <i class="glyphicon glyphicon-ok"></i> Simpan</button>
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="card">
								<div class="card-body">
									<table id="list-data-pembagian-03" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th >No</th>
												<th>Kode</th>
												<th>Alamat</th>
												<th>Nama Petambak</th>
												<th>Permintaan Benur</th>
												<th>Kirim Benur</th>
												<th>Perkantong</th>
												<th>Jumlah Kantong</th>
												<th>Tanggal Tebar</th>
												<th style="text-align: center;">Aksi</th>
											</tr>
										</thead>
										<tbody id="data-benur">
										</tbody>
										<tfoot align="right">
											<tr>
												<th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
											</tr>
										</tfoot>
									</table>
								</div></div>
								<div class="card">
									<div class="card-body">
										<table id="list-data-pembagian-04" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th >No</th>
													<th>Kode</th>
													<th>Alamat</th>
													<th>Nama Petambak</th>
													<th>Permintaan Benur</th>
													<th>Kirim Benur</th>
													<th>Perkantong</th>
													<th>Jumlah Kantong</th>
													<th>Tanggal Tebar</th>
													<th style="text-align: center;">Aksi</th>
												</tr>
											</thead>
											<tbody id="data-benur">
											</tbody>
											<tfoot align="right">
												<tr>
													<th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</form>

						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
		</section>
		<!-- /.container-fluid -->
		<div id="tempat-modal"></div>
		<div class="modal" id="custom-kantong" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Perkantong</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form method="POST" action="<?php echo base_url('/benur/pembagian/batch_update_kantong/'.$data); ?>">
						<div class="input-group form-group">
							<span class="input-group-addon" id="sizing-addon2">
								<i class="glyphicon glyphicon-user"></i>
							</span>
							<input type="text" class="form-control" placeholder="Jumlah Benur Perkantong" name="perkantong_kirim_batch" aria-describedby="sizing-addon2" value="" required>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger btl" data-dismiss="modal">Batal</button>
							<button type="submit"  class="btn btn-primary ">Update</button>
						</div>
					</form>

				</div>
			</div>
		</div>
		<?php show_my_confirm('konfirmasiHapus', 'hapus-databenur', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
			<script type="text/javascript">

				<?php if (empty($id)) $id = ""; ?>
				function sum_total_ktg() {

					var box = document.getElementById('box').value;
					var perbox = document.getElementById('perbox').value;
					var perkantong_kirim = document.getElementById('perkantong_kirim').value;
					var result = (box.replace(/[^,\d]/g, '').toString()) * (perbox.replace(/[^,\d]/g, '').toString());


					if (!isNaN(result)) {
						document.getElementById('total_kantong').value = (result);	
					}
					if ((perkantong_kirim)) {

						var stok_tersedia = result * (perkantong_kirim.replace(/[^,\d]/g, '').toString());

						document.getElementById('stok').value = (stok_tersedia);
					}
				}

				function sum_selisih() {

					var perkantong_kirim = document.getElementById('perkantong_kirim').value;
					var stok = document.getElementById('stok').value;
					var kebutuhan = document.getElementById('kebutuhan').value;

					var result = (stok.replace(/[^,\d]/g, '').toString()) - (kebutuhan.replace(/[^,\d]/g, '').toString());
					let selisihK = result / (perkantong_kirim.replace(/[^,\d]/g, '').toString());
					if (!isNaN(result)) {
						console.log(result)
						document.getElementById('selisih').value = ribuan(result);
					}
					if (!isNaN(selisihK)) {
						document.getElementById('selisihKantong').value = (selisihK);
					}
				}



				function total_benur(){
					console.log('data')
					$.ajax({
						method: 'GET',
						url: '<?php echo base_url('/benur/pembagian/total_benur/'.$jnsBnr.'/'. $id ); ?>',
						success: function(data){
							console.log(data);
							var out = jQuery.parseJSON(data);
							document.getElementById('kebutuhan').value = (out.jmlBenurKirim);
							sum_selisih();
						}
					})
				}

		//tampilkan data pembagian benur
				

		    var table_pembagian_benur_03 =  $('#list-data-pembagian-03').DataTable({
		        "ajax" : {
		            type  : "GET",
		            url   :"<?php echo base_url('benur/pembagian/data_ajax/'.$jnsBnr.'/03/'. $id ); ?>",
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
		            table_pembagian_benur_03.buttons().container().appendTo( $('.col-sm-6:eq(0)', table_pembagian_benur_03.table().container()));
		        },
		    })
		    var table_pembagian_benur_04=  $('#list-data-pembagian-04').DataTable({
		            "ajax" : {
		                type  : "GET",
		                url   :"<?php echo base_url('benur/pembagian/data_ajax/'.$jnsBnr.'/04/'. $id ); ?>",
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
		                table_pembagian_benur_04.buttons().container().appendTo( $('.col-sm-6:eq(0)', table_pembagian_benur_04.table().container()));
		            },
		        })
		    //tampilkan modal
		    	$(document).on("click", ".form-add-pembagian-benur", function() {
		    		$.ajax({
		    			method: "POST",
		    			url: "<?php echo base_url('/benur/pembagian/form_add/'.$data.'/'. $id ); ?>",
		    		})
		    		.done(function(data) {
		    			$('#tempat-modal').html(data);
		    			$('#pembagian-benur').modal('show');
		    		})
		    	})

		    	$(document).on('click', '.form-custom-kantong', function() {
		    	    $('#custom-kantong').modal('show');
		    	});

		    	// /kembalikan data ke proses
		    		$(document).on("click", ".kembali-proses-dataBenur", function() {
		    			var id = $(this).attr("data-id");
		    			$.ajax({
		    				method: "POST",
		    				url: "<?php echo base_url('benur/pembagian/proses_edit_ajax'); ?>",
		    				data: "id=" +id+ "&status=proses",
		    				success: function(data){
		    					var out = jQuery.parseJSON(data);
		    					table_pembagian_benur_03.ajax.reload(); 
		    					table_pembagian_benur_04.ajax.reload();  
		    					Toastify({
		    					    text: out.msg,
		    					    duration: 3000,
		    					    close: true,
		    					    gravity: "top",
		    					    position: "right",
		    					    style: {
		    					        background: '#4fbe87'
		    					    },
		    					  }).showToast()
		    					total_benur();
		    				}
		    			})
		    		});


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

			$(document).on("click", ".tebar-dataBenur", function() {
				var id = $(this).attr("data-id");
				$.ajax({
					method: "POST",
					url: "<?php echo base_url('benur/pembagian/proses_edit_ajax'); ?>",
					data: "id=" +id+ "&status=tebar&kode=<?php echo $id; ?>&benur=<?php echo $jnsBnr; ?>",
					success: function(data){
						var out = jQuery.parseJSON(data);
						table_proses_pembagian.ajax.reload();  
						table_pembagian_benur_03.ajax.reload();  
						table_pembagian_benur_04.ajax.reload(); 
						document.getElementById('kebutuhan').value = (out.jmlBenurKirim);
						sum_selisih();
					    Toastify({
					        text: out.msg,
					        duration: 3000,
					        close: true,
					        gravity: "top",
					        position: "right",
					        style: {
					            background: '#4fbe87'
					        },
					      }).showToast()


					}
				})
			});
	</script>