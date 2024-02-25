<?php
    //Connect to the database
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch (Exception $e) {
        die("An error happened during the connection to the database: " . $e->getMessage());
        // or anything you might prefer, such as an attempt to retry the connection after some timeout for example
    }

    //ici je viens chercher les projets existants
    $request = "SELECT id FROM projet"; // Modify the query to select only the 'id' column
    $statement1 = $db->prepare($request);
    $statement1->execute();
    $results = $statement1->fetchAll(PDO::FETCH_COLUMN); // Fetch only the 'id' column values
    $id = 0; //id temporaire
    do {
        $randomNumber = mt_rand(); // Generate a random number
    } while (in_array($randomNumber, $results)); // Check if the random number is already in the results array
    //Assign the generated random number to the id variable
    $id = $randomNumber;    // Use the generated random number for further processing
    
    // Check if the form has been submitted and the project has been selected
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['projet_select'])) {
        $projet = $_POST['projet_select'];
        echo "Le projet selectionné est: ".$projet."</br>"; // Print the selected project
    } else {
        echo "No project selected or form not submitted.";
    }    
    // Use the selected project name to fetch the id from the database
    $statement2 = $db->prepare('SELECT id FROM projet WHERE nom = ?');
    $statement2->execute(array($projet)); 
    $id_projet = $statement2->fetchColumn();

    // Define the variables 
    $id_precedent=null;
    $description=$_POST['description'];
    $fileData = file_get_contents($_FILES['file']['tmp_name']);
    $fileType = $_FILES['file']['type'];
    $fileName=$_FILES['file']['name'];
    $date= date("Y-m-d");

    // The SQL query to insert the file and its variables into the database
    $sql = "INSERT INTO fichier(nom ,date , id, id_projet, id_precedent , data, description) VALUES(?, ?, ?, ?, ?, ?, ?)";
    $statement3 = $db->prepare($sql);
    $statement3->bindParam(6, $fileData, PDO::PARAM_LOB);
    $statement3->bindParam(2, $date);
    $statement3->bindParam(7, $description);
    $statement3->bindParam(3, $id);
    $statement3->bindParam(5, $id_precedent);
    $statement3->bindParam(4, $id_projet);
    $statement3->bindParam(1, $fileName);

    //instruction finale pour l'insertion et si erreur affiche un message avec les informations envoyées
    $current_id = $statement3->execute() or die("<b>Error:</b> Problem on file Insert<br/>" . $statement3->errorInfo()[2]."<br/> Probleme lors de l'importation du fichier. Voilà les informations envoyés"."<br/> Date : ".$date."</br> Description : ".$description."<br/> id : ".$id."<br/> id_precedent : ".$id_precedent."</br>fileName: ".$fileName ."<br/>id_projet: " . $id_projet."<br/>projet: " . $projet);
    echo "File uploaded successfully";
    echo "<br><a href='NUF_view.php'>Revenir à la page principale</a>";  //a modifier 