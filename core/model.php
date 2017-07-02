<?php
    class model {
        
        protected $db;

        public function __construct() {
            global $config;
            $this->db = new PDO("mysql:dbname=" .$config['dbname']. ";host=".$config['host'].";charset=utf8", $config['dbuser'], $config['dbpass']);
           
                
        }
        
    }

