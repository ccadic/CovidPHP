<h1><u>Détail de l'annonce de recherche</u></h1>

<div class="container">
    <h2>Structures exprimant un besoin</h2>
    
    <table class="table table-striped">
        <thead>
            <tr class="success">
                <th>Etablissement</th>
                <th>Contacter</th>
                <th>ID Annonce</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong><?php echoSafe($demand->etablissement); ?></strong><br>
                    <?php echoSafe($demand->adresse); ?><br>
                    <?php echoSafe($demand->zip.' '.$demand->ville); ?>
                </td>
                <td>
                    <strong><?php echoSafe($demand->nom.' '.$demand->prenom); ?></strong><br>
                    <?php echoSafe($demand->telephone); ?><br>
                    <?php echoSafe($demand->email); ?>
                </td>
                <td><p class="text-center"><?php echoSafe($demand->id_demandeur); ?></p></td>
            </tr>
        </tbody>
    </table>

    <p><b>Détail de l'annonce de recherche</b><br></p>
    <pre><br><?php echoSafe($demand->annonce); ?><br><br></pre>
</div>