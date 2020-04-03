<!-- Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
     Dr Philippe CADIC @pwavrobot - En espéraznt qu'il soit utile.
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Système de centralisation des resources</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="alert alert-<?php echo $alertType; ?>">
        <h1><strong>COVID 19 - Loiret (45)</strong></h1>Système de mise en relation des offreurs bénévoles et des demandeurs.
    </div>
    
    <div class="container">
        <?php
        include(__DIR__.'/'.$page);
        ?>
    </div>

    <div class="jumbotron text-center">
        <h6>
            Mention légales. Logiciel/Hébergement/Editeur: Dr CADIC Philippe pcadic(@)gmail.com - Hébergement chez OVH OVH.fr au 140 Quai du Sartel – 59100 Roubaix. Téléphone: +33 3 20 45 36 80.
            <br>Ce site n'utilise pas de cookies. Les informations sont effacées à tout moment par les usagers munis de leur mot de passe d'effacement.
        <h6>
    </div>
</body>
</html>
