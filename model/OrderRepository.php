<?php
require_once ("../config/config.php");

class OrderRepository
{
    public function persistOrder($order)
    {
        // permet de sauvegarder une commande en session
        session_start();
        $_SESSION['order'] = $order;
    }

    public function findOrder()
    {
        // je récupère une commande qui est en session
        session_start();
        return $_SESSION['order'];
    }

}