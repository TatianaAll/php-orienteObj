<?php
require_once ("../config/config.php");

class ErrorController {
    public function notFound() : void
    {
        require_once("../view/error-404-view.php");
    }
}