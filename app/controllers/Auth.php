<?php 
class Auth extends Controller{



    public function index(){
        $data['judul']      = 'Login | SIPSKEP';
       $this->view('auth/login', $data);
    }
     function _login()
    {
        $email          = htmlspecialchars(Input::get('email'));   
        $password       = htmlspecialchars(Input::get('password')); 
      

        //Parsing ke model untuk dicek
        $user                  = $this->model('Auth_model')->cekUser($email);
        $userSession           = $this->model('Auth_model')->setSession($email);
    
        // var_dump($user);
        // var_dump($userSession[0]['password']);
        // die();
        
        
        if ($user) {
          if (password_verify($password, $userSession[0]['password'])) {
                    $_SESSION['id_pengguna']        = $userSession[0]['id_pengguna'];
                    $_SESSION['nama']               = $userSession[0]['nama'];
                    $_SESSION['email']              = $userSession[0]['email'];
                    $_SESSION['level']              = $userSession[0]['level'];
                    $_SESSION['status']             = 'logged';

                //Cek Apakah email Sduah di verifikasi
                if ($userSession[0]['verify_email']  == '1') {
                    if ($_SESSION['level']  == '1' && $_SESSION['status'] == 'logged' ) {
                        header('Location:'.BASEURL.'home_admin');
                    }elseif ($_SESSION['level']  == '2' && $_SESSION['status'] == 'logged') {
                        echo 'Hello ini Staff Kelurahan';
                    }elseif ($_SESSION['level']  == '3' && $_SESSION['status'] == 'logged') {
                        echo 'Hello ini Staff Kecamatan';
                    }elseif ($_SESSION['level']  == '4' && $_SESSION['status'] == 'logged') {
                        echo 'Hello ini Camat';
                    }elseif ($_SESSION['level']  == '5' && $_SESSION['status'] == 'logged')  {
                      header('Location:'.BASEURL.'home_users');
                    }
                } else {
                     Flasher::setFlash('Silahkan melakukan aktivasi','email anda','red');
                     header('Location:'.BASEURL);
                     exit;
                }
                   

            }else {
                Flasher::setFlash('Email atau passowrd','salah','red');
                header('Location:'.BASEURL);
                exit;
            }


       }else {
         Flasher::setFlash('Email tidak','terdaftar','red');
         header('Location:'.BASEURL);
         exit;
        }
    }

    public function signup(){
        $data['judul']      = 'Sigup | SIPSKEP';
        $this->view('auth/register', $data);
    }

