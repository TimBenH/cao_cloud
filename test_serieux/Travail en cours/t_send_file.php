<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch (Exception $e) {
        die("An error happened during the connection to the database: " . $e->getMessage());
        // or anything you might prefer, such as an attempt to retry the connection after some timeout for example
    }
    $request = "SELECT id FROM projet"; // Modify the query to select only the 'id' column
    $statement1 = $db->prepare($request);
    $statement1->execute();
    $results = $statement1->fetchAll(PDO::FETCH_COLUMN); // Fetch only the 'id' column values
    $id = 0;
    do {
        $randomNumber = mt_rand(); // Generate a random number
    } while (in_array($randomNumber, $results)); // Check if the random number is already in the results array

    $id = $randomNumber;    // Use the generated random number for further processing
    
    $projet = $_POST['projet'];
    // Select the id of the project from the database
    $statement2 = $db->prepare('SELECT id FROM projet WHERE nom = ?');
    $statement2->execute(array($projet));
    $id_projet = $statement2->fetchColumn();

    $description=$_POST['description'];
    $fileData = file_get_contents($_FILES['file']['tmp_name']);
    $fileType = $_FILES['file']['type'];
    $fileName=$_FILES['file']['name'];
    $date= date("d-m-Y");
    $sql = "INSERT INTO fichier(data ,date,description,id,id_projet,nom) VALUES(?, ?, ?, ?, ?, ?)";
    $statement3 = $db->prepare($sql);
    $statement3->bindParam(1, $fileData, PDO::PARAM_LOB);
    $statement3->bindParam(2, $date);
    $statement3->bindParam(3, $description);
    $statement3->bindParam(4, $id);
    $statement3->bindParam(5, $id_projet);
    $statement3->bindParam(6, $fileName);
    $current_id = $statement3->execute() or die("<b>Error:</b> Problem on file Insert<br/>" . mysqli_connect_error());
