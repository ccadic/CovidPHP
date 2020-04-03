<?php
/**
 * Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
 * Dr Philippe CADIC @pwavrobot - En espéraznt qu'il soit utile.
 */

require_once(__DIR__.'/core/init.php');

if (!isset($_GET['id'])) {
    header('Location: /');
    exit;
}

$idDemand   = (int) $_GET['id'];
$demandStmt = $queries->doQuery(
    '
        SELECT
            id_demandeur,
            etablissement,
            nom,
            prenom,
            email,
            telephone,
            adresse,
            zip,
            ville,
            annonce,
            categorie
        FROM usagers
        WHERE id_demandeur=:id
    ',
    [':id' => $idDemand]
);

$demand = $demandStmt->fetch(PDO::FETCH_OBJ);
if ($demand === null) {
    header('Location: /');
    exit;
}

if ((int) $demand->categorie === 0) {
    $page      = 'request.php';
    $alertType = 'success';
} else {
    $page      = 'offer.php';
    $alertType = 'info';
}

include(__DIR__.'/templates/layout.php');