    public function _signup(){
        if (Input::get('daftar')) {
            date_default_timezone_set("Asia/Jakarta");
            $time           = time();
            $date_created   = date('Y-m-d H:i:s');
            $data = [
                'nama'          => Input::get('nama'),
                'email'         => Input::get('email'),
                'verify_email'  => 0,
                'password'      => password_hash(Input::get('pass1'), PASSWORD_DEFAULT),
                'token'         => md5($time),
                'date_created'  => $date_created,
                'level'         => 5,
            ];

            //Cek Email
             $email       = strtolower($data['email']);
             $cekEmail    = $this->model('Auth_model')->cekEmail($email);
             $email2      = strtolower($cekEmail[0]['email']);
           
             if ($email==  $email2 ) {
                 Flasher::setFlash('Email sudah ada','','red');
                 header('Location:'.BASEURL.'auth/signup');
                 exit;
             }        
            if (Input::get('pass1') != Input::get('pass2')) {
                Flasher::setFlash('Password tidak sama','','red');
                header('Location:'.BASEURL.'auth/signup');
                    exit;
            }

            if (!filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL)) {
                    Flasher::setFlash('Email yang anda masukan tidak','valid','red');
                    header('Location:'.BASEURL.'auth/signup');
                    exit;
                }

            //ambil token
            $token       = $data['token'];
            $userRegister = $this->model('Auth_model')->_register($data);
            if ($userRegister) {
                //Kirim email
                $judul_email        = "Konfirmasi Pendaftaran";
                $isi_email = '<html lang="zxx">
            <head>
                <meta charset="UTF-8" />
                <meta name="description" content="sipskep" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                <meta http-equiv="X-UA-Compatible" content="ie=edge" />
                <title>BOBOK ID</title>
                <link rel="icon" href="img/assets/logo-bulat.png" />

                <!-- Google Font -->
                <link
                href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap"
                rel="stylesheet"
                />
                <link
                href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap"
                rel="stylesheet"
                />

                <style>
                .box {
                    max-width: 600px;
                    height: 600px;
                    background-color: white;
                    border-radius: 5px;
                }
                .box-body {
                    max-width: 600px;
                    text-align: left;
                    margin-left: 20px;
                }
                .text-muted {
                    color: #6c757d !important;
                }
                h1 {
                    margin-top: 0px;
                    font-size: 2.5rem;
                    margin-bottom: 5px;
                    color: rgb(0, 0, 0, 0.9);
                    font-weight: 300;
                }
                .h2,
                h2 {
                    margin-top: 0px;
                    font-size: 2rem;
                    margin-bottom: px;
                    color: rgb(0, 0, 0, 0.9);
                    font-weight: 300;
                }
                h3 {
                    margin-top: 0px;
                    font-size: 1.75rem;
                    margin-bottom: 5px;
                    color: rgb(0, 0, 0, 0.9);
                    font-weight: 300;
                }
                h4 {
                    margin-top: 0px;
                    font-size: 1.5rem;
                    margin-bottom: 5px;
                    color: rgb(0, 0, 0, 0.9);
                    font-weight: 300;
                }
                h5 {
                    margin-top: 0px;
                    font-size: 1.25rem;
                    margin-bottom: 5px;
                    color: rgb(0, 0, 0, 0.9);
                    font-weight: 300;
                }
                h6 {
                    margin-top: 0px;
                    font-size: 1rem;
                    margin-bottom: 5px;
                    color: rgb(0, 0, 0, 0.9);
                    font-weight: 300;
                }
                </style>
            </head>

            <body style="background-color: rgb(128, 128, 128, 0.08)">
                <br />

                <div>
                <center>
                    <div class="box">
                    <div>
                        <img
                        src="https://login.punokawanindonesia.com/images/header-logo.png"
                        style="max-width: 600px; border-radius: 5px 5px 0 0"
                        alt=""
                        />
                    </div>
                    <div class="box-body">
                        <br />
                        <h4>Hai, '.Input::get('nama').' </h4>
                        
                        <p class="text-muted" style="margin-top: 5px">
                        Terimakasih telah melakukan pendaftaran. <br/>
                        Akun Anda telah dibuat, Anda dapat masuk dengan <b>Username</b> berikut.
                        </p>
                    </div>
                    <div
                        style="
                        width: 550px;
                        height: auto;
                        border: 1px solid rgb(0, 0, 0, 0.6);
                        border-radius: 5px;
                        "
                    >
                        <div style="margin-top: 10px">
                        <small class="text-muted">Username</small>
                        <h4>'.Input::get('email').'</h4>
                        <hr style="width: 500px; margin-top: 20px" />
                        <div style="margin-top: 10px">
                            <p style="width: 500px">
                                 Klik link dibawah ini untuk mengaktifkan akun anda :<br/>
                                 '.BASEURL.'verify/'.Input::get('email').'/'.$token.'
                            </p>
                        </div>
                        </div>
                    </div>
                    <div>
                       
                    </div>
                    <div
                        style="
                        background-image: url(https://login.punokawanindonesia.com/images/footer-logo.png);
                        background-repeat: no-repeat;
                        background-size: cover;
                        height: 80px;
                        width: 600px;
                        border-radius: 0 0 5px 5px;
                        "
                    >
                        <div>
                        <p style="color: white">
            
                        
                            <br />
                            Copyright '.date("Y").' SIPSKEP - All Rights Reserved.
                        </p>
                        </div>
                    </div>
                    </div>
                </center>
                </div>
            </body>
            </html>';
                kirim_email(Input::get('email'), Input::get('username'), $judul_email, $isi_email);

                Flasher::setFlash('Akun anda telah dibuat.Silahkan cek email dan melakukan', 'aktivasi akun.', 'green');
                header('Location:'.BASEURL.'auth/signup');
            }

        }
            
    }



      public function errorpage(){
        $data['judul']      = '404 Not Found | SIPSKEP';
        $this->view('auth/404', $data);
    }


     public function logout() {
        unset($_SESSION['idtoko']);
        unset($_SESSION['nama']);
        unset($_SESSION['userid']);
        unset($_SESSION['email']);
        unset($_SESSION['status']);
        Flasher::setFlash('Anda berhasil','logout','red');
        header('Location:'.BASEURL.'admin');

    }


}