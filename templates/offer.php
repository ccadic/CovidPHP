<h1><u>Détail de l'annonce de mise à disposition</u></h1>

<div class="container">
    <h2>Bénévole offrant ses ressources</h2>
    
    <table class="table table-striped">
        <thead>
            <tr class="info">
                <th>Bénévole</th>
                <th>Contacter</th>
                <th>ID Annonce</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong><?php echoSafe($demand->etablissement); ?></strong><br>
                    <?php echoSafe($demand->zip.' '.$demand->ville); ?>
                </td>
                <td>
                    <strong><?php echoSafe($demand->prenom); ?></strong><br>
                    <?php echoSafe($demand->telephone.' '.$demand->email); ?>
                </td>
                <td><p class="text-center"><?php echoSafe($demand->id_demandeur); ?></p></td>
            </tr>
        </tbody>
    </table>

    <p><b>Détail de l'annonce d'offre de services ou de ressources</b><br></p>
    <pre><br><?php echoSafe($demand->annonce); ?><br><br></pre>
</div>