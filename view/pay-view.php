<?php
require_once("../config/config.php");
require_once("../view/partials/_header.php");
require_once("../config/config.php");
?>

<p>Montant à payer : <?php echo $order->getTotalPrice() ?> € </p>

<form method="POST">
<button type="submit">PAYER</button>
</form>

    <!--    je vérifie que la requete se fait bien -->
<?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>

    <p> <?php echo $message ?> </p>
    <p>Commande numéro : <?php echo $order->getId() ?> au nom de <?php echo $order->getCustomerName() ?> est en statut : <?php echo $order->getStatus() ?>.</p>

<?php } ?>

<?php
require_once("../view/partials/_footer.php");