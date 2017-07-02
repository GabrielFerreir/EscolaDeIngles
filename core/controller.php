<?php

class controller {

    public function loadView($viewName, $viewData = array()) {
        extract($viewData);
        include '/views/' . $viewName . '.php';
    }
    public function loadTemplate($viewName, $viewData = array()) {
        include '/views/template.php';
    }
    public function loadTempleteAdmin($viewName, $viewData = array()) {
        include '/views/admin/templateAdmin.php';
    }
    
    public function loadViewInTemplate($viewName, $viewData = array()) {
        extract($viewData);
        include '/views/'.$viewName.'.php';
    }

}
