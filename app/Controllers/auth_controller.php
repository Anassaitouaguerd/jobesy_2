<?php
namespace App\Controllers;
session_start();
use App\Models\auth;

class auth_controller
{
    public function login()
    {
        require(__DIR__ .'../../../view/user/login.php');
        if(isset($_POST['login']))
        {
            extract($_POST);
            $log = new auth();
            $don = $log->login($email , $password);
            if($don)
            {
                // echo "<pre>" ;
                // var_dump($SESSION['userName']);
                // echo "</pre>" ;
                $_SESSION['userRole'] = $don[0]['role_name'];
                $_SESSION['userName'] = $don[0]['username'];
                $_SESSION['userid'] = $don[0]['id_user'];
                $_SESSION['userEmail'] = $don[0]['email'];
                if($_SESSION['userRole'] == "admin")
                {
                    header('location: dashboard');
                }else
                {
                    header('location: home');
                }
            }
            
        }
    }
    public function register()
    {
        require(__DIR__ .'../../../view/user/register.php');
        if(isset($_POST['register']))
        {
            extract($_POST);
            $reg = new auth();
            $isexist = $reg->login($email , $password);
            if($isexist)
            {
                $_SESSION['messageError'] = "This account already exists.";
                header('location: register');
            }
            else
            {
                
                $don = $reg->register($username , $email , $password);
                if($don)
                {
                    $isexist = $reg->login($email , $password);
                    $_SESSION['userRole'] = $isexist[0]['role_name'];
                    $_SESSION['userid'] = $isexist[0]['id_user'];
                    $_SESSION['userName'] = $isexist[0]['username'];
                    $_SESSION['userEmail'] = $isexist[0]['email'];
                    header('location: home');
                }
            }
        }
    }
    public function logout()
    {
            session_destroy();
            header('location: home'); 
    }
}
    ?>