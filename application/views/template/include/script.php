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

</script>