<?php
require_once('../model/Order.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (array_key_exists('customerName', $_POST)
        && mb_strlen($_POST['customerName']) > 2) {
        $customerName = $_POST["customerName"];
        $order = new Order($customerName);
    }
}

require_once('../view/index-view.php');