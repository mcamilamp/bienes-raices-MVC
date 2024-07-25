<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost', 'root', 'admin', 'bienesraices_grud');

    if(!$db) {
        echo "Error, no se pudo conectar";
        exit;
    } 
    return $db;
}