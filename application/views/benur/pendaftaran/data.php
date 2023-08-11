<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>DataTable Jquery</h3>
                <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required)</p>
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
            <div class="card-header">
                Data Pendaftaran Benur
            </div>
            <?php if ($this->session->flashdata('berhasil')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo @$this->session->flashdata('berhasil'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('gagal')) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo @$this->session->flashdata('gagal'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>

            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="list-data" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th  >No</th>
                                    <th  >Alamat</th>
                                    <th  >Nama</th>
                                    <th  >Jml Benur</th>
                                    <th  >Agen</th>
                                    <th  >Tanggal Tebar</th>
                                    <th   style="text-align: center;">Aksi</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="data-benur">

                            </tbody>
                            <tfoot align="right">
                                <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                            </tfoot>
                        </table>
                </div>
                
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

<script type="text/javascript">
        var table_benur =  $('#list-data').DataTable({
            "ajax" : {
                type  : "GET",
                url   :"<?php echo base_url('benur/pendaftaran/data_ajax/'.$jnsBnr); ?>",
            },
            "responsive": true, 
            "paging": false,
            "lengthChange": false, 
            "autoWidth": false,
            columnDefs: [ { targets: [3], className: 'dt-body-right' } ],
            buttons: {
                buttons: [
                    { text: 'Tambah', className: 'btn-outline-primary',  action: function ( e, dt, button, config ) { window.location = '<?php echo base_url('benur/pendaftaran/add/'.$jenis_benur); ?>'; }, init: function( api, node, config) {$(node).removeClass('btn-secondary')} },
                    { text: 'Copy', extend: 'copy', className: 'btn-outline-primary', init: function( api, node, config) {$(node).removeClass('btn-secondary')} },
                    { text: 'Excel', extend: 'excel', className: 'btn-outline-primary', init: function( api, node, config) {$(node).removeClass('btn-secondary')}},
                    { text: 'Pdf', extend: 'pdf', className: 'btn-outline-primary', init: function( api, node, config) {$(node).removeClass('btn-secondary')}},
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
                var jmlBenur = api
                .column( 3 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

                
    // Update footer by showing the total with the reference of the column index 
                $( api.column( 1 ).footer() ).html('Total');
                $( api.column( 3 ).footer() ).html(ribuan(jmlBenur));

            },
            "initComplete": function(settings, json) {
                table_benur.buttons().container().appendTo('#list-data_wrapper .col-md-6:eq(0)');
            },
        })
</script>