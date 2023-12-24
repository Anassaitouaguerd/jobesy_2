<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
namespace App\Controllers;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require __DIR__ . '../../../vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

class email_controller
{
    public function send_email()
    {
    
        try 
        {

    $mail = new PHPMailer(true);
    $email =  $_SESSION['email'] ;
    $name = $_SESSION['name'];
    $title_job = $_SESSION['title_job'];
    $message = $_SESSION['message'];
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username   = 'aitouageurdanass@gmail.com';   
    $mail->Password   = 'vdsu cjmb fhvs vqkw';     
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465; 

    
    $mail->setFrom('aitouageurdanass@gmail.com' ,'Anass');
    $mail->addAddress($email);  
    

    //Content
    $mail->isHTML(true);                                           
    $mail->Subject = $title_job;
    $mail->Body    = $message;
    $mail->AltBody = 'Dont replay to this email ';
    $mail->send();
  
        }catch (Exception $e) 
        {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}