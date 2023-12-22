<?php
namespace App\Controllers;
class home_controller{
    public function home()
    {
        require(__DIR__ .'../../../view/user/home.php');
    }
    public function candidat()
    {
        require(__DIR__ .'../../../view/dashboard/candidat.php');
    }
    public function contact()
    {
        require(__DIR__ .'../../../view/dashboard/contact.php');
    }
    public function page_notfound()
    {
        require(__DIR__ .'../../../view/page_notFound.php');
    }

}