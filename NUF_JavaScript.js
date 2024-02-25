document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('add_file_f');
    const fileInput = document.getElementById('file');
    const commentInput = document.getElementById('comment');
    const submit_file = document.getElementById('saveBtn');
    const cancelBtn = document.getElementById('cancelBtn');

    // Enregistrez les valeurs initiales
    let initialFileValue = fileInput.value;
    let initialCommentValue = commentInput.value;

    cancelBtn.addEventListener('click', function () {
        // Réinitialisez la valeur du fichier et de la zone de commentaire
        fileInput.value = null;
        commentInput.value = '';
    });

    function sauvegarderCommentaire() {
        // Récupérer la valeur du commentaire
        var commentaire = commentInput.value;

        // Enregistrer la valeur dans une variable (vous pouvez faire ce que vous voulez avec ici)
        var commentaireEnregistre = commentaire;

        // Afficher la valeur enregistrée (à titre d'exemple)
        alert("Commentaire enregistré : " + commentaireEnregistre);
    }

  /*  submit_file.addEventListener('click', function () {
        // définir les variables appropriées avant de les utiliser
        var date = ""; // Remplacez par la valeur appropriée
        var nom = "";  // Remplacez par la valeur appropriée
        var idProjet = "";  // Remplacez par la valeur appropriée
        var data = "";  // Remplacez par la valeur appropriée
        var commentaire = commentInput.value;  // Utilisation de la valeur de la zone de commentaire

        // Appel à la fonction sauvegarderCommentaire
        sauvegarderCommentaire();

        
        var NUF_model = new NUF_model();
        NUF_model.saveFile(date, nom, idProjet, data, commentaire);
    });

    /*function displayFilePath() {
        const filePath = fileInput.value; // Contient le chemin du fichier côté client
        console.log("Chemin du fichier côté client :", filePath);
        return filePath;
    } */

    // Sur le chargement de la page, enregistrez les valeurs initiales
    window.addEventListener('load', function () {
        initialFileValue = fileInput.value;
        initialCommentValue = commentInput.value;
    });
});
