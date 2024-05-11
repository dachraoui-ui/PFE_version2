<?php
$server = "localhost";
$base = "PFE";
$user = "root";
$password = "";


   
    $cnx = new PDO("mysql:host=$server;dbname=$base", $user, $password);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM email";

    $stmt = $cnx->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        
        $nom = $row['Nom'];
      
        $email = $row['email'];
        $pass = $row['Password'];

    } else {
        echo "No rows found.";
    }

    $sql = 'INSERT INTO user (Nom, Email, Password, GroupId) VALUES (:nom, :ema, :pass, 0)';
    $req = $cnx->prepare($sql);
    $req->execute(array(
        'nom'   => $nom,
    
        'ema'   => $email,
        'pass'  => $pass
    ));

    $sql = "SELECT * FROM user WHERE Email=? AND Password=? AND GroupId=0";
    $req = $cnx->prepare($sql);
    $req->execute(array($email, $pass));
    $row = $req->fetch();
    $_SESSION['id'] = $row['idUser'];
    $_SESSION['nom'] = $row['Nom'];

   

    $sql = "DELETE FROM email";
    $cnx->exec($sql);

  header("Location:../logout.php");
  exit();
?>
