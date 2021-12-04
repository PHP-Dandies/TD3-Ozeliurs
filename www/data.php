<?php
include 'utils.inc.php';
start_page();
?>

<?php
    $file = 'data.txt';
    if(!($file = fopen($file, 'r'))){
        echo 'Erreur de lecture';
        exit();
    }
?> 

<?php
    echo 'Liste des utilisateurs : <br/>';
    $cpt = 1;
    while($line = fgets($file, 255)){
        echo 'Utilisateur n ' . $cpt . ' : ' . $line . '<br/>';
        ++$cpt;
    }
?>

<?php
end_page();
?>