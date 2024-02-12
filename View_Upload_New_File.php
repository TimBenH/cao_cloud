<html>
    <head>
        <?php 
             //Exemple de donnée-->
             $fichier_selctionner= 'fichier 1';
            echo '<title>'."Nouvelle version du $fichier_selctionner".'</title>'?> <!--nom du fichier a modifier, recupéré via un get dans le controller-->
            <link rel="stylesheet" href="CSS_Upload_New_File.css">
    </head>
    <body>

        

    <?php
    // Exemple de données
    $fichier_selectionne = 'Fichier 1';
    $projet = 'Projet 1';

    // Affichage des balises h1 et h2
    echo '<h1>' . $projet . '</h1>';  // Nom du projet où se trouve le fichier, récupéré via un GET dans le contrôleur
    echo '<h2>' . "Nouvelle version: $fichier_selectionne" . '</h2><br>';
    ?>

        <div id="zone">
            <div id="zone1" class="flexItem">
                <p id="instruction1">Déposer la nouvelle version ci-dessous<br></p>
                <div classe="cadre" id="cadreZoneDepot">
                    
                    <div id="cadretiretZoneDepot">
                        <img src="http://projettai/code/image/t%c3%a9l%c3%a9charger.png" alt="Flèche téléchargement">
                        <p id="instruction2"><br>Vous pouvez glisser un fichier ici pour l'ajouter <br></p>
                        
                    </div>
                </div>
                    
                <div>
                    <!--Espace attribué aux bouton choisir fichier et annuler -->
                    <button id="boutonChoisirFichier">Choisir fichier</button>
                    <button id="boutonAnnuler">Annuler</button>
                </div>
            </div>
        
            <div id="zone2" class="flexItem">
                <div class="cadre" id="cadreCommentaire">
                    <!--Espace attribué à la zone de commentaire-->
                    <p id="pCommentaireUNF">Commentaire:</p>
                    <textarea id="TACommentNewFile" name="commentNewFile" rows="18" cols="70"></textarea>
                </div>

                <div>
                    <!--Espace attribué au bouton: sauvegarder les changements -->
                    <button>Sauvegarder les changements</button>
                </div>
            </div>
        </div>
    </body>
</html>
