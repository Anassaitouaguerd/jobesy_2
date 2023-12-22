<?php
namespace App\Controllers;
use App\Models\apply_offre;
use App\Models\aprouve_offer;
session_start();

class aprouve_controller
{
    private $apply;
    private $accept;

    public function __construct()
    {
        $this->apply = new apply_offre();
        $this->accept = new aprouve_offer();
    }

    public function apply_job()
    {
        if(isset($_GET['id']))
        {
            $job_id = $_GET['id'];
            $user_id = $_SESSION['userid'];
            $check = $this->apply->check_offre($user_id,$job_id);
            if($check > 0)
            {
                echo "false";
            }else{
                $add_offre = $this->apply->new_offre($job_id,$user_id);
                if($add_offre)
                {
                    echo "succes"; 
                }
            }
        }
    }
    public function accept_Job()
    {
        if(isset($_GET['id_offre']))
        {
            $offre_id = $_GET['id_offre'];
            $job_id = $_GET['id_job'];
            // $_SESSION['id_user'] = $_GET['id_user'];
                $_SESSION['reponse'] = "accepted" ;
                $status = "aprouve";
                $status_job = "inactif";
                $aprouve = $this->accept->change_status($offre_id,$status );
                $change_status = $this->apply->change_status_job($job_id,$status_job);
                if($aprouve && $change_status)
                {
                    header('location: offre');
                }
        }
    }
    public function reject_job()
    {
        $offre_id = $_GET['id_offre'];
            $_SESSION['reponse'] = "rejected";
            $status_job = "actif";
            $status = "inaprouve";
            $aprouve = $this->accept->change_status($offre_id,$status);
            $change_status = $this->apply->change_status_job($job_id,$status_job);
            if($aprouve && $change_status){
                header('location: offre');
            } 
    }
    public function d_notification()
    {
        if(isset($_GET['id_user']))
        {
            $id_user = $_GET['id_user'];
            $noti = $this->accept->display_notification($id_user);
            require(__DIR__ .'../../../view/user/notification.php');
        }
    }
    public function d_offre()
    {
        $display_offer = $this->accept->display();
        
        require(__DIR__ .'../../../view/dashboard/offre.php');
    }

}