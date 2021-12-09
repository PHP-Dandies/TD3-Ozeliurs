<?php
include 'utils.inc.php';
start_page();

    $dbLink = mysqli_connect("localhost:3306", "root") or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    mysqli_select_db($dbLink , "mysql") or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
?>

    <form method="POST" action="login.php">
        <label for="mail">MEL: </label>
        <input type="text" name="mail">
        <label for="pass">Password: </label>
        <input type="password" name="pass">
        <input type="submit" name="action" value="login">
    </form>
    <div class="card">
        <?php
            if ($_POST["action"] == "login") {
                $mel= $_POST['mail'];
                $ps = $_POST['pass'];
                $query = 'SELECT * FROM USER WHERE MAIL="'.$mel.'";';
                if(!($dbResult = mysqli_query($dbLink, $query))) {
                    echo 'Erreur de requête<br/>';
                    
                    echo 'Requête : ' . $query . '<br/>';
                    exit();
                }
                $dbRow = mysqli_fetch_assoc($dbResult);
                if ($dbRow["PASS"] == $ps) {
                    echo 'Bienvenue '.$dbRow["MAIL"].'.';
                    $query = 'UPDATE USER SET NB_CONN = NB_CONN+1 WHERE ID = '.$dbRow["ID"].';';
                    if(!($dbResult = mysqli_query($dbLink, $query))) {
                        echo 'Erreur de requête<br/>';
                        
                        echo 'Requête : ' . $query . '<br/>';
                        exit();
                    }
                } else {
                    echo "Mauvais mot de passe !!!";
                }
            }
        ?>
    </div>
<?php
end_page();
?>