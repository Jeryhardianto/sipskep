<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  function kirim_email($email_penerima, $nama_penerima, $judul_email,$isi_email){

    $email_pengirim        = getenv("MAIL_USERNAME") ?: "blatak29@gmail.com";
    $nama_pengirim         = "SIPSKEP";
    $sandi_pengirim        = getenv("MAIL_PASSWORD");

    if (!$sandi_pengirim) {
        return "Gagal: MAIL_PASSWORD belum diset";
    }

    //Load Composer's autoloader
    // require '../../vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                         //Jangan pernah cetak percakapan SMTP ke respons HTTP
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $email_pengirim;                     //SMTP username
        $mail->Password   = $sandi_pengirim;                        //SMTP password, dari env
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima, $nama_penerima);     //Tambah Email dan nama penerima
       


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $judul_email;
        $mail->Body    = $isi_email;

        $mail->send();
        return "Sukses";
    } catch (Exception $e) {
        return "Gagal: {$mail->ErrorInfo}";
    }

}