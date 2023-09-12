<?php 

function time_convert($timestamp, $timezone = 'Asia/Jakarta'){
        $datetime = new DateTime($timestamp, new DateTimeZone($timezone));
        return $datetime->format('d-M-Y');
    }

function time_date($timestamp, $timezone = 'Asia/Jakarta'){
        $datetime = new DateTime($timestamp, new DateTimeZone($timezone));
        return $datetime->format('Y-m-d');
   }

function tgl_indo($timestamp){
    $timezone = 'Asia/Jakarta';
    $datetime = new DateTime($timestamp, new DateTimeZone($timezone));
    $tanggal = $datetime->format('d m Y');
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode(' ', $tanggal);

    return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
}
    function only_numbers($c=0)
    {
        return preg_replace("/[^0-9]/", "",$c) ;
    }

    function angka_indo($angka, $rp=''){
        
        $hasil_rupiah = $rp . number_format($angka,0,',','.');
        return $hasil_rupiah;
     
    }
    function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
                $temp = " ". $huruf[$nilai];
            } else if ($nilai <20) {
                $temp = penyebut($nilai - 10). " belas";
            } else if ($nilai < 100) {
                $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
            } else if ($nilai < 200) {
                $temp = " seratus" . penyebut($nilai - 100);
            } else if ($nilai < 1000) {
                $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
            } else if ($nilai < 2000) {
                $temp = " seribu" . penyebut($nilai - 1000);
            } else if ($nilai < 1000000) {
                $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
            } else if ($nilai < 1000000000) {
                $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
            } else if ($nilai < 1000000000000) {
                $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
            } else if ($nilai < 1000000000000000) {
                $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
            }     
            return $temp;
        }
     
        function terbilang($nilai) {
            if($nilai<0) {
                $hasil = "minus ". trim(penyebut($nilai));
            } else {
                $hasil = trim(penyebut($nilai));
            }           
            return $hasil;
        }

        function kode_benur($string){
            return str_replace(['regular', 'premium', 'maksimalprima'],  ['reg','prem', 'mp'], $string);
        }

        function kode_nama($string){
            return str_replace(['reg','prem', 'mp'],['Regular', 'Premium', 'Maksimal Prima'], $string);
        }


          // MSG form
            function show_err_msg($content='', $size='14px') {
                if ($content != '') {
                    return   '<p class="box-msg">
                              <div class="alert alert-danger" role="alert">
                                  <h4 class="alert-heading">
                                    <i class="ion-ios-information-outline"></i>
                                  </h4>
                                  <div class="info-box-content" style="font-size:' .$size .'">
                                    ' .$content
                                .'</div>
                              </div>
                            </p>';
                }
            }

            function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
                $_ci = &get_instance();

                if ($id != '') {
                    echo   '
                    <div class="modal" id="' .$id .'" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">'.$title .'</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary ' .$class .'">' .$yes .'</button>
                            <button type="button" class="btn btn-danger btl" data-dismiss="modal">' .$no .'</button>
                          </div>
                        </div>
                      </div>
                    </div>';
                }
            }
            // MODAL
            function show_my_modal($content='', $title='',$id='', $data='', $size='md', $class_save = "") {
               $_ci = &get_instance();

                  if ($content != '') {
                      $view_content = $_ci->load->view($content, $data, TRUE);

                      return '<div class="modal fade text-left w-100" id="' .$id .'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true" > 
                      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-' .$size .'" role="document" >
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel16"> ' .$title .' </h4>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x">&times;</i>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  ' .$view_content .'
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" >
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Tutup</span>
                                  </button>
                                  <button type="button" class="btn btn-primary ms-1 ' .$class_save .'" data-bs-dismiss="modal" >
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan Data</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>';
                  }
              }

              function show_my_modal_form($content='', $title='',$id_form='', $id='', $data='', $size='md') {
                  $_ci = &get_instance();

                  if ($content != '') {
                      $view_content = $_ci->load->view($content, $data, TRUE);

                      return '<form method="POST" id="' .$id_form .'">
                      <div class="modal fade text-left w-100"
                            id="' .$id .'" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-' .$size .'"
                              role="document" >
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel16"> ' .$title .' </h4>
                                  <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <i data-feather="x">&times;</i>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  ' .$view_content .'
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal" >
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                  </button>
                                  <button type="submit" class="btn btn-primary ms-1" data-bs-dismiss="modal" >
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Accept</span>
                                  </button>
                                </div>
                              </div>
                            </div>
                          </div>
                          </form>';
                  }
                }

?>