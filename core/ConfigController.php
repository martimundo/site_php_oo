<?php

namespace Core;

class ConfigController
{

    private $Url;
    private $UrlConjunto;
    private $UrlController;
    private $UrlParametro;
    private static $Format;

    public function __construct()
    {
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            
            $this->Url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);

            $this->limparUrl();

            $this->UrlConjunto = explode("/", $this->Url);

            if(isset($this->UrlConjunto[0])){
            
                $this->UrlController = $this->slugController($this->UrlConjunto[0]);

            }else{
                
                $this->UrlController = CONTROLLER;
            }

            if(isset($this->UrlParametro[1])){
                
                $this->UrlParametro = $this->UrlConjunto[1];

            }else{
                
                $this->UrlParametro = null;

            }
            echo "URL: {$this->Url}<br>";
            echo "Controller: {$this->UrlController}<br>";

        }else{

            $this->UrlController = 'Home';
            $this->UrlParametro = null;
        }
    }
    private function slugController($slugController){

        $UrlController = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($slugController)))));
        return $UrlController;
    }

    private function limparUrl()
    {

        $this->Url = strip_tags($this->Url);

        $this->Url = trim($this->Url);

        $this->Url = rtrim($this->Url, "/");

        self::$Format = array();
        
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]?;:.,\\\'<>°ºª ';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr--------------------------------';
        $this->Url = strtr(utf8_decode($this->Url), utf8_decode(self::$Format['a']), self::$Format['b']);
    }

    public function carregar(){

        $classe = "\\Sts\\Controllers\\".$this->UrlController;
        $carregarClasse = new $classe;
        $carregarClasse->index();
    }
}
