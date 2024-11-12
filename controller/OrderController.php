<?php
require_once('../model/Order.php');
require_once('../model/OrderRepository.php');

class OrderController {
    public function createOrder() {
        $message = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (key_exists('customerName', $_POST)) {
                try {
                    // 1- je créée ma commande
                    $order = new Order($_POST["customerName"]);

                    // 2- je stocke ma commande (ici dans la session, mais pourrait être en BDD) en utilisant la classe OrderRepository
                    // pour ça je l'instancie et j'utilise la méthode persist
                    $orderRepository = new OrderRepository();
                    $orderRepository->persistOrder($order);

                    $message = "Votre commande est bien prise en compte, merci";

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }
        require_once('../view/create-order-view.php');
    }

    public function addProduct(){

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
