<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({
            theme: "bootstrap-5",
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

        $(document).on("click", ".update-dataBenur", function() {
          var id = $(this).attr("data-id");
          $.ajax({
            method: "POST",
            url: "<?php echo base_url('benur/pendaftaran/form_update'); ?>",
            data: "id=" +id,
          })
          .done(function(data) {
            $('#tempat-modal').html(data);
            $('#update-benur').modal('show');
          })
        })
        $(window).scroll(function() {
            var windscroll = $(window).scrollTop();
            if (windscroll >= 250) {
                $('.fixed-menu').addClass('fixed justify-content-center align-self-center');
                $('#fixed-menu-1').removeClass( "col-sm-2" ).addClass( "col-sm-1" );
                $('#fixed-menu-4').removeClass( "col-sm-2" ).addClass( "col-sm-1" );
                $('#fixed-menu-5').removeClass( "col-sm-2" ).addClass( "col-sm-1" );
                $('#fixed-menu-6').hide();  
                $('#fixed-menu-7').hide();
                $('#fixed-menu-0').show();
            } else {
                $('.fixed-menu').removeClass('fixed justify-content-center align-self-center');
                $('#fixed-menu-1').removeClass( "col-sm-1" ).addClass( "col-sm-2" );
                $('#fixed-menu-2').removeClass( "col-sm-1" ).addClass( "col-sm-2" );
                $('#fixed-menu-3').removeClass( "col-sm-1" ).addClass( "col-sm-2" );
                $('#fixed-menu-4').removeClass( "col-sm-1" ).addClass( "col-sm-2" );
                $('#fixed-menu-5').removeClass( "col-sm-1" ).addClass( "col-sm-2" );
                $('#fixed-menu-6').show();    
                $('#fixed-menu-7').show();  
                $('#fixed-menu-0').hide();      
            }
         
        }).scroll();

        function PopupCenter(pageURL, title,w,h) {
            var left = (screen.width/2)-(w/2);
            var top = (screen.height/2)-(h/2);
            var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+',  left='+left);
        }
</script>