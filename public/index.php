<?php
require_once ("../config/config.php");
require_once('../controller/OrderController.php');
require_once('../controller/ErrorController.php');
//require_once ("../view/partials/_header.php");

// récupère l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

// découpe l'url actuelle pour ne récupérer que la fin
// si l'url demandée est "http://localhost:8888/piscine-ecommerce-app/public/test"
// $enduri contient "test"
$uri = parse_url($requestUri, PHP_URL_PATH);
$endUri = str_replace('/exercice2-orienteObjet/public/', '', $uri);
$endUri = trim($endUri, '/');


// en fonction de la valeur de $endUri on charge le bon contrôleur
$createOrder = new OrderController();

if ($endUri === "") {
    $createOrder->createOrder();

} else if ($endUri === "add-product"){
    $createOrder->addProduct();

} else if ($endUri === "remove-product") {
    $createOrder->removeProduct();
} else if ($endUri === "shipping-adress"){
    $createOrder->setShippingAdress();
} else {
    $errorController = new ErrorController();
    $errorController->notFound();
}


//require_once ("../view/partials/_footer.php");
