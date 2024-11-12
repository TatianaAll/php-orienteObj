<?php
require_once ("partials/_header.php");
require_once ("../config/config.php");
?>

<body>
<h1>Bienvenue Sur votre site de Pringles</h1>

<?php if ($message)  { ?>

    <h2><?php echo $message; ?></h2>

<?php } ?>

<form method="POST" action="">
    <label for='customerName'>Entrez votre nom pour commencer une commande</label>
    <input type='text' name='customerName' id='customerName' placeholder="Votre nom ici"/>

    <button type="submit">Démarrer votre commande</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>

        <p> <?php echo $message ?> </p>

    <p>
        Commande numéro : <?php echo $order->getId() ?> au nom de <?php echo $order->getCustomerName() ?>
    </p>

    <?php }  ?>

</body>

<?php
require_once ("partials/_footer.php")
?>