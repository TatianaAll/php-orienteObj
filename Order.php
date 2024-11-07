<?php

class Order
{
    public $id;
    public $customerName;
    public $customerAddress = "";
    public $status = "cart";
    public $totalPrice;
    public $products = [];
// adding the magic method __construct to get the custumerName during the creatin of the new instance of the Order class
    public function __construct($customerName, $customerAddress){
        $this->customerName = $customerName;
        $this->customerAddress = $customerAddress;
        $this->id = uniqid();
    }

    public function addProduct()
    {
        if ($this->status === "cart") {
            $this->products[] = "pringles";
            $this->totalPrice += 3;
        }
    }

    public function pay()
    {
        if ($this->status === "cart") {
            $this->status = "payed";
        }
    }

//remove the last item of the array with the native function array_pop()
    public function removeProduct(){
        if ($this->status === "cart" && count($this->products)!==0) {
            array_pop($this->products);
            $this->totalPrice-=3;
        } else if (count($this->products)===0){
            echo ("votre panier est vide");
        }
    }

    public function shippingAdress(){
        return $this->customerAddress;
    }

    public function shipOrder(){
        if ($this->status === "payed" && count($this->products)!==0) {
            $this->status = "shipped";
        }
    }
}
// creation of the first instance
$newOrder1 = new Order("Tatiana", "38 avenue de la vieille tour");
$newOrder1->addProduct();
$newOrder1->addProduct();
var_dump($newOrder1); ?>
<br>
<?php
$newOrder1->removeProduct();
var_dump($newOrder1); ?>
    <br>
<?php
$newOrder1->pay();
var_dump($newOrder1); ?>
    <br>
<?php
echo $newOrder1->shippingAdress();
