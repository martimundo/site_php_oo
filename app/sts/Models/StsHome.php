<?php

namespace Sts\Models;

use Sts\Models\Helpers\StsConn;

class StsHome{

    public function index(){

        $conectar = new StsConn();
        $conectar->getConnect();

        echo "Listar dados da HOME<br>";
    }
}