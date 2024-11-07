<?php

class Order {
    public $id;
    public $customerName;
//    j'initialise mon status de base en "cart"
    public $status = "cart";
    public $totalPrice;
//    j'initialise la variable products en tableau vide
    public $products = [];
// je créée une fonction addProduct qui ajoute un produit
//cette fonction ajoute un produit à mon tableau de produit
//elle ajoute aussi le prix du produit au prix total
//elle ne se réalise que si la commande est en cours
    public function addProduct() {
        if ($this -> status === "cart") {
        $this -> products[] = "pringles";
        $this ->totalPrice += 3;
        }
    }
//pour payer je vérifie la condition de mon status qui va passer de "cart" à "payed"
    public function pay(){
        if ($this -> status === "cart") {
            $this -> status = "payed";
        }
    }
}

//je fais ma premiere commande :
$order1 = new Order();
//j'ajoute mon produit :
$order1 -> addProduct();
$order1 -> addProduct();
$order1 -> addProduct();
var_dump($order1);
$order1 -> pay();
var_dump($order1);