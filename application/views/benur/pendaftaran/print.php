<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title><?php echo $dataBenur->alamat; ?> - <?php echo strtoupper($dataBenur->namaPendaftar); ?> <?php echo $dataBenur->nama_agen?'- AGEN '.$dataBenur->nama_agen :""; ?></title>
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
    width: 210mm;
    min-height: 297mm;
    padding: 1mm 20mm;
    margin: 10mm auto;
    border: 1px #ffffff solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    border: 0px solid;
    height: 257mm;
    outline: 2cm #ffffff solid;
}
.tengah {text-align : center;line-height: 5px;}
.table_header {border-bottom : 5px double #000; padding: 2px;width: 100%;}
@page {
    size: A4;
    margin: 0;
}
@media print {
    html, body {
        width: 210mm;
        height: 148mm;        
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
                 <table class="table_header" style="width : 100%;">
                   <tr>
                     <td style="width: 15%;"> <img src="<?php echo base_url(); ?>assets/images/KPPM.png" width="70px"> </td>
                     <td style="padding-top: 0px;">
                        <b>Kopersi Plasma Pratama Mandiri</b><br>
                        DESA BUMI PRATAMA MANDIRA<br>
                        KEC.SUNGAI MENANG KAB.OGAN KOMERING ILIR
                    </td>
                    <td style="border-left: 5px solid;padding-right: 0px;padding-left: 14px;">
                     <p style="font-weight: bold;font-size: 47px;margin: 0;">INVOICE</p>
                 </td>
             </tr>
         </table ><br>
         <table>
            <tr>
                <td>Kepada Yth.</td>
                <td></td>
                <td></td>
                <td>No Invoice</td>
                <td>:<td>
                    <td> ...................</td>
                </tr>
                
                <tr>
                    <td style="width: 15%; ">Nama</td>
                    <td>: </td>
                    <td style="font-weight: bold; width: 50%; "><?php echo strtoupper($dataBenur->namaPendaftar); ?> <?php echo $dataBenur->nama_agen?'- AGEN '.$dataBenur->nama_agen :""; ?></td>
                    <td>Tgl Invoice</td>
                    <td>: <td>
                        <td> ..............</td>
                    </tr>
                    <tr>
                        <td style="width: 15%;">No Hp</td>
                        <td>: </td>
                        <td style="font-weight: bold;"><?php echo $dataBenur->noHp; ?></td>
                    </tr>
                </table>
                <br>
                <table style="width : 95%; margin-left: 30px;">
                 <tr>
                     <td style="width: 25%;">Alamat</td>
                     <td style="width: 5%;">:</td>
                     <td style="width: 45%;"><?php echo $dataBenur->alamat; ?></td>
                     <td  rowspan="2" style="border: 2px dashed red; width: 25%;text-align: center;"> Schedule Tebar <br><?php echo time_convert($dataBenur->tglSchedule); ?></td>
                 </tr>
                 <tr>
                     <td style="width: 25%;">No Register</td>
                     <td style="width: 5%;">:</td>
                     <td style="width: 45%;"><?php echo $dataBenur->register; ?></td>
                 </tr>
                 <tr>
                     <td style="width: 25%; vertical-align: top;">Nama Petambak</td>
                     <td style="width: 5%; vertical-align: top;">:</td>
                     <td style="width: 45%;"><?php echo $dataBenur->nama; ?></td>
                 </tr>
                 <tr>
                     <td style="width: 25%;">Jenis Benur</td>
                     <td style="width: 5%;">:</td>
                     <td style="width: 45%;">Benur <?php echo kode_nama($dataBenur->jnsBenur); ?> @Rp. <?php echo kode_nama($dataBenur->harga); ?>,-</td>
                 </tr>
                 <tr>
                     <td style="width: 25%;">Jumlah Benur</td>
                     <td style="width: 5%;">:</td>
                     <td style="width: 45%;"><?php echo angka_indo($dataBenur->jmlBenur); ?> ekor</td>
                 </tr>
                 <tr>
                     <td style="width: 25%;">Jumlah Tagihan</td>
                     <td style="width: 5%;">:</td>
                     <td style="width: 45%;">Rp. <?php echo angka_indo($dataBenur->biaya); ?></td>
                 </tr>
                 
             </table>

             <p >Terbilang : <b><i><u><?php echo ucwords( terbilang($dataBenur->biaya)); ?> Rupiah</u></i></b></p>

             <div style="width: 45%; text-align: left; float: right;">Bumi Pratama Mandira, <?php echo date('d F Y');?> </div><br>
             <div style="width: 45%; text-align: left; float: right;">Team Benur,</div><br><br><br><br><br>
             <div style="width: 45%; text-align: left; float: right;"><?php echo $userdata; ?></div>

         </div>    
     </div>
 </div>
</body>
</html>