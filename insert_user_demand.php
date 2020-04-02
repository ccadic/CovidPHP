
<!-- Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
    Dr Philippe CADIC @pwavrobot - Script d'insertion dans la base de données.
-->

<?php
include('dbconfig.php');


if(isset($_POST['envoyer'])){
   $sql = "INSERT INTO usagers (etablissement,nom,prenom,email,telephone,adresse,zip,ville,password,categorie,annonce,online)
  VALUES ('".addslashes($_POST["etablissement"])."','".addslashes($_POST["nom"])."','".addslashes($_POST["prenom"])."','".addslashes($_POST["email"])."','".addslashes($_POST["telephone"])."','".addslashes($_POST["adresse"])."','".addslashes($_POST["zip"])."','".addslashes($_POST["ville"])."','".addslashes($_POST["password"])."',0,'".addslashes($_POST["comment"])."',0)";
   //print $sql;

 // Insert into MSQL table
 $conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

 $result = mysqli_query($conn,$sql);

$messagefinal="Votre participation a été sauvegardée";
$messagefinal2="Vous venez de poster une recherche de ressources bénévoles. Cette annonce peut être effacée à tout moment avec son mot de passe associé.";

}





if(isset($_POST['proposer'])){
   $sql = "INSERT INTO usagers (etablissement,nom,prenom,email,telephone,adresse,zip,ville,password,categorie,annonce,online)
  VALUES ('".addslashes($_POST["etablissement"])."','".addslashes($_POST["nom"])."','".addslashes($_POST["prenom"])."','".addslashes($_POST["email"])."','".addslashes($_POST["telephone"])."','".addslashes($_POST["adresse"])."','".addslashes($_POST["zip"])."','".addslashes($_POST["ville"])."','".addslashes($_POST["password"])."',1,'".addslashes($_POST["comment"])."',0)";
   //print $sql;

 // Insert into MSQL table
 $conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

 $result = mysqli_query($conn,$sql);

 $messagefinal="Votre participation a été sauvegardée";
 $messagefinal2="Vous venez de proposer vos services sous forme de petite annonce. Cette annonce peut être effacée à tout moment avec son mot de passe associé.";
 }








?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Données insérées dans la base.</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="alert alert-success">
  <h1><strong>COVID 19 - Loiret (45)</strong></h1>Système de mise en relation des offreurs bénévoles et des demandeurs.
</div>
<div class="container">
<h1><u><?php print"$messagefinal"; ?></u></h1>

<br><br>

<p><h2><?php print"$messagefinal2"; ?></h2></p>
<br><br>

<p>Votre annonce n'est pas encore en ligne. Elle doit être validée par un administrateur qui est chargé de filter les posts non appropriés</p>
<p></p>

</div>



</body>
