<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title><?php echo $data_kode->kode; ?> / <?php echo $data_kode->pl; ?> / <?php echo angka_indo($data_kode->box); ?> / <?php echo angka_indo($data_kode->perbox); ?> / <?php echo angka_indo($data_kode->stok_tersedia); ?></title>
</head>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
body {

	width: 100%;
	height: 100%;
	margin: 0;
	padding: 0;
	font: 11pt "Cambria";
}
* {
	box-sizing: border-box;
	-moz-box-sizing: border-box;
}
.page {
	width: 297mm;
	max-height: 210mm;
	padding: 15mm 10mm;
	margin: 10mm auto;
	border: 1px #ffffff solid;
	border-radius: 5px;
	background: white;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
	border: 1px solid;
/*	height: 176mm;*/
/*	outline: 2cm #0fffcc solid;*/
}
.tengah {text-align : center;line-height: 5px;}
table, th, td {
	border: 1px solid #000;
/*	table-layout: fixed;*/
	 border-collapse: collapse;
}
td{
	white-space: nowrap;
}
.table_header {border-bottom : 5px solid #000; padding: 2px;width: 100%;}
.table_footer {border-bottom : 5px solid #000; padding: 2px;width: 100%;}

@page {
	size: A4 landscape;
        margin: 0;
}
@media print {
	html, body {
		width: 297mm ;
		height: 210mm;        
	}

	.page {
		margin: 0;
		border: initial;
		border-radius: initial;
		width: initial;
		min-height: initial;
		box-shadow: initial;
		background: initial;
		page-break-after: always;
	}
}
</style>
<body onload="javascript:window.print()" onafterprint="window.close()" onfocus="window.close()">
	<!-- <body> -->
		<div class="book">
			<div class="page">
				<div class="subpage">
					<h3 class="tengah" ><?php echo $data_kode->kode; ?> / <?php echo $data_kode->pl; ?> / <?php echo angka_indo($data_kode->box); ?> / <?php echo angka_indo($data_kode->perbox); ?> / <?php echo angka_indo($data_kode->stok_tersedia); ?></h3>
					<hr>
					<h1 class="tengah"><?php echo strtoupper(kode_nama($data_kode->jnsBenur)); ?> TANGGAL <?php echo strtoupper(tgl_indo($data_kode->tanggal)); ?></h1>
					<table width="100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Register</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Kantong</th>
								<th>Jml Benur</th>
								<th>Agen</th>
								<th>Blok</th>
							</tr>
						</thead>
						<tbody id="data-benur">
							<?php 
							$no=1;
							$sum_kantong = 0;
							$sum_benur = 0;

							foreach($fetch_data_03 as $row)  
							{    
								$sum_kantong += $row->jmlKantong;  
								$sum_benur += $row->jmlBenurKirim;  
								?>
								<tr>          
									<td> <?php echo $no++; ?></td> 
									<td> <?php echo $row->register; ?></td>                 
									<td> <?php echo $row->nama; ?></td>
									<td> <?php echo $row->alamat; ?></td>
									<td style="text-align: right;"> <?php echo $row->jmlKantong; ?></td>
									<td style="text-align: right;"> <?php echo angka_indo($row->jmlBenurKirim); ?></td>
									<td> <?php echo $row->nama; ?></td>
									<td> Blok 03</td>
								</tr>

							<?php } ?>
							<tfoot> 
								<tr>          
									<th></th> 
									<th></th>                 
									<th></th>
									<th></th>
									<th style="text-align: right;"> <?php echo $sum_kantong; ?></th>
									<th style="text-align: right;"> <?php echo angka_indo($sum_benur); ?></th>
									<th></th>
									<th></th>
								</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="page">
				<div class="subpage">
					<h1 class="tengah"><?php echo strtoupper(kode_nama($data_kode->jnsBenur)); ?> TANGGAL <?php echo strtoupper(tgl_indo($data_kode->tanggal)); ?></h1>
					<table width="100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Register</th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>Kantong</th>
								<th>Jml Benur</th>
								<th>Agen</th>
								<th>Blok</th>
							</tr>
						</thead>
						<tbody id="data-benur">
							<?php 
							$no=1;
							$sum_kantong = 0;
							$sum_benur = 0;

							foreach($fetch_data_04 as $row)  
							{    
								$sum_kantong += $row->jmlKantong;  
								$sum_benur += $row->jmlBenurKirim;  
								?>
								<tr>          
									<td> <?php echo $no++; ?></td> 
									<td> <?php echo $row->register; ?></td>                 
									<td> <?php echo $row->nama; ?></td>
									<td> <?php echo $row->alamat; ?></td>
									<td style="text-align: right;"> <?php echo $row->jmlKantong; ?></td>
									<td style="text-align: right;"> <?php echo angka_indo($row->jmlBenurKirim); ?></td>
									<td> <?php echo $row->nama; ?></td>
									<td> Blok 04</td>
								</tr>

							<?php } ?>
							<tfoot> 
								<tr>          
									<th></th> 
									<th></th>                 
									<th></th>
									<th></th>
									<th style="text-align: right;"> <?php echo $sum_kantong; ?></th>
									<th style="text-align: right;"> <?php echo angka_indo($sum_benur); ?></th>
									<th></th>
									<th></th>
								</tr>
							</tfoot>
						</tbody>
					</table>

				</div>    
			</div>
		</div>
	</body>
	</html>