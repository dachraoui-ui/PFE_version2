<?php


$server = "localhost";
$base = "PFE";
$user = "root";
$password = "";
try {
    $cnx = new PDO("mysql:host=$server;dbname=$base", $user, $password);
    $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur :" . $e->getMessage();
}

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (!empty($email) && !empty($password)) {
        try {
      
            $stmt = $cnx->prepare("INSERT INTO user (email, password, groupID) VALUES (?, ?, 2)");
            
           
            $stmt->execute([$email, $password]);
?>
          <script>
            alert("Enseignant ajouté avec succès.");
            window.location.href = "page.php";</script>
            <?php
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <title>Formulaire CSS</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 100vh;
            font-family: 'Open Sans', sans-serif;
            background-image: url('../../../../Upload/imgs/test.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }

        .form-container {
            opacity: 0.9;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: large;
        }

        
        h2 {
            color: #007bff;
            text-align: center;
        }
        input[type="submit"]:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Ajouter enseignant</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Soumettre">
        </div>
    </form>
</div>

</body>
</html>
