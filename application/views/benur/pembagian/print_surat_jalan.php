<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title></title>
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
td {
    white-space: nowrap;
}
table, td, th{
    padding: 0px 10px;
}
.page {
    width: 216mm;
    max-height: 140mm;
    padding: 1mm 20mm;
    margin: 10mm auto;
    border: 1px #ffffff solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}
.subpage {
    border: 0px solid;
    height: 140mm;
/*    outline: 2cm #ffffff solid;*/
}
.tengah {text-align : center;}
.table_header {border-bottom : 5px double #000; padding: 2px;width: 100%;}

@page {
    size: letter;
    margin: 0;
}
@media print {
    html, body {
        width: 216mm ;
        height: 280mm;        
    }

    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
/*        page-break-before: always;*/
    }
    .page-break{
        page-break-after: always;
    }
}

</style>
<body onload="javascript:window.print()" onafterprint="window.close()" onfocus="window.close()">
    <!-- <body> -->
        <div class="book">
            <?php  
            $no = 1;
                foreach ($daftar_benur as $dataBenur ){
                    ?> 
                    <div class="page">
                <div class="subpage">
                    <table class="table_header" style="width : 100%;">
                        <tr>
                            <td style="width: 15%;"> <img src="<?php echo base_url(); ?>assets/images/KPPM.png" width="70px"> </td>
                            <td style="padding-top: 0px;"  class="tengah">
                                <b  style="font-size : large;">KOPERASI PLASMA PRATAMA MANDIRI</b><br>
                                DESA BUMI PRATAMA MANDIRA<br>
                                KEC.SUNGAI MENANG KAB.OGAN KOMERING ILIR
                            </td>
                        </tr>
                    </table >
                    <br>
                    <table>
                        <tr>
                            <td colspan="7" class="tengah"><h3 style="margin-bottom: 10px;margin-top: 0px;">BUKTI PENERIMAAN BENUR</h3></td>
                        </tr>
                        <tr>
                            <td>NAMA PETAMBAK</td>
                            <td>:</td>
                            <td style="font-weight: bold;"><?php echo $dataBenur->nama; ?></td>
                            <td>NO</td>
                            <td>:</td>
                            <td> <?php echo $no; ?></td>
                        </tr>
                        <tr>
                            <td >NO.REGISTER</td>
                            <td>: </td>
                            <td style="font-weight: bold; width: 50%; "><?php echo $dataBenur->register; ?></td>
                            <td>TANGGAL</td>
                            <td>: </td>
                            <td> <?php echo time_convert($dataBenur->tglTebar); ?></td>
                        </tr>
                        <tr>
                            <td>ALAMAT RUMAH</td>
                            <td>: </td>
                            <td style="font-weight: bold;"><?php echo $dataBenur->alamat; ?></td>
                        </tr>
                        <tr>
                            <td >NO.TAMBAK</td>
                            <td>: </td>
                            <td style="font-weight: bold;"><?php echo $dataBenur->noHp; ?></td>
                        </tr>
                    </table>
                    <br>
                    <table style="width : 100%;     border-collapse: collapse;" border="1px">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>KODE BARANG</th>
                                <th>NAMA BARANG</th>
                                <th colspan="2">JUMLAH KANTONG</th>
                                <th>BENUR /  KANTONG</th>
                                <th>JUMLAH BENUR</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><?php echo $dataBenur->kode; ?></td>
                                <td>BENUR <?php echo $dataBenur->jenis_benur; ?></td>
                                <td><?php echo floor($dataBenur->jmlKantong / $dataBenur->perbox); ?> x <?php echo $dataBenur->perbox; ?> + <?php echo $dataBenur->jmlKantong-(floor($dataBenur->jmlKantong / $dataBenur->perbox)*$dataBenur->perbox); ?> </td>
                                <td><?php echo $dataBenur->jmlKantong; ?></td>
                                <td><?php echo $dataBenur->perkantong; ?></td>
                                <td><?php echo $dataBenur->jmlBenurKirim; ?></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tengah">DIBUAT</td>
                                <td class="tengah">DIKETAHUI</td>
                                <td colspan="2" class="tengah">DISETUJUI</td>
                                <td colspan="3">CATATAN :</td>
                            </tr>
                            <tr>
                                <td colspan="2" rowspan="4"  style="text-align: center;vertical-align:bottom;"><?php echo $userdata->nama; ?></td>
                                <td  rowspan="4"  style="text-align: center;vertical-align:bottom;"><?php echo $dataBenur->nama; ?></td>
                                <td colspan="2" rowspan="4"  style="text-align: center;vertical-align:bottom;"></td>
                                <td colspan="3"  >&nbsp;  </td>
                            </tr>
                            <tr>
                                <td  colspan="3">&nbsp; </td>
                            </tr>
                            <tr>
                                <td  colspan="3">&nbsp; </td>
                            </tr>
                            <tr>
                                <td  colspan="3">&nbsp; </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tengah" >ADM. KPPM</td>
                                <td class="tengah">PETAMBAK</td>
                                <td colspan="2" class="tengah">PENGURUS KPPM</td>
                                <td colspan="3"></td>
                            </tr>
                        </tbody>
                    </table>                        
                </div>
            </div>
          <?php
          if($no % 2 == 0 ) echo '<div class="page-break"> </div>';
            $no++;
             }
            ?>
            
        </div>

    </body>
    </html>