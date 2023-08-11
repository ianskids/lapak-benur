    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-4 order-md-1 order-last">
                    <h3>Pendaftaran Benur</h3>
                        <p class="text-subtitle text-muted">Tambah Data Pendaftaran Benur</p>
                </div>
                <div class="col-12 col-md-4 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable Jquery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <!-- // Basic multiple Column Form section start -->
        <section id="multiple-column-form">
            <div class="row match-height">
              <div class="col-12">
                <div class="card">
                  
                <div class="card-content">
                    <div class="card-body">
                        <form method="POST" id="form-tambah-benur" class="form">
                            <div class="row">
                                <div class="container-fluid">
                                    <div class="form-msg"></div>
                                      <div class="card-header">
                                        <h4 class="card-title">Data Petambakk</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="Alamat">Alamat</label>
                                                <input type="text" class="form-control " placeholder="Alamat" name="alamat" id="alamat" aria-describedby="sizing-addon2" value="" onkeyup="isi_otomatis()" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="register">Register</label>
                                                <input type="text" class="form-control " placeholder="Register" name="register" id="register" aria-describedby="sizing-addon2" value="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control " placeholder="Nama" name="nama" id="nama" aria-describedby="sizing-addon2" value="" autocomplete="off" required>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="namaPendaftar">Nama Pendaftar</label>
                                                <input type="text" class="form-control " placeholder="Nama Pendaftar" name="namaPendaftar" aria-describedby="sizing-addon2" value="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group" style="width: 100%;">
                                                <label for="agen">AGEN</label>
                                                <select name="idAgen" class="form-select  select2 " aria-describedby="sizing-addon2">
                                                    <option value="0" >
                                                        Pilih Nama Agen
                                                    </option>
                                                    <?php
                                                    foreach ($dataAgen as $agen) {
                                                        ?>
                                                        <option value="<?php echo $agen->id; ?>">
                                                            AGEN <?php echo $agen->nama; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="noHp">No Hp</label>
                                                <input type="text" class="form-control " name="noHp" placeholder="Nomor Telepon" aria-describedby="sizing-addon2" value="" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-header">
                    <h4 class="card-title">Data Benur</h4>
                </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="jenis">Jenis Benur</label>
                                                <select name="jnsBenur" id="jnsBenur" class="select2 form-control " aria-describedby="sizing-addon2">
                                                    <option data-harga="0" data-perkantong="0" value="0">
                                                        Pilih Jenis Benur
                                                    </option>
                                                    <?php
                                                    foreach ($dataJenisBenur as $jenis) {
                                                        ?>
                                                        <option data-harga="<?php echo $jenis->harga; ?>" data-perkantong="<?php echo $jenis->jumlah; ?>" value="<?php echo $jenis->kode; ?>">
                                                            <?php echo $jenis->nama; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="harga">Harga Benur</label>
                                                <input type="text" class="form-control " placeholder="harga" name="harga" id="harga" aria-describedby="sizing-addon2" value="" onchange="sum();"  onkeyup="sum();" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="perkantong">Perkantong</label>
                                                <input type="text" class="form-control " placeholder="perkantong" name="perkantong" id="perkantong"aria-describedby="sizing-addon2" value="" onkeyup="sum(); ribuan_ketik('perkantong');" autocomplete="off" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="jmlBenur">Jumlah Tebar Benur</label>
                                                <input type="text" class="form-control " placeholder="Jumlah Benur" name="jmlBenur" id="jmlBenur" aria-describedby="sizing-addon2" value="" onkeyup=" sum_kantong(); ribuan_ketik('jmlBenur');" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="jmlKantong">Jumlah kantong</label>
                                                <input type="number" class="form-control " placeholder="Jumlah Kantong" name="jmlKantong" id="jmlKantong"aria-describedby="sizing-addon2" value="" onkeyup="sum();" onclick="sum();" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="tglSchedule" >Tanggal Tebar</label>
                                                <input
                                                type="date"
                                                class="form-control mb-3 flatpickr-no-config"
                                                placeholder="Select date.."  name="tglSchedule"
                                                 required/>

                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" class="form-control " placeholder="Total Biaya" name="biaya" id="biaya" aria-describedby="sizing-addon2" value="">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label class="text-center" for="dp">Total</label>
                                            <div class="form-group">
                                                <input type="text" class="form-control " placeholder="Total" name="biayatampil" id="biayatampil" aria-describedby="sizing-addon2" value="Rp." disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex">

                              <div class="flex-grow-1">
                                <button type="button" onclick="history.back()" class="btn btn-danger me-5 mb-1 p-2 flex-grow-1" >Kembali</button>
                            </div>
                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                Reset
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- // Basic multiple Column Form section end -->

</div>
    <?php show_my_confirm('konfirmasiPrint', 'print-dataBenur', 'Print Data Ini?', 'Ya, Print Data Ini'); ?>

<script type="text/javascript">
        // $('.select2').on('select2:select', function (e) {
        //   sum();
        // });
 //    $(document).on('select2:open', () => {
 //     document.querySelector('.select2-search__field').focus();
 // });

    function isi_otomatis(){
        var alamat = $("#alamat").val();
        if(alamat.length >= 6){
            $.ajax({
                url: '<?php echo base_url('petambak/ajax'); ?>',
                data:"alamat="+alamat ,
                success : function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#register').val(obj.register);
                    $('#alamat').val(obj.alamat);
                }
            })
        } else{
            $('#nama').val('');
            $('#register').val('');
        }
    }

    function sum() {
        var perkantong = document.getElementById('perkantong').value;
        var jmlKantong = document.getElementById('jmlKantong').value;
        var harga = document.getElementById('harga').value;
        var jmlBenur = (perkantong.replace(/[^,\d]/g, '').toString()) * (jmlKantong.replace(/[^,\d]/g, '').toString());
        var totalharga = jmlBenur * (harga.replace(/[^,\d]/g, '').toString());

        if (!isNaN(jmlBenur) && jmlBenur !== 0) {
            document.getElementById('jmlBenur').value = ribuan(jmlBenur);
        }
        if (!isNaN(totalharga) && totalharga !== 0) {
            document.getElementById('biaya').value = ribuan(totalharga,'Rp. ');
            document.getElementById('biayatampil').value = ribuan(totalharga,'Rp. ');
        }
    }

    function sum_kantong() {
        var jmlBenur = document.getElementById('jmlBenur').value;
        var perkantong = document.getElementById('perkantong').value;
        var harga = document.getElementById('harga').value;
        var jmlKantong = (jmlBenur.replace(/[^,\d]/g, '').toString()) / (perkantong.replace(/[^,\d]/g, '').toString());
        var biaya = (jmlBenur.replace(/[^,\d]/g, '').toString()) * (harga.replace(/[^,\d]/g, '').toString());
        if (!isNaN(jmlKantong) && jmlKantong !== 0) {
            document.getElementById('jmlKantong').value = (jmlKantong);
        }
        if (!isNaN(biaya) && biaya !== 0) {
            document.getElementById('biaya').value = biaya;
            document.getElementById('biayatampil').value = ribuan(biaya,'Rp. ');
        }
    }
    function sum_ganti_benur() {
        var biaya = document.getElementById('biaya').value;
        var harga = document.getElementById('harga').value;
        var perkantong = document.getElementById('perkantong').value;
        var jmlBenur = biaya.replace(/[^,\d]/g, '').toString() / (harga.replace(/[^,\d]/g, '').toString());
        var jmlKantong = jmlBenur / (perkantong.replace(/[^,\d]/g, '').toString());

        if (!isNaN(jmlBenur) && jmlBenur !== 0) {
            document.getElementById('jmlBenur').value = (jmlBenur);
            document.getElementById('jmlKantong').value = (jmlKantong);
        }
    }


    $('#jnsBenur').on('change', function(){
    // ambil data dari elemen option yang dipilih
        const harga = $('#jnsBenur option:selected').data('harga');
        const perkantong = $('#jnsBenur option:selected').data('perkantong');

    // tampilkan data ke element
        $('[name=harga]').val(harga);
        $('[name=perkantong]').val(ribuan(perkantong));
        sum_ganti_benur();
    });



    function ribuan_ketik(id, cur) {
        var rupiah = document.getElementById(id);
        rupiah.addEventListener('keyup', function(e){
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, cur);
        });
    }

