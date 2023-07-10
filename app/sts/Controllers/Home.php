<?php 
namespace Sts\Controllers;

use Core\ConfigView;
use Sts\Models\StsHome;

class Home{

    public function index(){

        $home = new StsHome();
        $home->index();
        $carregarView = new ConfigView("sts/Views/home/home");
        $carregarView->renderizar();
        
    }
}