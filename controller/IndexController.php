<?php
require_once('../model/Order.php');

class IndexController {
    public function index() {
        $message = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (key_exists('customerName', $_POST)) {
                try {
                    $order = new Order($_POST["customerName"]);
                    $message = "Votre commande est bien prise en compte, merci";
                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }
        require_once('../view/create-order-view.php');
    }

    public function addProduct(){
        // récupère la commande en BDD

        $message = null;

        try {
            $order->addProduct();
            $message = "produit ajouté à la commande";

        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }

        require_once('../view/add-product-view.php');
    }
}
