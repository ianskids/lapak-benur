   <div class="page-heading">
       <div class="page-title">
           <div class="row">
               <div class="col-12 col-md-6 order-md-1 order-last">
                   <h3><?php echo $judul; ?></h3>
                   <!-- <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p> -->
               </div>
               <div class="col-12 col-md-6 order-md-2 order-first">
                   <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active" aria-current="page">DataTable Jquery</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
 <!-- Basic Tables start -->
    <section class="section">
                <div class="card">
 <!--                    <div class="card-header">
                        <h3 class="card-title"><?php echo $judul; ?></h3>
                    </div> -->
                    <!-- /.card-header -->
                    <div class="card-body">
                         <div class="table-responsive-sm">
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
                                    // dd($benur);
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
                                        <a href="<?php echo base_url('benur/pembagian/list_data/'.$jenis_benur.'/'.$benur->id); ?>" class="btn btn-success btn-sm">Detail</a>
                                        <div class="btn btn-danger btn-sm" onclick="PopupCenter('<?php echo base_url('benur/pembagian/print/'.$jenis_benur.'/'.$benur->id); ?>', 'myPop1',720,450)" >Print</div>
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
</section>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
        <div id="tempat-modal"></div>


        <script type="text/javascript">
            //////////////////////// list pembagian benur////////////////////////////////////////////////
                <?php if (empty($data)) $data = ""; ?>

                var table_faktur =  $('#list-faktur').DataTable({
                    "paging": false,
                    "responsive": true, 
                    "lengthChange": false, 
                    "autoWidth": true,
                    buttons: {
                        buttons: [
                            { text: 'Tambah Faktur', className: 'btn-sm btn-outline-success',  action: function ( e, dt, button, config ) { window.location = '<?php echo base_url('benur/pembagian/list_data/'.$jenis_benur); ?>'; }, init: function( api, node, config) {$(node).removeClass('btn-secondary')} },
                            {  text: 'Copy', extend: 'copy', className: 'btn-sm btn-outline-success copyButton', init: function( api, node, config) {$(node).removeClass('btn-secondary')} },
                            {  text: 'Excel', extend: 'excel', className: 'btn-sm btn-outline-success excelButton', init: function( api, node, config) {$(node).removeClass('btn-secondary')}}
                            ]
                    },
                });
                table_faktur.buttons().container().appendTo( $('.col-md-6:eq(0)', table_faktur.table().container()));

 
        </script>

