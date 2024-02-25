<?php

include_once('NUF_model.php');
include_once('NUF_view.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la valeur du commentaire
    $commentaire = $_POST["comment"];
}

?>
