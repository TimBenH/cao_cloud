<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>the_popup_work</title>

    <!-- Les liens vers le JS et CSS -->
    <link rel="stylesheet" href="t_versionphp.css">
    <script src="the_popup_work.js"></script>

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
    <!-- La partie avec les boutons pour accéder aux pop ups -->
    <div id="the_buttons">
        <button type="button" id="add_file" onclick="open_add_file()">Ajouter un/des fichier(s)</button>
        <button type="button" id="make_obselete" onclick="open_make_obselete()">Rendre un fichier obselete</button>
        <button type="button" id="create_project" onclick="open_create_project()">Créer un projet</button>
        <button type="button" id="add_coworker" onclick="open_add_coworker()">Ajouter un collaborateur</button>
        <button type="button" id="detail_coworker" onclick="open_detail_coworker()">détail de collaborateur</button>
    </div>
    <!-- On aura un bloc pour chaque pop up delimité par des div -->
    <!-- Le pop up pour rajouter un fichier -->
    <div id="add_file_p" class="big_pop_up">
        <div class="p_header">
            <h2>Ajouter un fichier</h2>
        </div>
        <div class="p_content">
            <form id="add_file_f" action="t_send_file.php" method="post" enctype="multipart/form-data">
                <!-- Les actions utilisateurs: -->
                <div id="top">
                    
                    <label for="file_input">Choisir un fichier:</label><br>
                    <input type="file" id="file_input" name="file"><br>
                </div>
                        
                <div id="action">
                    <label for="comment">Description :</label><br>
                    <input type="text" id="comment" name="description"><br>
                    <label for="projet">Projets:</label><br>
                    <div id="projet_div">    
                        <?php
                            $request = "SELECT * FROM projet";// let's create the request
                            $statement = $db->prepare($request);// let's prepare the query
                            $statement->execute();// now let's do it
                            $results = $statement->fetchAll();// let's fetch the results

                            $nb = count($results); // let's count the results
                            if ($nb > 0) {
                                echo( $nb . " projets trouvés.</p>");

                                echo("<select name='projet' id='projet_s'>");
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
                </div>
                <button id="submit_file" type="submit" value="Submit">Submit</button>
            </form>
            <div id="left">
                <div id="preview-container"></div>
                <div id="button-container">
                    <button id="preview" onclick="handleFiles()">Preview</button>
                    <!-- <button id="upload" >Upload</button> -->
                </div>
            </div>
        </div>
        <div class="p_footer">
            <script>function close_add_file(){
                document.getElementById('add_file_p').style.display = 'none';
            }</script>
            <button class="nav_pop" id="close_pop" onclick="close_add_file()" type="button">Close</button>
            <!-- <button class="nav_pop" id="validate" onclick="closePopUp()" type="button">Validate</button> -->
        </div>
    </div>

    <!-- Le pop up pour rendre un fichier obselete -->
    <div id="make_obselete_p" class="small_pop_up" id="obselete_pop_up">
        <!-- Header -->
        <div class="p_header">
            <h2>Rendre le fichier obselete</h2>
        </div>
        <!-- The content -->
        <div class="p_content">
                
        </div>
        <!-- The footer -->
        <div class="p_footer">
            <button id="close_pop_up" onclick="close_make_obselete()" type="button">Close</button>
        </div>
    </div>
    <!-- Le pop up pour créer un projet -->
    <div id="create_project_p" class="long_pop_up">
        <div class="p_header">
            <h2>Créer un projet</h2>
        </div>
        <div class="p_content">
            <form id="create_project_form" action="create_project.php" method="post">
                <label for="project_name_input">Nom du projet:</label><br>
                <input type="text" id="project_name_input" name="project_name_input"><br>
                <button id="submit_project" type="submit" value="Submit">Submit</button>
            </form>
        </div>
        <div class="p_footer">
            <button class="nav_pop" id="close_pop" onclick="close_create_project()" type="button">Annuler</button>
        </div>
    </div>
    <!-- Le pop up pour ajouter un collaborateur -->
    <div id="add_coworker_p" class="big_pop_up">
        <div class="p_header">
            <h2>Ajouter un collaborateur</h2>
        </div>
        <div class="p_content">
            <form>
                <div class="coworker_name">
                    <h3>Identifiant</h3>
                    <input type="text" id="coworker_name_input" placeholder="Identifiant du collaborateur">
                </div>
                <select name=autorisation >
                    <option value="1">Lecture</option>
                    <option value="2">Ecriture</option>
                    <option value="3">Suppression</option>
                </select>
            </form>    
        </div>
        <div class="p_footer">
            <button class="nav_pop" id="close_pop" onclick="close_add_coworker()" type="button">Annuler</button>
        </div>
    </div>

    <!-- Le pop up pour voir les détails d'un collaborateur -->
    <div id="detail_coworker_p" class="detail_coworker_p">
        <div class="p_header">
            <h2>Détail du collaborateur</h2>
        </div>

        <div class="upper">
            <img id="profil_picture" src="profil.png" alt="Photo de profil" style="width: auto; height: 100%; border-radius: 10px; border: none; padding: 0; margin: 0; overflow: hidden;">
            <div id="user_presentation">
                <!-- normallement inclure le php pour avoir les infos du collaborateur -->
                <h2 id="h2_profil_name">Prénom Nom</h2>
                <p> A rejoint l'organisation le ../../..., blabla bla <br> Détails du collaborateur</p>
            </div>
        </div>

        <div class="p_content">
            
            <form action="modify_project.php"method="post">
                <h3>Projets associés au collaborateur</h3>
                <!-- ici l'action php permet d'envoyer une requete sur les autorisations concernant les projets selectionnées -->
                <select name="project" id="project_select">
                    <option value="1">Projet 1</option>
                    <option value="2">Projet 2</option>
                    <option value="3">Projet 3</option>
                </select>
                <h3>Action associés</h3>
                <select name="project" id="project_select">
                    <option value="1">Exclure</option>
                    <option value="2">Peut modifier</option>
                    <option value="3">Peut voir</option>
                </select>
                <button id="submit_project" type="submit" value="Submit">Valider</button>
            </form>
                    
           <!-- Ici php action qui liste tout les projets qui ne sont pas associés à ce collaborateur -->
            <form action="add_buddy.php"method="post">
                <h3>Rajouter ce collaborateur sur un projet</h3>
                <select name="project" id="project_select">
                    <option value="1">Projet 5</option>
                    <option value="2">Projet 6</option>
                    <option value="3">Projet 7</option>
                </select>
                <button id="submit_project" type="submit" value="Submit">Valider</button>
            </form>
            
        </div>

        <div class="p_footer">
            <button class="nav_pop" id="close_pop" onclick="close_detail_coworker()" type="button">Close</button>
        </div>
    </div>
</body>