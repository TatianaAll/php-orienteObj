<?php
require_once ("../config/config.php");
require_once ("../view/partials/_header.php");
require_once ("../config/config.php");
?>

<main>
    <p>
        <?php echo $message; ?>
    </p>
    <p>
        Commande numéro : <?php echo $order->getId() ?>
    </p>
</main>

<?php
require_once ("../view/partials/_footer.php")
?>
