<?php
namespace App\Models;
class aprouve_offer{
    
    private $con ;
    public function __construct(){
         $this->con = Database::getInstance()->getConnection(); 
    }
    public function display(){
        $sql = "SELECT * FROM offres 
        JOIN users ON offres.id_user = users.id_user 
        JOIN jobs ON offres.job_id = jobs.job_id
        WHERE `status` IN ('inaprouve', 'save')";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
    public function change_status($offre_id , $status){
        $sql = "UPDATE `offres` SET `status`= '$status' WHERE id = $offre_id ";
        $result = $this->con->query($sql);
        return $result;
    }
    public function display_notification($id_user){
        $sql = "SELECT * FROM offres NATURAL JOIN jobs WHERE id_user = '$id_user'";
        $result = $this->con->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}