<?php





//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
        /*
        SACAMOS ESTAS VARIABLES COMO GLOBAL
  $titulo  $fecha $reloj $emisor $remitente $responsable $descripcion $travel

                            RESPONSABLE REMITENTE IMPORTAN
*/
  GLOBAL $titulo,$emisor,$remitente,$responsable,$descripcion,$geo,$estado,$TRAVEL,$correo;
require 'libreria/mailer/PHPMailer/src/Exception.php';
require 'libreria/mailer/PHPMailer/src/PHPMailer.php';
require 'libreria/mailer/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';'smtp.upb.edu';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'marcorocadota@gmail.com';                     //SMTP username
    $mail->Password   = 'vfppzddzqubzovxc';                               //SMTP password
    $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('marcorocadota@gmail.com', 'Marco Antonio');
    $mail->addAddress($correo);     //Add a recipient

    //Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Sistema de Correspondencia-UPB';
    $mail->Body    = "<center><b>Hola $responsable - Correspondencia #$TRAVEL</b></center>Estado del Documento: $estado<br>Concepto: $titulo<br>Descripcion: $descripcion<br>Remitente: $remitente<br>Ver geolocalizacion: $geo";

    $mail->send();
    echo"<script type=\"text/javascript\">";
 echo alert("Mensaje enviado!");
echo"</script>";
} catch (Exception $e) {
    echo"<script type=\"text/javascript\">";
 echo alert("El mensaje no pudo ser enviado Mailer Error: {$mail->ErrorInfo}");
echo"</script>";
   


}
