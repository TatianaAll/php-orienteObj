<?php
//pour le typage :
declare(strict_types=1);

require_once ("../config/config.php");
require_once ("Order.php");



class OrderRepository
{
    //on type : on attend une instance de la class Order en paramètre, et la fonction ne retourne rien :
    public function persistOrder(Order $order) : void
    {
        // permet de sauvegarder une commande en session
        session_start();
        $_SESSION['order'] = $order;
    }
    //On attend en retour une instance de la class Order donc je lui précise
    public function findOrder() : Order
    {
        // je récupère une commande qui est en session
        session_start();
        return $_SESSION['order'];
    }

}