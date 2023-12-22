<?php
namespace App\Controllers;
session_start();
use App\Models\search_job;

class search_job_controller
{
    public function search()
    {
        if(isset($_GET['name']))
        {
            header('Content-Type: application/json');
            $job = new search_job();
            $name = $_GET['name'];
            $location = $_GET['location'];
            $company = $_GET['company'];
            $jobs = $job->search_job($name , $location , $company);
            
            if($jobs)
            {
                echo json_encode($jobs); 
            }
        }
    }
} 
?>