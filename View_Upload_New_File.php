<html>
    <head>
        <?php 
             //Exemple de donnée-->
             $fichier_selctionner= 'fichier 1';
            echo '<title>'."Nouvelle version du $fichier_selctionner".'</title>'?> <!--nom du fichier a modifier, recupéré via un get dans le controller-->
            <link rel="stylesheet" href="CSS_Upload_New_File.css">
            <link rel=”stylesheet” type=”text/css” href=”/public/plugins/dropzone/dropzone.css” />
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
                <div class="cadre" id="cadreZoneDepot">
                    <form action="/file-upload" class="dropzone" id="dropzone-area" enctype="multipart/form-data">

                        <div id="cadretiretZoneDepot">
                            <form action="/file-upload" class="dropzone" id="dropzone-area" enctype="multipart/form-data"></form>

                            <img src="http://projettai/code/image/t%c3%a9l%c3%a9charger.png" alt="Flèche téléchargement">
                            <p id="instruction2"><br>Vous pouvez glisser un fichier ici pour l'ajouter <br></p>
                            
                        </div>
                    </form>
                </div>
                    
                <div>
                    <!--Espace attribué aux bouton choisir fichier et annuler -->
                    <button id="boutonChoisirFichier" onclick="openFileExplorer()">Choisir fichier</button>
                    <script>
                        function openFileExplorer() {
                        document.getElementById('fileInput').click();
                        }
                    </script>

                    <!-- Cet élément input est masqué, mais il sera déclenché lors de l'appel à la fonction openFileExplorer -->
                    <input type="file" id="fileInput" style="display:none;">
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
    <script src="http://projettai/code/cao_cloud/Java_Upload_New_File.js"></script>   
    <script type=”text/javascript” src=”/public/plugins/jquery/jquery.min.js”></script>
    <script type=”text/javascript” src=”/public/plugins/dropzone/dropzone.js”></script> 
    </body>
</html>
