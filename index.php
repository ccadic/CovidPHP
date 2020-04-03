<?php
/**
 * Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
 * Dr Philippe CADIC @pwavrobot - En espéraznt qu'il soit utile.
 */

require_once(__DIR__.'/core/init.php');

// Toutes les annonces de demandes
$requestAnnounStmt = $queries->doQuery('
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
        annonce
    FROM usagers
    WHERE online=1 AND categorie=0
    ORDER BY zip, ville
');

$allRequestAnnoun = $requestAnnounStmt->fetchAll(PDO::FETCH_OBJ);
$nbRequestAnnoun  = count($allRequestAnnoun);

// Toutes les annonces d'offre
$offersAnnounStmt = $queries->doQuery('
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
        annonce
    FROM usagers
    WHERE online=1 AND categorie=1
    ORDER BY zip, ville
');

$allOffersAnnoun = $offersAnnounStmt->fetchAll(PDO::FETCH_OBJ);
$nbOffersAnnoun  = count($allOffersAnnoun);

$page      = 'index.php';
$alertType = 'success';
include(__DIR__.'/templates/layout.php');
