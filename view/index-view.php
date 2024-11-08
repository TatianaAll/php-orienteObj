<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Amazon mais avec des pringles</title>
</head>
<body>
<h1>Bienvenue Sur votre site de Pringles</h1>
<form method="POST" action="">
    <label for='customerName'>Entrez votre nom pour commencer une commande</label>
    <input type='text' name='customerName' id='customerName' placeholder="Votre nom ici"/>

    <button type="submit">Démarrer votre commande</button>
</form>

<?php
if (isset($_POST['customerName'])) {
    if ($customerName) { ?>
        <p>Votre commande est bien prise en compte, merci <?php echo $customerName?> </p>

    <?php } else { ?>
        <p> Merci de renseigner votre nom </p>
    <?php }
}
?>

</body>
</html>
