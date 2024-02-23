<?php

    // Connexion à la base de données a modifier 
    $connexion = new PDO('mysql:host=your_host;dbname=your_database', 'your_username', 'your_password');

    function ajouterFichier()
        
       // Vérifier si le formulaire a été soumis
       if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           // Vérifier si un fichier a été sélectionné
           if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] === UPLOAD_ERR_OK) {
               // Lire le contenu du fichier
               $contenuFichier = file_get_contents($_FILES['fichier']['tmp_name']);
    
               // Préparer et exécuter la requête SQL pour insérer le fichier dans la base de données
               $query = $connexion->prepare("INSERT INTO votre_table (nom_fichier, contenu) VALUES (?, ?)");
               $query->bindParam(1, $_FILES['fichier']['name']);
               $query->bindParam(2, $contenuFichier, PDO::PARAM_LOB);
               $query->execute();
    
               echo 'Le fichier a été ajouté avec succès à la base de données.';
           } else {
               echo 'Erreur lors de l\'envoi du fichier.';
           }
       }
       
    
      
?>