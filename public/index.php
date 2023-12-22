<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../vendor/autoload.php';
use App\Controllers\aprouve_controller;
use App\Controllers\auth_controller;
use App\Controllers\crud_jobs_controller;
use App\Controllers\search_job_controller;
use App\Controllers\home_controller;
use App\Controllers\dashboard_controller;


$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$route = [
    '/' => 'Controllers/home_controller.php',
    '/home' => 'Controllers/home_controller.php',
    '/candidat' => 'Controllers/home_controller.php',
    '/contact' => 'Controllers/home_controller.php',
    '/page_notfound' => 'Controllers/home_controller.php',
    '/dashboard' => 'Controllers/dashboard_controller.php',
    '/search' => 'Controllers/search_job_controller.php',
    '/notification' => 'Controllers/aprouve_controller.php',
    '/apply' => 'Controllers/aprouve_controller.php',
    '/apply_accepted' => 'Controllers/aprouve_controller.php',
    '/apply_rejected' => 'Controllers/aprouve_controller.php',
    '/offre' => 'Controllers/aprouve_controller.php',
    '/login' => 'Controllers/auth_controller.php',
    '/register' => 'Controllers/auth_controller.php',
    '/logout' => 'Controllers/auth_controller.php',
    '/Jobs' => 'Controllers/crud_jobs_controller.php',
    '/add_jobs' => 'Controllers/crud_jobs_controller.php',
    '/edit_jobs' => 'Controllers/crud_jobs_controller.php',
    '/delet_jobs' => 'Controllers/crud_jobs_controller.php'
];
if(array_key_exists($url,$route)){
    switch ($url) {
        case '/':
            $controller = new home_controller();
            $controller->home();
            break;
        case '/home':
            $controller = new home_controller();
            $controller->home();
            break;
        case '/candidat':
            $controller = new home_controller();
            $controller->candidat();
            break;
        case '/contact':
            $controller = new home_controller();
            $controller->contact();
            break;
        case '/search':
            $controller = new search_job_controller();
            $controller->search();
            break;
        case '/login':
            $authcontroller = new auth_controller();
            $authcontroller->login();
            break;
        case '/register':
            $authcontroller = new auth_controller();
            $authcontroller->register();
            break;
        case '/logout':
            $authcontroller = new auth_controller();
            $authcontroller->logout();
            break;
        case '/dashboard':
            $dashcontroller = new dashboard_controller();
            $dashcontroller->S_jobs();
            break;
        case '/offre':
            $offrecontroller = new aprouve_controller();
            $offrecontroller->d_offre();
            break;
        case '/notification' :
            $controller = new aprouve_controller();
            $controller->d_notification();
            break;
        case '/apply' :
            $controller = new aprouve_controller();
            $controller->apply_job();
            break;
        case '/apply_accepted' :
            $controller = new aprouve_controller();
            $controller->accept_Job();
            break;
        case '/apply_rejected' :
            $controller = new aprouve_controller();
            $controller->reject_job();
            break;
        case '/Jobs':
                $offrecontroller = new crud_jobs_controller();
                $offrecontroller->d_job();
                break;
        case '/add_jobs' :
            $controller = new crud_jobs_controller();
            $controller->addJob();
            break;
        case '/edit_jobs' :
            $controller = new crud_jobs_controller();
            $controller->editJob();
            break;
        case '/delet_jobs' :
            $controller = new crud_jobs_controller();
            $controller->deletJob();
            break;
            default:
            header('HTTP/1.0 404 Not Found');
            exit('Page not found');
        }
    }else{
            $controller = new home_controller();
            $controller->page_notfound();
    // http_response_code(404);
    // header("HTTP/1.0 404 Not Found");
    //  echo file_get_contents(JURI::root().'./error-404');
 exit;
}
die();
?>