<?php

include_once('NUF_model.php');
include_once('NUF_view.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la valeur du commentaire
    $commentaire = $_POST["comment"];
}

$date = date("Y-m-d H:i:s");
$idProjet = 1;  // Remplacez par l'ID du projet réel
$projetSelectionne = 1;
$nom = $idProjet . '.' . (numNewFile($projetSelectionne) + 1);  // Correction de l'ordre d'affectation
$filepath = displayFilePath();
$data = file_get_contents("$filepath"); 

$NUF_model = new NUF_model();
$NUF_model->saveFile($date, $nom, $idProjet, $data, $commentaire);
?>
