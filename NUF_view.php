<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="NUF_css.css">
    <link rel="icon" href="data:,">
    <title>File Upload</title>
</head>
<body>
    <h1>Uploader la nouvelle version</h1>
    <button id=BAccueil href="home.php">Accueil</button><br>    <!-- attention mettre le bon chemin pour arriver a la page d'accueil -->
    <div id="cadre">
        <div id="chargerF">
            <label id="Choix" for="file">Choisir fichier:</label><br>
            <input type="file" id="file" name="file" required><br>
        </div>
        <form method="post" action="NUF_controller.php">
        
            <label for="comment">Commentaire:</label>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
        
            <button type="submit" id="saveBtn">Sauvegarder</button>
        
            <button type="button" id="cancelBtn">Annuler</button>
        </form>
    </div>

    <script src="NUF_JavaScript.js"></script>
</body>
</html>
