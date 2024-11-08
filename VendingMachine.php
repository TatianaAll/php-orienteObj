<?php
require_once ('config/config.php');
class VendingMachine
{
    public $snacks;
    public $cashAmount;
    public $isOn;

    public function __construct()
    {
        $this->snacks = [
            [
                "name" => "Snickers",
                "price" => 1,
                "quantity" => 5
            ],
            [
                "name" => "Mars",
                "price" => 1.5,
                "quantity" => 5
            ],
            [
                "name" => "Twix",
                "price" => 2,
                "quantity" => 5
            ],
            [
                "name" => "Bounty",
                "price" => 2.5,
                "quantity" => 5
            ]
        ];
        $this->cashAmount = 0;
    }

    public function turnOn()
    {
        if (!$this->isOn) {
            $this->isOn = true;
        } else {
            throw new Exception("La machine est déjà allumée");
        }
    }

    public function turnOff()
    {$closeHour = new DateTime("18:00:00");
    $now = new DateTime();
        if ($now > $closeHour) {
            $this->isOn = false;
        } else {
            throw new Exception("il n'est pas encore 18h");
        }
    }

    public function getSnacks($snackName)
    {
        if ($this->isOn) {

            //Avec le foreach en utilisan $key je vais utiliser la copie de mon tableau snack
            foreach ($this->snacks as $key => $item) {
                if ($item["name"] == $snackName) {

                    if ($item["quantity"] > 0) {
                        $this->snacks[$key]["quantity"] -= 1;
                        $this->cashAmount += $item["price"];
                        // ici je vais retourner mon élément modifié
                        return $this->snacks[$key];

                    } else {
                        throw new Exception("Il n'y a plus de ce snack, Edouard est passé par là");
                    }
                }
            }
            // Si aucun snack n'a été trouvé
            throw new Exception("Snack non trouvé");
        } else {
            throw new Exception("La machine est éteinte");
        }
    }

    public function shootWithFoot(){
        if ($this->isOn) {
            if ($this->cashAmount > 0) {
                $this->cashAmount -= ((float)rand(1, $this->cashAmount));
            }
            $randomSnack = rand(0, count($this->snacks)-1);
            if($this->snacks[$randomSnack]["quantity"] > 0){
                $this->snacks[$randomSnack]["quantity"] -= 1;
            } else {
                $randomSnack = rand(0, count($this->snacks)-1);
                if ($this->snacks[$randomSnack]["quantity"] > 0) {
                    $this->snacks[$randomSnack]["quantity"] -= 1;
                }
            }
        } else {
            throw new Exception("La machine est éteinte");
        }
    }
}
//
$machine1 = new VendingMachine();
$machine1->turnOn();
var_dump($machine1); ?>
<br>
<?php
//$machine1->turnOn();
//je testais mon exception -> c'est ok
//$machine1->turnOff();

//$now = new DateTime();
//var_dump($now);
$machine1->getSnacks("Twix");
$machine1->getSnacks("Twix");
$machine1->getSnacks("Mars");
var_dump($machine1);?>
    <br>
<?php

$machine1->shootWithFoot();

var_dump($machine1);
