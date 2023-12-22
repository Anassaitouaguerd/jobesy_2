<?php
namespace App\Controllers;
use App\Models\statistique;

class dashboard_controller
{
    private $info_jobs;
    public function __construct()
    {
        $this->info_jobs = new statistique();
    }
    public function S_jobs()
    {
        $all_job = $this->info_jobs->statistique_jobs();
        $job_actif = $this->info_jobs->job_actif();
        $users = $this->info_jobs->number_user();
        $inaprouve = $this->info_jobs->offre_inaprouve();
        $aprouve = $this->info_jobs->offre_aprouve();
        require(__DIR__ .'../../../view/dashboard/dashboard.php');
    }
}