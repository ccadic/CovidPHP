  <!-- Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
      Dr Philippe CADIC @pwavrobot - En espéraznt qu'il soit utile.
 -->

<?php
// On interroge la base de donnes pour construire le tableau
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "covid19";

// Insert into MSQL table
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

// SELECT les annonces des recherches postees par les Etablissement SELECT * FROM `usagers`
$sql = "SELECT id_demandeur,etablissement,nom,prenom,email,telephone,adresse,zip,ville,annonce FROM usagers where online=1 AND categorie=0 order by zip,ville";
//print $sql;
$result = $conn->query($sql);

$rech1=" <br>
<table class=\"table table-striped\">
   <thead>
     <tr class=\"success\">
       <th>Code postal</th>
       <th>Ville</th>
       <th>Annonce de besoin</th>
       <th>Détail</th>
     </tr>
   </thead>
   ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rech1 = $rech1. "<tr>
           <td>". $row["zip"]."</td>
           <td>". $row["ville"]."</td>
           <td>". $row["annonce"]."</td>
            <td> <a href=\"publi1.php?ID=". $row["id_demandeur"]."\" data-toggle=\"tooltip\" target=\"_new\"><button type=\"button\" class=\"btn btn-success\" title=\"". $row["etablissement"]."\nTel:". $row["telephone"]."\nemail:". $row["email"]."\">Détail Besoin</button></a></td>
         </tr>";


    }
} else {
    $rech1 = "0 results";
}
$conn->close();

$rech1=$rech1."
</tbody>
</table>
   ";


   // Insert into MSQL table
   $conn=mysqli_connect($servername,$username,$password,$dbname);

   if(!$conn)
   {
   die("Connection failed: " . mysqli_connect_error());
   }
   // SELECT les annonces des recherches postees par les Etablissement SELECT * FROM `usagers`
   $sql2 = "SELECT id_demandeur,etablissement,nom,prenom,email,telephone,adresse,zip,ville,annonce FROM usagers where online=1 AND categorie=1 order by zip,ville";
   //print $sql;
   $result2 = $conn->query($sql2);

   $rech2=" <br>
   <table class=\"table table-striped\">
      <thead>
        <tr class=\"info\">
          <th>Code postal</th>
          <th>Ville</th>
          <th>Annonce d'offre</th>
          <th>Détail</th>
        </tr>
      </thead>
      ";

   if ($result2->num_rows > 0) {
       // output data of each row
       while($row = $result2->fetch_assoc()) {
           $rech2 = $rech2. "<tr>
              <td>". $row["zip"]."</td>
              <td>". $row["ville"]."</td>
              <td>". $row["annonce"]."</td>
              <td> <a href=\"publi2.php?ID=". $row["id_demandeur"]."\" data-toggle=\"tooltip\" target=\"_new\"><button type=\"button\" class=\"btn btn-info\" title=\"Prénom: ". $row["prenom"]."\nEmail:".$row["email"]."\">Détail Offre</button></a></td>
            </tr>";


       }
   } else {
       $rech2 = "0 results";
   }
   $conn->close();

   $rech2=$rech2."
   </tbody>
   </table>
      ";




?>



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
  <div class="alert alert-success">
    <h1><strong>COVID 19 - Loiret (45)</strong></h1>Système de mise en relation des offreurs bénévoles et des demandeurs.
  </div>
<div class="container">
  <h1><u>Systeme de gestion offres et demandes pour COVID19</u></h1>
  <p>(OpenSource) Contact pour le code ou les suggestions: pcadic@gmail.com</p>
  <p>Bonjour. Ceci est un site internet minimaliste pour permettre offreurs de ressourcers (impression 3D, consommables utiles ...) de se signaler avec type de service proposé, localisation et moyen de contacter le reponsable</p>
  <p>Il permet aussi aux centres de soins et organisations susceptibles d'avoir des besoins (EHPAD, Soins à la personne etc ...) de formuler des besoins et d'indiquer leur localisation ainsi que la personne contact.</p>

  <p></p>
</div>



</body>

