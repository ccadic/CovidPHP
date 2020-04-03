<?php
/**
 * Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
 * Dr Philippe CADIC @pwavrobot - Script d'insertion dans la base de données.
 */

require_once(__DIR__.'/core/init.php');

$category = null;

if (isset($_POST['envoyer'])) {
    $category = 0;
} elseif (isset($_POST['proposer'])) {
    $category = 1;
} else {
    header('Location: /');
    exit;
}
$query = '
    INSERT INTO usagers
    SET etablissement=:etablissement,
        nom=:nom,
        prenom=:prenom,
        email=:email,
        telephone=:telephone,
        adresse=:adresse,
        zip=:zip,
        ville=:ville,
        password=:password,
        categorie=:categorie,
        annonce=:annonce,
        online=0
';

$params = [
    ':etablissement' => $_POST['etablissement'],
    ':nom'           => $_POST['nom'],
    ':prenom'        => $_POST['prenom'],
    ':email'         => $_POST['email'],
    ':telephone'     => $_POST['telephone'],
    ':adresse'       => $_POST['adresse'],
    ':zip'           => $_POST['zip'],
    ':ville'         => $_POST['ville'],
    ':password'      => $_POST['password'],
    ':categorie'     => $category,
    ':annonce'       => $_POST['comment']
];

$stmt = $queries->doQuery($query, $params);

$page      = 'newDemand.php';
$alertType = 'success';
include(__DIR__.'/templates/layout.php');
