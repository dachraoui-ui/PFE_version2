<?php

$server = "localhost";
$base = "PFE";
$user = "root";
$password = "";

try {
    $cnx = new PDO("mysql:host=$server;dbname=$base", $user, $password);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql = "SELECT email FROM email ORDER BY idUser DESC LIMIT 1";


    $resultat = $cnx->query($sql);


    if ($resultat->rowCount() > 0) {
    
        $row = $resultat->fetch();
        $var= $row["email"];
    } else {
        echo "Aucun résultat trouvé.";
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
