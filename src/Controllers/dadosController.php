<?php


namespace App\Controllers;

class dadosController{

    public function __construct()
    {
    }

    public function index(){
        require_once __DIR__ .  "/../Views/dados.php";
    }
}