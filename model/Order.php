<?php
//pour le typage :
declare(strict_types=1);

class Order
{
    private string $id;

//    on fait un guetteur
    public function getId() : string
    {
        return $this->id;
    }

    private string $customerName;

    public function getCustomerName() : string
    {
        return $this->customerName;
    }

    private ?string $shippingAddress;
    private string $status;
    public function getStatus() : string
    {
        return $this->status;
    }
    private float $totalPrice;

    public function getTotalPrice() : float
    {
        return $this->totalPrice;
    }

    public array $products = [];

// adding the magic method __construct to get the custumerName during the creatin of the new instance of the Order class
    public function __construct(string $customerName)
    {
        if (mb_strlen($customerName) < 3) {
            throw new Exception("Le nom de consommateur doit faire plus de 3 caractères");
        }
        $this->customerName = $customerName;
        $this->status = "cart";
        $this->totalPrice = 0;
        $this->id = uniqid();
    }

    public function addProduct() : void
    {
        if ($this->status = "cart") {
            $this->products[] = "pringles";
            $this->totalPrice += 3;
        } else {
            throw new Exception("Vous ne pouvez pas ajouter ce produit");
        }
    }

//remove the last item of the array with the native function array_pop()
    public function removeProduct() : void
    {
        if ($this->status === "cart" && count($this->products) !== 0) {
            array_pop($this->products);
            $this->totalPrice -= 3;
        } else if (count($this->products) === 0) {
            throw new Exception("Vous ne pouvez pas retirer de produit car votre panier est vide");
        }
    }

    public function setShippingAddress(string $shippingAddress)
    {
        if ($this->status === "cart" && mb_strlen($shippingAddress) > 5) {
            $this->$shippingAddress = $shippingAddress;
            $this->status = "shippingAddressSet";
        } else {
            throw new Exception("Votre adresse de livraison est trop courte (ou invalide) ou vous avez déjà payé votre commande");
        }
    }

    public function pay() : void
    {
        if ($this->status === "shippingAddressSet" && count($this->products) !== 0) {
            $this->status = "payed";
        } else {
            throw new Exception("Impossible de payer, vous n'avez pas mis d'adresse de livraison ou votre panier est vide");
        }
    }

    public function shipOrder()
    {
        if ($this->status === "payed") {
            $this->status = "shipped";
        } else {
            throw new Exception("Vous n'avez pas payé votre commande");
        }
    }

}