    
        <div class="modal-body">
            <div class="container-fluid">
                <div class="form-msg"></div>
                <input type="hidden" name="id" value="<?php echo $dataBenur->id; ?>">
                <label for="Alamat" class="col-sm-12 bg-primary ">Data Petambak</label>
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Alamat" name="alamat" id="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->alamat; ?>" onkeyup="isi_otomatis()" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="register">Register</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Register" name="register" id="register" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->register; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nama" name="nama" id="nama" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->nama; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="namaPendaftar">Nama Pendaftar</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nama Pendaftar" name="namaPendaftar" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->namaPendaftar; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group" style="width: 100%;">
                            <label for="agen">AGEN</label>
                            <select name="idAgen" class=" select2 form-select   " aria-describedby="sizing-addon2">
                                <option value="0" >
                                    Pilih Nama Agen
                                </option>
                                <?php
                                foreach ($dataAgen as $agen) {
                                    ?>
                                    <option value="<?php echo $agen->id; ?>"  <?php if($agen->id == $dataBenur->idAgen){echo "selected='selected'";} ?>>
                                        AGEN <?php echo $agen->nama; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="noHp">No Hp</label>
                            <input type="text" class="form-control form-control-sm" name="noHp" placeholder="Nomor Telepon" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->noHp; ?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <label for="Alamat" class="col-sm-12 bg-red ">Data Tebar Benur</label>
                <div class="row">
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="jenis">Jenis Benur</label>
                            <select name="jnsBenur" id="jnsBenur" class="select2 form-select  " aria-describedby="sizing-addon2">
                                <option data-harga="0" data-perkantong="0" value="0">
                                    Pilih Jenis Benur
                                </option>
                                <?php
                                foreach ($dataJenisBenur as $jenis) {
                                    ?>
                                    <option data-harga="<?php echo $jenis->harga; ?>" data-perkantong="<?php echo $jenis->jumlah; ?>" value="<?php echo $jenis->kode; ?>" <?php if($jenis->kode == $dataBenur->jnsBenur){echo "selected='selected'";} ?>>
                                      <?php echo $jenis->nama; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="harga">Harga Benur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="harga" name="harga" id="harga" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->harga; ?>" onchange="sum();" onkeyup="sum();" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="perkantong">Perkantong</label>
                            <input type="text" class="form-control form-control-sm" placeholder="perkantong" name="perkantong" id="perkantong"aria-describedby="sizing-addon2" value="<?php echo $dataBenur->perkantong; ?>" onkeyup="sum(); ribuan_ketik('perkantong');" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="jmlBenur">Jumlah Tebar Benur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Jumlah Benur" name="jmlBenur" id="jmlBenur" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->jmlBenur; ?>" onkeyup=" sum_kantong(); ribuan_ketik('jmlBenur');" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="jmlKantong">Jumlah kantong</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Jumlah Kantong" name="jmlKantong" id="jmlKantong"aria-describedby="sizing-addon2" value="<?php echo $dataBenur->jmlKantong; ?>" onkeyup="sum();" onclick="sum();" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="form-group">
                            <label for="tglSchedule" >Tanggal Tebar</label>
                            <input type="date" class="form-control mb-3 flatpickr-no-config" placeholder="Select date.."  value="<?php echo time_date($dataBenur->tglSchedule); ?>" name=" tglSchedule" required/>
                        </div>
                    </div>
                <input type="hidden" class="form-control form-control-sm" placeholder="Total Biaya" name="biaya" id="biaya" aria-describedby="sizing-addon2" value="<?php echo ($dataBenur->biaya); ?>">

                    <div class="col-sm-6">
                        <label class="text-center" for="dp">Total</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Total" name="biayatampil" id="biayatampil" aria-describedby="sizing-addon2" value="Rp. <?php echo angka_indo($dataBenur->biaya); ?>" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
  <script type="text/javascript">

    $(document).ready(function() {
           $('.select2').select2({
               theme: "bootstrap-5",
               dropdownParent: $('#update-benur'),
       // width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
               placeholder: $( this ).data( 'placeholder' ),
           } );

           
           flatpickr('.flatpickr-no-config', {
               enableTime: false,
               dateFormat: "d-M-Y", 
           })
       });
       $(document).on('select2:open', () => {
               document.querySelector('.select2-search__field').focus();
             });
    
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

 


                function ribuan(bilangan, cur = '' ) {
            if (bilangan !== undefined && bilangan !== 0 ) {
                var number_string = bilangan.toString(),
                sisa  = number_string.length % 3,
                rupiaha  = number_string.substr(0, sisa),
                ribuan  = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiaha += separator + ribuan.join('.');
                    return cur + rupiaha;
                }
            } else if(bilangan === 0 ){
                return 0;
            }
        }
</script>

