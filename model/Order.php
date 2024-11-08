<?php

class Order
{
    public $id;
    public $customerName;
    public $shippingAddress;
    private $status;
    private $totalPrice;
    public $products = [];
// adding the magic method __construct to get the custumerName during the creatin of the new instance of the Order class
    public function __construct($customerName){
        $this->customerName = $customerName;
        $this->status = "cart";
        $this->totalPrice = 0;
        $this->id = uniqid();
    }

    public function addProduct()
    {
        if ($this->status === "cart") {
            $this->products[] = "pringles";
            $this->totalPrice += 3;
        } else {
            throw new Exception("Vous ne pouvez pas ajouter ce produit");
        }
    }

//remove the last item of the array with the native function array_pop()
    public function removeProduct(){
        if ($this->status === "cart" && count($this->products)!==0) {
            array_pop($this->products);
            $this->totalPrice-=3;
        } else if (count($this->products)===0){
            throw new Exception("Vous ne pouvez pas retirer de produit car votre panier est vide");
        }
    }

    public function setShippingAdress($shippingAdress){
        if ($this->status === "cart") {
            $this->$shippingAdress = $shippingAdress;
            $this->status = "shippingAdressSet";
        } else {
            throw new Exception("Vous n'avez pas d'adresse de livraison ou vous avez déjà payé votre commande");
        }
    }

    public function pay()
    {
        if ($this->status === "shippingAdressSet" && count($this->products)!==0) {
            $this->status = "payed";
        }
        else {
            throw new Exception("Impossible de payer, vous n'avez pas mis d'adresse de livraison ou votre panier est vide");
        }
    }

    public function shipOrder(){
        if ($this->status === "payed") {
            $this->status = "shipped";
        } else {
            throw new Exception("Vous n'avez pas payé votre commande");
        }
    }
}
// creation of the first instance
$newOrder1 = new Order("Tatiana");
$newOrder1->addProduct();

var_dump($newOrder1);