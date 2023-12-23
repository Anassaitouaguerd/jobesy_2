<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

class email_controller
{
    public function send_email()
    {
    $mail = new PHPMailer(true);
    $email =  $_SESSION['email'] ;
    $name = $_SESSION['name'];
    $title_job = $_SESSION['title_job'];
    $massage = $_SESSION['massege'];
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'aitouageurdanass@gmail.com';                     //SMTP username
    $mail->Password   = 'vdsucjmbfhvsvqkw';                     //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('aitouageurdanass@gmail.com', 'Anass');
    $mail->addAddress($email ,$name);     
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');               //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');          //Optional name

    //Content
$mail->isHTML(true);                                            //Set email format to HTML
    $mail->Subject = $title_job;
    $mail->Body    = $message;
    $mail->AltBody = 'D\'ont replay to this email ';

    $mail->send();
    }
}














if(isset($_POST["send"])){

$mail = new PHPMailer(true):



$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->SMTPAuth = true;

$mail->Username = 'adgt1378@gmail.com'; //
$mail->Password = 'vdsucjmbfhvsvqkw '; // Y

$mail->SMTPSecure = 'ssl';

$mail->Port = 465;



}

$mail->setFrom(); // Your gmail
$mail->Subject = $_POST["subject"]; $mail->Body = $_POST["message"];

$mail->send();

?>