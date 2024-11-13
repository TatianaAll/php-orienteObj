<?php
//pour le typage :
declare(strict_types=1);

require_once('../model/Order.php');
require_once('../model/OrderRepository.php');
require_once ('../vendor/autoload.php');

class OrderController
{
    public function createOrder() : void
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
        // je créé la config de twig en lui indiquant le chemin pour accéder aux templates
        $loader = new \Twig\Loader\FilesystemLoader('../view');
        // je charge twig avec la configuration
        // ça me permet d'avoir une variable $twig qui contient une instance
        // de la classe twig
        // et donc pouvoir utiliser les méthodes public que twig crées
        $twig = new \Twig\Environment($loader);

        //
        echo $twig->render('create-order.twig', [
            'message' => $message,
        ]);
//        require_once('../view/create-order.twig');
    }

    public function addProduct() : void
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

    public function removeProduct() : void
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

    public function setShippingAddress() : void
    {
        $message = null;
//        1- je récupère mon order stockée en session avec findOrder depuis le OrderRepo
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

//        2- je vérifie que ma requete post a bien été faite
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (key_exists('shippingAddress', $_POST)) {
                try {
                    //je définie ma shipping address en lui donnant la valeur entré dans le form
                    $order->setShippingAddress(($_POST["shippingAddress"]));
                    // je stocke la nouvelle instance de mon repo
                    $orderRepository = new OrderRepository();
                    $orderRepository->persistOrder($order);

                    $message = "Adresse de livraison bien enregistrée";

                } catch (Exception $exception) {
                    $message = $exception->getMessage();
                }
            }
        }
        require_once('../view/set-shipping-address-view.php');
    }

    public function letPay() : void
    {
        $message = null;

        //1- je récupère mon order stockée en session avec findOrder depuis le OrderRepo
        $orderRepository = new OrderRepository();
        $order = $orderRepository->findOrder();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            try {
                //je définie ma shipping address en lui donnant la valeur entré dans le form
                $order->pay();
                // je stocke la nouvelle instance de mon repo
                $orderRepository = new OrderRepository();
                $orderRepository->persistOrder($order);

                $message = "Vous avez bien payé";

            } catch (Exception $exception) {
                $message = $exception->getMessage();
            }

        }
        require_once('../view/pay-view.php');
    }
}
