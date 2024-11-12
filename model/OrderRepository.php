<?php

class OrderRepository {
    public function PersistOrder($order) {
        session_start();
        $_SESSION['order'] = $order;
    }

}