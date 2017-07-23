<?php

function mail($from, $nama_perusahaan)
{

date_default_timezone_set('Etc/UTC');

require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "luckman.heckem@gmail.com";

$mail->Password = "";

$mail->setFrom('luckmanheckem@gmail.com', 'Luqman Hakim');

// $mail->addReplyTo('luckman.heckem@gmail.com', 'Luqman Hakim');

$mail->addAddress('luckman.heckem@gmail.com', 'Luqman Hakim');

$mail->Subject = 'Konfirmasi Pembayaran Iklan lokercilacap.com';

$mail->msgHTML("<body style='margin: 10px;'>
        <div style='width: 640px; font-family: Helvetica, sans-serif; font-size: 13px; padding:10px; line-height:150%; border:#eaeaea solid 10px;'>
        <br>
        <strong>Terima Kasih Telah Mendaftar</strong><br>
        <b>Nama Perusahaan : </b>".$nama_perusahaan."<br>
        <b>Email : </b>".$from."<br>
        <b>URL Konfirmasi : </b>http://domain-anda.com/mailer/confirm.php?id=".$id."<br>
        <br>
        </div>
        </body>");

$mail->AltBody = 'Konfirmasi Pembayaran Iklan lokercilacap.com';

// $mail->addAttachment('images/phpmailer_mini.png');

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";

}
	return mail($from,$nama_perusahaan);
}