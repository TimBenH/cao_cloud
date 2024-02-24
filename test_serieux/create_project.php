<?php
    try {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch (Exception $e) {
        die("An error happened during the connection to the database: " . $e->getMessage());
        // or anything you might prefer, such as an attempt to retry the connection after some timeout for example
    }
    
    //($name_project) fetch data from the form
    $name_project=$_POST['project_name_input'];

    //(id_organisation) fetch the existing organisations and IDs
    $rqst = "SELECT id FROM organisation"; // Modify the query to select only the 'id' column
    $statement0 = $db->prepare($rqst);
    $statement0->execute();
    $res = $statement0->fetchAll(PDO::FETCH_COLUMN); // Fetch only the 'id' column values
    //take the first id in res
    $id_organisation = $res[0];

    //fetch existing projects and IDs
    $request = "SELECT id FROM projet"; // Modify the query to select only the 'id' column
    $statement1 = $db->prepare($request);
    $statement1->execute();
    $results = $statement1->fetchAll(PDO::FETCH_COLUMN); // Fetch only the 'id' column values
    
    //(id_project) creation the id for the new project
    $id_project = 0; //Initialize the variable to store the random number
    do {
        $randomNumber = mt_rand(); // Generate a random number
    } while (in_array($randomNumber, $results)); // Check if the random number is already in the results array
    $id_project = $randomNumber;    // Use the generated random number for further processing
    //initialize the id_profil on null, bc it should be added by the user
    $id_profil = null;

    //insert the new project into the database
    $sql = "INSERT INTO projet(id ,id_organisation,id_profil,nom) VALUES(?, ?, ?, ?)";
    $statement3 = $db->prepare($sql);
    $statement3->bindParam(1, $id_project);
    $statement3->bindParam(2, $id_organisation);
    $statement3->bindParam(3, $id_profil);
    $statement3->bindParam(4, $name_project);
    $current_id = $statement3->execute() or die("<b>Error:</b> Problem on file Insert<br/>" . $statement3->errorInfo()[2]);
    echo "Project created successfully";
    //create a button to go back to the main page
    echo "<br><a href='t_versionphp.php'>Revenir à la page principale</a>";