<html>
    <head>
        <?php 
             //Exemple de donnée-->
             $fichier_selctionner= 'fichier 1';
            echo '<title>'."Nouvelle version: $fichier_selctionner".'</title>'?> <!--nom du fichier a modifier, recupéré via un get dans le controller-->
    </head>
    <body>

        

        <?php 
        echo 
            //Exemple de donnée-->
            $fichier_selctionner= 'Fichier 1';
            $projet='Projet 1';
            '<h1>'."$projet".'</h1>';  //nom du projet ou se trouve le fihier, recupéré via un get dans le controller 
            '<h2>'."Nouvelle version: $fichier_selctionner".'</h2>'?>
       
       <p>Déposer la nouvelle version ci-dessous</p>
       
       <div>
            <div>
            <img src="http://projettai/code/image/t%c3%a9l%c3%a9charger.jpg" alt="Flèche téléchargement">
            <p>Vous pouvez glisser un fichier ici pour l'ajouter </p>
            </div>
        </div>
            
        <div>
            <!--Espace attribué aux bouton choisir fichier et annuler -->
            <button>Choisir fichier</button>
            <button>Annuler</button>
        </div>

        <div>
            <!--Espace attribué à la zone de commentaire-->
            <p>Commentaire:</p>
            <textarea id="commentNewFile" name="commentNewFile" rows="20" cols="70"></textarea>
        </div>

        <div>
            <!--Espace attribué au bouton: sauvegarder les changements -->
            <button>Choisir fichier</button>
        </div>

    </body>