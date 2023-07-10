<?php

namespace Sts\Models\Helpers;

use Exception;
use PDO;

class StsConn{

    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASS;
    public static $DbName = DBNAME;
    public static $Porta = PORTA;
    private static $connect = null;

    private static function connect(){
       

        try {
            if(self::$connect ==null){

                //self::$connect = new PDO('mysql:host='.self::$Host.';port='.self::$Porta.';dbname='.self::$DbName, self::$User,self::$Pass);
                self::$connect = new PDO('mysql:host=' . ';port=' . self::$Porta . self::$Host . ';dbname=' . self::$DbName, self::$User, self::$Pass);
            }
            
        } catch (Exception $e) {

            echo "Mensagem: ".$e->getMessage();
        }
    }

    public function getConnect(){

        return self::connect();
    }

}