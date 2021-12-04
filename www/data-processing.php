<?php
include 'utils.inc.php';
start_page();
?>

<?php
    $dbLink = mysqli_connect("localhost:3306", "root") or die('Erreur de connexion au serveur : ' . mysqli_connect_error());
    mysqli_select_db($dbLink , "mysql") or die('Erreur dans la sélection de la base : ' . mysqli_error($dbLink));
?>

<?php
    // Mail + DB
    if($_POST["action"] == 'mailer') {

        $query = 'INSERT INTO `USER` (`ID`, `SEX`, `MAIL`, `PASS`, `PHONE`, `COUNTRY`, `CG`, `DATE`) VALUES (\''.$_POST['id'].'\', \''.$_POST['sex'].'\', \''.$_POST['email'].'\', \''.$_POST['pass'].'\', \''.$_POST['tel'].'\', \''.$_POST['pays'].'\', \''.$_POST['cg'].'\', \''.date('Y-m-d').'\');';
        
        if(!($dbResult = mysqli_query($dbLink, $query))) {
            echo 'Erreur de requête<br/>';
            
            echo 'Requête : ' . $query . '<br/>';
            exit();
        }
        $message = 'Voici vos identifiants d\'inscription :'.PHP_EOL;
        $message .= '    Identifiant: '.$_POST['id'].PHP_EOL;
        $message .= '    Sexe: '.$_POST['sex'].PHP_EOL;
        $message .= '    E-mèl: '.$_POST['email'].PHP_EOL;
        $message .= '    Mot de passe: '.$_POST['pass'].PHP_EOL;
        $message .= '    Vérification du Mot de passe: '.$_POST['pass_v'].PHP_EOL;
        $message .= '    Téléphone: '.$_POST['tel'].PHP_EOL;
        $message .= '    Pays: '.$_POST['pays'].PHP_EOL;
        $message .= '    Conditions Générales: '.$_POST['cg'].PHP_EOL;
        
        echo "<pre>".$message."</pre>";
        
        echo 'Bonjour, '.$_POST['id'].'<br>Votre inscription a bien été enregistrée, merci.';
        
        //if (mail("ozeliurs@gmail.com", "Votre formulaire.", $message)) {
        //    echo '<h1>Votre mail à bien été envoyé.</h1>'.PHP_EOL.'<a href="/">Page d\'acceuil</a>';
        //} else {
        //    echo 'Mail non envoyé !!!!';
        //}
        
    } elseif ($_POST["action"] == 'rec') {
        if(!($file = fopen("data.txt", 'a+'))) {
            echo 'Erreur d\'ouverture';
            exit();
        }

        fputs($file, $_POST['id'].', '.$_POST['sex'].', '.$_POST['email'].', '.$_POST['pass'].', '.$_POST['pass_v'].', '.$_POST['tel'].', '.$_POST['pays'].', '.$_POST['cg'].PHP_EOL);
        fclose($file);

    } else {
        echo '<br/><strong>Bouton non géré !</strong><br/>';
    }
?>
<?php
end_page();
?>