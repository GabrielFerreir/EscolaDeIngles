<?php

class Core {


    public function run() {
        //$url = substr($_SERVER['PHP_SELF'], 15); //10
        $url = explode("index.php", $_SERVER['PHP_SELF'] );
        $url = end($url);
        
        $params = array();

        if (!empty($url)) {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0] . 'Controller';
            array_shift($url);
            
            if (isset($url[0])) {
                if(isset($url[1])){
                    $currentAction = $url[0];
                    array_shift($url);    
                }else{
                    $currentAction = 'index';
                    $params = $url[0];
                }                
            } else {
                $currentAction = 'index';
            }
            
            if(count($url) > 0) {
                $params = $url;
            }
            
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }
       

        require_once 'core/controller.php';
        
        $c = new $currentController();
        call_user_func_array(array($c, $currentAction), $params);
        
    }

}