/* Fungsi formatRupiah */
    function formatRupiah(angka, prefix){
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split       = number_string.split(','),
        sisa        = split[0].length % 3,
        rupiah        = split[0].substr(0, sisa),
        ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if(ribuan){
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    function ribuan(bilangan, cur = '' ) {
        if (bilangan !== undefined) {
            var number_string = bilangan.toString(),
            sisa  = number_string.length % 3,
            rupiaha  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiaha += separator + ribuan.join('.');
                return cur + rupiaha;
            }
        }
    }
        function effect_msg_form() {
    // $('.form-msg').hide();
            $('.form-msg').show(1000);
            setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
        }

        function effect_msg() {
    // $('.msg').hide();
            $('.msg').show(1000);
            setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
        }

    $(document).on('submit', '#form-tambah-benur', function(e){
        var data = $(this).serialize();
        $.ajax({
            method: 'POST',
            url: '<?php echo base_url('/benur/pendaftaran/insert'); ?>',
            data: data,
            success: function(data){
                var out = jQuery.parseJSON(data);
                if (out.status == 'form') {
                    $('.form-msg').html(out.msg);
                    effect_msg_form();
                } else {
                    document.getElementById("form-tambah-benur").reset();
                    $('#konfirmasiPrint').modal('show');

                    $(".print-dataBenur").click(function() {
                        PopupCenter('<?php echo base_url('benur/pendaftaran/print/'); ?>'+out.id, 'Print',720,450);
                        window.location.href = '<?php echo base_url('benur/pendaftaran/data/'.$jenis_benur); ?>'
                        Toast.fire({
                            icon: out.status,
                            title: out.msg
                        })
                    })

                    $(document).on("click", ".btl", function() {
                         window.location.href = '<?php echo base_url('benur/pendaftaran/data/'.$jenis_benur); ?>'
                         Toast.fire({
                            icon: out.status,
                            title: out.msg
                        })
                    })
                }
            }
        })
        e.preventDefault();
    });
    function PopupCenter(pageURL, title,w,h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+',  left='+left);
    }
</script>

