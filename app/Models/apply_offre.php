<?php
namespace App\Models;

class apply_offre{
   private $con ;
    public function __construct(){
         $this->con = Database::getInstance()->getConnection(); 
    }
    public function check_offre($user_id,$job_id){
        $sql = "SELECT * FROM offres WHERE id_user = $user_id AND job_id = $job_id";
        $result = $this->con->query($sql);
        $rows = mysqli_num_rows($result);
        return $rows;
    }
    public function new_offre($job_id,$user_id){
        $sql = "INSERT INTO `offres`(`id_user`, `job_id`, `status`) VALUES ($user_id, $job_id, 'save')";
        $result = $this->con->query($sql);
        return $result ;
    }
    public function change_status_job($job_id,$status_job ){
        $sql = "UPDATE `jobs` SET `status_job`= '$status_job' WHERE job_id = '$job_id' ";
        $result = $this->con->query($sql);
        return $result;
    }
}