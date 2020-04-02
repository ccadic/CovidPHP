  <!-- Ce code est gratuit - Il vise à faciliter la mise en place de petits site web locaux pour proposer ses ressourcers
      Dr Philippe CADIC @pwavrobot - En espéraznt qu'il soit utile.
 -->

<?php
// On interroge la base de donnes pour construire le tableau
include('dbconfig.php');

$contenu="";

if(isset($_GET['ID'])) {
  $ID = $_GET['ID'];
}



// Insert into MSQL table
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)
{
die("Connection failed: " . mysqli_connect_error());
}

// SELECT les annonces des recherches postees par les Etablissement SELECT * FROM `usagers`
//$sql = "SELECT id_demandeur,etablissement,nom,prenom,email,telephone,adresse,zip,ville,annonce FROM usagers where id_demandeur=$ID";
//print $sql;
//$result = $conn->query($sql);
$stmt = $conn->prepare('SELECT id_demandeur,etablissement,nom,prenom,email,telephone,adresse,zip,ville,annonce FROM usagers where id_demandeur= ?');
$stmt->bind_param('i', $ID);
$stmt->execute();
$result = $stmt->get_result();


$rech1=" <br>
<table class=\"table table-striped\">
   <thead>
     <tr class=\"success\">
       <th>Etablissement</th>
       <th>Contacter</th>
       <th></th>
       <th>ID Annonce</th>
     </tr>
   </thead>
   ";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $rech1 = $rech1. "<tr>
           <td><b>". htmlspecialchars($row["etablissement"])."</b><br>". htmlspecialchars($row["adresse"])."<br>". htmlspecialchars($row["zip"])." ". htmlspecialchars($row["ville"])."<br></td>
           <td><b>". htmlspecialchars($row["nom"])." ". htmlspecialchars($row["prenom"])."</b><br>". htmlspecialchars($row["telephone"])."<br>". $row["email"]."<br></td>
           <td><p class=\"text-center\">". htmlspecialchars($row["id_demandeur"])."</p></td>
            <td></td>
         </tr>
         <tr>
         <td><p><b>Détail de l'annonce de recherche</b><br></p></td>
         <td></td>
         <td></td>
          <td></td>
         </tr>


         ";
         $contenu=htmlspecialchars($row["annonce"]);


    }
} else {
    $rech1 = "0 results";
}
$conn->close();

$rech1=$rech1."
</tbody>
</table>
<table class=\"table table-striped\">
<tr>
<td><pre><br>".$contenu."<br><br></pre></td>
</tr>
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
  <h1><u>Détail de l'annonce de recherche</u></h1>


  <p>


  </p>
</div>



</body>


<div class="container">
  <p>  <h2>Structures exprimant un besoin</h2>
<?php print $rech1; ?>
  </p>
  <p></p>
</div>


<div class="jumbotron text-center">
  <p> <h6>Mention légales. Logiciel/Hébergement/Editeur: Dr CADIC Philippe pcadic(@)gmail.com - Hébergement chez OVH OVH.fr au 140 Quai du Sartel – 59100 Roubaix. Téléphone: +33 3 20 45 36 80.
    <br>Ce site n'utilise pas de cookies. Les informations sont effacées à tout moment par les usagers munis de leur mot de passe d'effacement.<h6></p>
</div>

</body>





<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>

</html>
