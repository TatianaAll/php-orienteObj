<?php
require_once('../model/Order.php');
require_once('../model/OrderRepository.php');

class OrderController
{
    public function createOrder()
    {
        $message = null;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (key_exists('customerName', $_POST)) {
                try {
                    // 1- je créée ma commande avec la class Order
                    $order = new Order($_POST["customerName"]);

                    // 2- je stocke ma commande (ici dans la session) en utilisant la class OrderRepository
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

    public function addProduct()
    {

        $message = null;
        // 1 - je récupère mon order stockée en session avec findOrder depuis le OrderRepo
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();
        try {
            // 2- j'ajoute un nouveau produit à ma commande
            $order->addProduct();

            // 3 - je sauve la nouvelle order en session :
            $orderRepository->persistOrder($order);
            $message = "produit ajouté à la commande";
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }

        require_once('../view/add-product-view.php');
    }

    public function removeProduct()
    {
        $message = null;
//        1- je récupère mon order stockée en session avec findOrder depuis le OrderRepo
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

        try {
            // 2- je retire un produit à ma commande
            $order->removeProduct();

            // 3 - je sauve la nouvelle order en session :
            $orderRepository->persistOrder($order);
            $message = "produit supprimé à la commande";
        } catch (Exception $exception) {
            $message = $exception->getMessage();
        }
        require_once('../view/remove-product-view.php');
    }

    public function setShippingAdress()
    {
        $message = null;
//        1- je récupère mon order stockée en session avec findOrder depuis le OrderRepo
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

//        2- je vérifie que ma requete post a bien été faite
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (key_exists('shippingAdress', $_POST)) {
                try {
                    //je définie ma shipping adress en lui donnant la valeur entré dans le form
                    $order->setShippingAdress(($_POST["shippingAdress"]));
                    // je stocke la nouvelle instance de mon repo
                    $orderRepository = new OrderRepository();
                    $orderRepository->persistOrder($order);

                    $message = "Adresse de livraison bien enregistrée";

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }
        require_once('../view/set-shipping-adress-view.php');
    }
}
