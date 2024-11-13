<?php
require_once("../config/config.php");
require_once("../view/partials/_header.php");
require_once("../config/config.php");
?>
    <body>
    <main>
        <form method="POST">
            <label for="shippingAdress">Votre adresse de livraison</label>
            <input type="text" name="shippingAdress" placeholder="Votre adresse de livraison" id="shippingAdress"/>
            <button type="submit">Valider votre adresse</button>
        </form>

        <!--    je vérifie que la requete se fait bien -->
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST") { ?>

            <p> <?php echo $message ?> </p>
            <p>Commande numéro : <?php echo $order->getId() ?> au nom de <?php echo $order->getCustomerName() ?> est en statut <?php echo $order->getStatus() ?>.</p>

        <?php } ?>

    </main>
    </body>

<?php
require_once("../view/partials/_footer.php");
