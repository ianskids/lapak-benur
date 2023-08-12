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
            <div class="card-body table-responsive pad text-center">
                <p class="mt-3 mb-1">Menu Daftar Proses</p>
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn bg-olive active">
                        <input type="radio" name="options" id="option_b1" value="daftar" autocomplete="off" checked=""> Daftar Tebar
                    </label>
                    <label class="btn bg-olive">
                        <input type="radio" name="options" id="option_b2" value="siap" autocomplete="off"> Siap Tebar
                    </label>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table id="list-data-proses" class="table table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Alamat</th>
                                    <th>Nama</th>
                                    <th>Jml Benur</th>
                                    <th>Agen</th>
                                    <th>Tanggal Tebar</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="data-benur">

                            </tbody>
                            <tfoot align="right">
                                <tr><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                            </tfoot>
                        </table>
                </div>
                
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->
</div>

<script type="text/javascript">
    
        var table_proses =  $('#list-data-proses').DataTable({
            "ajax" : {
                type  : "GET",
                url   :"<?php echo base_url('benur/proses/data_ajax/'.$jnsBnr); ?>",
            },
            "responsive": true, 
            "paging": false,
            "lengthChange": false, 
            "autoWidth": true,
    // "buttons": ["copy", "csv", "excel", "pdf", "print" , "colvis"],
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
                var jmlBenur = api
                .column( 3 ).data().reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
    // Update footer by showing the total with the reference of the column index 
                $( api.column( 1 ).footer() ).html('Total');
                $( api.column( 3 ).footer() ).html(ribuan(jmlBenur));
            },
            "initComplete": function(settings, json) {
                table_proses.buttons().container().appendTo('#list-data-proses_wrapper .col-md-6:eq(0)');
            },
        });

    //pindah ke siap//
        $(document).on("click", ".proses-dataBenur", function() {
            var id = $(this).attr("data-id");
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('benur/proses/proses_edit_ajax'); ?>",
                data: "id=" +id+ "&status=proses",
                success: function(data){
                    var out = jQuery.parseJSON(data);
                    table_proses.ajax.reload();  
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
    //kembal ke daftar//
        $(document).on("click", ".kembali-dataBenur", function() {
            var id = $(this).attr("data-id");
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('benur/proses/proses_edit_ajax'); ?>",
                data: "id=" +id+ "&status=daftar",
                success: function(data){
                    var out = jQuery.parseJSON(data);
                    table_proses.ajax.reload();  
                    Toastify({
                        text: out.msg,
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        style: {
                            background: '#4fbe87'
                        }
                      }).showToast()
                }
            })
        });

        $('input[type=radio][name=options]').change(function() {
            let link
            if (this.value == 'siap') {
                link = "<?php echo base_url('benur/proses/data_ajax/'.$jnsBnr); ?>"+'/proses';
            }
            else{
                link = "<?php echo base_url('benur/proses/data_ajax/'.$jnsBnr); ?>"
            }
            table_proses.ajax.url( link ).load();
        });

</script>