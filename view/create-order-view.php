<?php
require_once ("partials/_header.php")
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

    <?php }  ?>

</body>

<?php
require_once ("partials/_footer.php")
?>