<?php
require_once ("../config/config.php");

class ErrorController {
    public function notFound(){
        require_once("../view/error-404-view.php");
    }
}