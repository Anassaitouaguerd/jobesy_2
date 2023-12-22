<?php
namespace App\Models;
class search_job{
    private $con ;
    public function __construct(){
         $this->con = Database::getInstance()->getConnection(); 
    }
    function search_job($name , $location , $company){
        $sql = "SELECT * FROM jobs WHERE title LIKE '%$name%' 
        AND `location` LIKE '%$location%' 
        AND company LIKE '%$company%' AND status_job='actif'";
        $result = $this->con->query($sql);
        $job = [];
        while ($row = $result->fetch_assoc()) {
            $job[] = $row;
        }
        return $job;
    }   
 }


?>