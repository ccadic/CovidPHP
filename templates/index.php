<div class="container">
    <h1><u>Systeme de gestion offres et demandes pour COVID19</u></h1>
    <p>(OpenSource) Contact pour le code ou les suggestions: pcadic@gmail.com</p>
    <p>Bonjour. Ceci est un site internet minimaliste pour permettre offreurs de ressourcers (impression 3D, consommables utiles ...) de se signaler avec type de service proposé, localisation et moyen de contacter le reponsable</p>
    <p>Il permet aussi aux centres de soins et organisations susceptibles d'avoir des besoins (EHPAD, Soins à la personne etc ...) de formuler des besoins et d'indiquer leur localisation ainsi que la personne contact.</p>
    <p></p>
</div>

<div class="text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Offrir des ressources</button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal2">Demander des ressources</button>
</div>

<div class="container">
    <h2>Liste des structures exprimant un besoin</h2>

    <?php
    if ($nbRequestAnnoun > 0) {
        ?>
        <br>
        <table class="table table-striped">
            <thead>
                <tr class="success">
                    <th>Code postal</th>
                    <th>Ville</th>
                    <th>Annonce de besoin</th>
                    <th>Détail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allRequestAnnoun as $request) {
                    $btnTitle = $request->etablissement."\n"
                        .'Tel:'.$request->telephone."\n"
                        .'email:'.$request->email
                    ;
                    ?>
                    <tr>
                        <td><?php echoSafe($request->zip); ?></td>
                        <td><?php echoSafe($request->ville); ?></td>
                        <td><?php echoSafe($request->annonce); ?></td>
                        <td>
                            <a
                                href="viewDemand.php?id=<?php echo $request->id_demandeur; ?>"
                                data-toggle="tooltip"
                                target="_new"
                            >
                                <button
                                    type="button"
                                    class="btn btn-success"
                                    title="<?php echoSafe($btnTitle); ?>"
                                >Détail Besoin</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        0 results
        <?php
    }
    ?>
</div>

<div class="container">
  <h2>Liste des personnes proposant des ressources</h2>

    <?php
    if ($nbOffersAnnoun > 0) {
        ?>
        <br>
        <table class="table table-striped">
            <thead>
                <tr class="info">
                <th>Code postal</th>
                <th>Ville</th>
                <th>Annonce d'offre</th>
                <th>Détail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allOffersAnnoun as $offer) {
                    $btnTitle = 'Prénom: '.$offer->prenom."\n"
                        .'Email:'.$offer->email
                    ;
                    ?>
                    <tr>
                        <td><?php echoSafe($offer->zip); ?></td>
                        <td><?php echoSafe($offer->ville); ?></td>
                        <td><?php echoSafe($offer->annonce); ?></td>
                        <td>
                            <a
                                href="viewDemand.php?id=<?php echo $offer->id_demandeur; ?>"
                                data-toggle="tooltip"
                                target="_new"
                            >
                                <button
                                    type="button"
                                    class="btn btn-info"
                                    title="<?php echoSafe($btnTitle); ?>"
                                >Détail Offre</button>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        0 results
        <?php
    }
    ?>
</div>

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
                <form action="newDemand.php" method="POST">
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
                    <p><em>Les annonces sont validées par un admin avant mise en ligne. Votre adresse et votre nom de famille resteront confidentiels et ne seront pas publiés.</em></p>

                    <button type="submit" class="btn btn-default" name="proposer">Envoyer</button>
                </form>

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

                <form action="newDemand.php" method="POST">
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
                    <p><em>Les annonces sont validées par un admin avant mise en ligne.</em></p>

                    <button type="submit" class="btn btn-default" id="envoyer" name="envoyer">Envoyer</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
