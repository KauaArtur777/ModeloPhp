<?php 
    $host = "localhost";
    $database = "tinsphpdb01";
    $user = "root";
    $pass = "";
    $charset = "utf8";
    $port = "3306";
    
    
    try{
        //Lembre dessa variavel quando usar um comando SQL no php
        $conn = new mysqli($host,$user, $pass,$database,$port);
        mysqli_set_charset($conn, $charset);
    }catch (Throwable $th){
        die("Deu ERRO burro".$th);
    }
?>