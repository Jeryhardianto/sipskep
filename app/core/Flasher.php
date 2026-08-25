<?php 
class Flasher {
    
    public static function setFlash($pesan, $aksi, $tipe){
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe,
        ];
    }

    //Method untuk menampilkan data
    public static function flash(){
            
        //cek session
        if (isset ($_SESSION['flash'])) {
            // echo '<div class="alert alert-'. $_SESSION['flash']['tipe'].' alert-dismissible fade show" role="alert">
            //             Data <strong>'. $_SESSION['flash']['pesan'].'</strong>'. $_SESSION['flash']['aksi'].'
            //             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                 <span aria-hidden="true">&times;</span>
            //             </button>
            //     </div>';
            echo '<div style="background: '.$_SESSION['flash']['tipe'].' ;  border-radius: 10px; padding:10px; color:white"><span>'.$_SESSION['flash']['pesan'].' '.$_SESSION['flash']['aksi'].'</span></div>';

                //Hapus Session
                unset($_SESSION['flash']);
        }
    }


}