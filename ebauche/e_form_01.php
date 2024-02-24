<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
</head>

<body>

<?php

// in the local environment with WAMP (localhost)
// dbname: test
// user: root
// password: empty string
try {
    $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die("An error happened during the connection to the database: " . $e->getMessage());
    // or anything you might prefer, such as an attempt to retry the connection after some timeout for example
}
?>

    <h2>Submit Form</h2>

    <form action="e_form_01.php" method="post" enctype="multipart/form-data">
        <!-- Les actions utilisateurs: -->
        <label for="file">File:</label><br>
        <input type="file" id="file"><br>
        <label for="comment">Comment:</label><br>
        <input type="text" id="comment"><br>
        <label for="projet">Projet:</label><br>
        <div id="projet">    
            <?php
                $request = "SELECT * FROM projet";// let's create the request
                $statement = $db->prepare($request);// let's prepare the query
                $statement->execute();// now let's do it
                $results = $statement->fetchAll();// let's fetch the results

                $nb = count($results); // let's count the results
                if ($nb > 0) {
                    echo("<p>Found " . $nb . " results.</p>");

                    echo("<select name='projet' id='projet'>");
                    foreach($results as $res) {
                        echo("<option value= ".$res .">".$res['nom']."</option>");
                    }
                    echo("</select>");
                }
                else {
                    echo("<p>Il n'y a aucun projet dans la base de donnée. Veuillez en créer un avant d'ajouter un fichier.</p>");
                }
            ?>
        </div>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" readonly><br><br>
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id" readonly><br><br>
        <label for="date">Date:</label><br>
        <input type="text" id="date" name="date" readonly><br><br>
        <button type="submit" value="Submit">Submit</button>
    </form>
</body>
</html>

