    <form method="POST" id="form-update-benur-kirim">
        <div class="modal-body">
            <div class="container-fluid">
                <div class="form-msg"></div>
                <input type="hidden" name="id" value="<?php echo $dataBenur->id; ?>">
                <label for="Alamat" class="col-sm-12 bg-primary ">Data Petambak</label>
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="Alamat">Alamat</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Alamat" name="alamat" id="alamat" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->alamat; ?>" onkeyup="isi_otomatis()" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="register">Register</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Register" name="register" id="register" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->register; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nama" name="nama" id="nama" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->nama; ?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="namaPendaftar">Nama Pendaftar</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Nama Pendaftar" name="namaPendaftar" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->namaPendaftar; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group" style="width: 100%;">
                            <label class="col-form-label col-form-label-sm" for="agen">AGEN</label>
                            <select name="idAgen" class="form-control form-control-sm select2 " aria-describedby="sizing-addon2">
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="noHp">No Hp</label>
                            <input type="text" class="form-control form-control-sm" name="noHp" placeholder="Nomor Telepon" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->noHp; ?>" autocomplete="off">
                        </div>
                    </div>
                </div>
                <label for="Alamat" class="col-sm-12 bg-red ">Data Tebar Benur</label>
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis">Jenis Benur</label>
                            <select name="jnsBenur" id="jnsBenur" class="select2 form-control form-control-sm" aria-describedby="sizing-addon2">
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="harga">Harga Benur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="harga" name="harga" id="harga" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->harga; ?>" onchange="sum();" onkeyup="sum();" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="perkantong">Perkantong</label>
                            <input type="text" class="form-control form-control-sm" placeholder="perkantong" name="perkantong" id="perkantong"aria-describedby="sizing-addon2" value="<?php echo $dataBenur->perkantong; ?>" onkeyup="sum(); ribuan_ketik('perkantong');" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jmlBenurKirim">Jumlah Tebar Benur</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Jumlah Benur" name="jmlBenurKirim" id="jmlBenurKirim" aria-describedby="sizing-addon2" value="<?php echo $dataBenur->jmlBenurKirim; ?>" onkeyup=" sum_kantong(); ribuan_ketik('jmlBenurKirim');" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jmlKantong">Jumlah kantong</label>
                            <input type="number" class="form-control form-control-sm" placeholder="Jumlah Kantong" name="jmlKantong" id="jmlKantong"aria-describedby="sizing-addon2" value="<?php echo $dataBenur->jmlKantong; ?>" onkeyup="sum();" onclick="sum();" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="tglSchedule" >Tanggal Tebar</label>
                            <div id="datepicker-group" class="input-group date" data-date-format="dd-mm-yyyy">
                                <input class="form-control form-control-sm" name="tglSchedule" type="text" placeholder="DD-MM-YYYY" autocomplete="off" value="<?php echo time_convert($dataBenur->tglSchedule); ?>"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" class="form-control form-control-sm" placeholder="Total Biaya" name="biaya" id="biaya" aria-describedby="sizing-addon2" value="<?php echo ($dataBenur->biaya); ?>">
                <div class="form-row">
                    <div class="col-sm-6">
                        <label class="text-center" for="dp">Total</label>
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" placeholder="Total" name="biayatampil" id="biayatampil" aria-describedby="sizing-addon2" value="Rp. <?php echo angka_indo($dataBenur->biaya); ?>" disabled>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="text-center" for="dp">Pembayaran DP</label>
                            <input type="text" class="form-control form-control-sm" placeholder="Pembayaran DP" name="dp" id="dp" aria-describedby="sizing-addon2" value="<?php echo angka_indo($dataBenur->dp); ?>" onkeyup="ribuan_ketik('dp','Rp. ');" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan Data</button>
        </div>
    </form>

    
  <script type="text/javascript">
    $(document).ready(function() {
      $("#datepicker-group").datepicker({
        format: "dd M yyyy",
        todayHighlight: true,
        autoclose: true,
        clearBtn: true
      });

      $(".select2").select2({
        theme: "bootstrap4"});
    });
    // $('.select2').on('select2:open', function (e) {
    //    document.querySelector('.select2-search__field').focus();
    // });
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
      var jmlBenurKirim = (perkantong.replace(/[^,\d]/g, '').toString()) * (jmlKantong.replace(/[^,\d]/g, '').toString());
      var totalharga = jmlBenurKirim * (harga.replace(/[^,\d]/g, '').toString());
      
      if (!isNaN(jmlBenurKirim) && jmlBenurKirim !== 0) {
        document.getElementById('jmlBenurKirim').value = ribuan(jmlBenurKirim);
      }
      if (!isNaN(totalharga) && totalharga !== 0) {
        document.getElementById('biaya').value = ribuan(totalharga,'Rp. ');
        document.getElementById('biayatampil').value = ribuan(totalharga,'Rp. ');
      }
    }

    function sum_kantong() {
      var jmlBenurKirim = document.getElementById('jmlBenurKirim').value;
      var perkantong = document.getElementById('perkantong').value;
      var harga = document.getElementById('harga').value;
      var jmlKantong = (jmlBenurKirim.replace(/[^,\d]/g, '').toString()) / (perkantong.replace(/[^,\d]/g, '').toString());
      var biaya = (jmlBenurKirim.replace(/[^,\d]/g, '').toString()) * (harga.replace(/[^,\d]/g, '').toString());
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
      var jmlBenurKirim = biaya.replace(/[^,\d]/g, '').toString() / (harga.replace(/[^,\d]/g, '').toString());
      var jmlKantong = jmlBenurKirim / (perkantong.replace(/[^,\d]/g, '').toString());

      if (!isNaN(jmlBenurKirim) && jmlBenurKirim !== 0) {
        document.getElementById('jmlBenurKirim').value = (jmlBenurKirim);
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

  </script>