<div class="container">

  <!-- Modal offrir des ressources -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>OFFRIR ses ressources</strong></h4>
        </div>
        <div class="modal-body">
          <p>Formulaire à remplir pour vous signaler et poster une courte annonce sur les ressources dont vous disposez et que vous souhaitez mettre à disposition.</p>
          <p><form action="insert_user_demand.php" method="POST">
            <!-- Champs de table: etablissement -->
            <div class="form-group">
              <input type="hidden" id="etablissement" name="etablissement" value="Offreur ressource">
              <label for="text">Nom: (Ne sera pas publié en ligne)</label>
              <input type="text" class="form-control" id="nom" name="nom">
              <label for="text">Prénom:</label>
              <input type="text" class="form-control" id="prenom" name="prenom">
              <label for="email">email:</label>
              <input type="email" class="form-control" id="email" name="email">
              <label for="text">téléphone :</label>
              <input type="text" class="form-control" id="telephone" name="telephone">
              <label for="text">Adresse: (Ne sera pas publiée en ligne)</label>
              <input type="text" class="form-control" id="adresse" name="adresse">
              <label for="text">Code postal:</label>
              <input type="text" class="form-control" id="zip" name="zip">
              <label for="text">Ville:</label>
              <input type="text" class="form-control" id="ville" name="ville">
              <label for="pwd">Mot de passe (pour supprimer l'annonce)</label>
              <input type="password" class="form-control" id="pwd" name="password">

              <label for="comment">Résumé de ce que vous pouvez proposer:</label>
             <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <p><i>Les annonces sont validées par un admin avant mise en ligne. Votre adresse et votre nom de famille resteront confidentiels et ne seront pas publiés.</i></p>

            <button type="submit" class="btn btn-default" name="proposer">Envoyer</button>
          </form></p>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal demander des ressourcers -->
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>DEMANDER des ressources</strong></h4>
        </div>
        <div class="modal-body">
          <p>Formulaire à remplir pour vous signaler et poster une courte annonce sur vos besoins.</p>

          <p><form action="insert_user_demand.php" method="POST">
            <!-- Champs de table: etablissement -->
            <div class="form-group">
              <label for="text">Etablissement:</label>
              <input type="text" class="form-control" id="etablissement" name="etablissement">

              <label for="text">Nom:</label>
              <input type="text" class="form-control" id="nom" name="nom">
              <label for="text">Prénom:</label>
              <input type="text" class="form-control" id="prenom" name="prenom">
              <label for="email">email:</label>
              <input type="email" class="form-control" id="email" name="email">
              <label for="text">téléphone :</label>
              <input type="text" class="form-control" id="telephone" name="telephone">
              <label for="text">Adresse:</label>
              <input type="text" class="form-control" id="adresse" name="adresse">
              <label for="text">Code postal:</label>
              <input type="text" class="form-control" id="zip" name="zip">
              <label for="text">Ville:</label>
              <input type="text" class="form-control" id="ville" name="ville">
              <label for="pwd">Mot de passe (pour supprimer l'annonce)</label>
              <input type="password" class="form-control" id="pwd" name="password">

              <label for="comment">Contenu de l'annonce de demande:</label>
             <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <p><i>Les annonces sont validées par un admin avant mise en ligne.</i></p>

            <button type="submit" class="btn btn-default" id="envoyer" name="envoyer">Envoyer</button>
          </form></p>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<center>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Offrir des ressources</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Demander des ressources</button>
</center>

<div class="container">
  <p>  <h2>Liste des structures exprimant un besoin</h2>
<?php print $rech1; ?>
  </p>
  <p></p>
</div>

<div class="container">
  <p>  <h2>Liste des personnes proposant des ressources</h2>
<?php print $rech2; ?>
  </p>
  <p></p>
</div>

</body>


</div>

<div class="jumbotron text-center">
  <p> <h6>Mention légales. Logiciel/Hébergement/Editeur: Dr CADIC Philippe pcadic(@)gmail.com - Hébergement chez OVH OVH.fr au 140 Quai du Sartel – 59100 Roubaix. Téléphone: +33 3 20 45 36 80.
    <br>Ce site n'utilise pas de cookies. Les informations sont effacées à tout moment par les usagers munis de leur mot de passe d'effacement.<h6></p>
</div>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>

</html>
