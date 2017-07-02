<?php
require 'environment.php';
define("BASE_URL", "http://localhost/EscolaDeIngles");
define("Mensalidade", 170,00);
global $config;

$config = array();
if(ENVIRONMENT == "development") {
    $config['dbname'] = 'escola';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
    
    
} else {
    $config['dbname'] = 'escola';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}
