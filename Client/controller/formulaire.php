
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location:login.php");
    exit();
}
$navbar = '';
$error = "";
?>
<style>
body {
    font-family: 'Roboto', sans-serif;
    background-image: url('../../../../Upload/imgs/test.jpg');
    background-size: cover;
    background-position: center;
    color: #fff; 

}
</style>
<?php
include "../../config/connexion.php";
include "../fct/fonction.php";

$query = "SELECT user FROM formulaire WHERE user = :id";
$stmt = $cnx->prepare($query);
$stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
$stmt->execute();


if ($stmt->rowCount() > 0) {
    header('Location: formvalid.php');
    exit();
} 



$donneesFormulaire = $stmt->fetch(PDO::FETCH_ASSOC);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $etudiant1 = $_POST["etudiant1"];
    $classe1 = $_POST["classe1"];
    $etudiant2 = $_POST["etudiant2"];
    $classe2 = $_POST["classe2"];
    $projet = $_POST["projet"];
    $encadreurIset = $_POST["encadreurIset"];
    $nomEntreprise = $_POST["nomEntreprise"];
    $encadreurEntreprise = $_POST["encadreurEntreprise"];
    $emailpour = $_POST["emailpour"];
    $sql = "INSERT INTO formulaire (etudiant1, classe1, etudiant2, classe2, projet, encadreurIset, nomEntreprise, encadreurEntreprise, user,Email)
    VALUES ('$etudiant1', '$classe1', '$etudiant2', '$classe2', '$projet', '$encadreurIset', '$nomEntreprise', '$encadreurEntreprise', " . $_SESSION['id'] . ",'$emailpour')";

   
    try {
        $cnx->query($sql);
    } catch (PDOException $e) {
        $error = "Erreur d'insertion dans la base de données : " . $e->getMessage();
    }
    header("Location:imprimer.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: auto;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        .form-group {
            margin-bottom: 20px;
        }

        button {
            width: 100%;
        }
    </style>
    <title >Formulaire PFE</title>
  
</head>
<body>
    <div class="container mt-5">
    <h1 id="pageTitle">Formulaire PFE<script>nextYear</script></h1>
    
        <form action="formulaire.php" method="post">
            <div class="form-group">
             
                <label for="etudiant1">Étudiant 1</label>
                <input type="text" class="form-control" id="etudiant1" name="etudiant1" placeholder="Nom de l'étudiant 1">
                <select class="form-control mt-2" name="classe1">
                    <option value="l3-dsi1">L3-DSI1</option>
                    <option value="l3-dsi2">L3-DSI2</option>
                    <option value="l3-dsi3">L3-DSI3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="etudiant2">Étudiant 2</label>
                <input type="text" class="form-control" id="etudiant2" name="etudiant2" placeholder="Nom de l'étudiant 2">
                <select class="form-control mt-2" name="classe2">
                    <option value="l3-dsi1">L3-DSI1</option>
                    <option value="l3-dsi2">L3-DSI2</option>
                    <option value="l3-dsi3">L3-DSI3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="projet">Titre de Projet</label>
                <input type="text" class="form-control" id="projet" name="projet" placeholder="Titre du projet">
            </div>
            <script>
    document.getElementById('projet').addEventListener('input', function() {
        var inputValue = this.value;
        if (inputValue.length > 0) {
            this.value = inputValue.charAt(0).toUpperCase() + inputValue.slice(1);
        }
    });
</script>

            <div class="form-group">
                <label for="encadreurIset">Nom de l'Encadreur de l'ISE T</label>
                <input type="text" class="form-control" id="encadreurIset" name="encadreurIset" placeholder="Nom de l'encadreur de l'ISE T">
            </div>

            <div class="form-group">
                <label for="nomEntreprise">Nom de l'Entreprise</label>
                <input type="text" class="form-control" id="nomEntreprise" name="nomEntreprise" placeholder="Nom de l'entreprise">
            </div>

            <div class="form-group">
                <label for="encadreurEntreprise">Nom de l'Encadreur de l'Entreprise</label>
                <input type="text" class="form-control" id="encadreurEntreprise" name="encadreurEntreprise" placeholder="Nom de l'encadreur de l'entreprise">
            </div>
            <div class="form-group">
                <label for="emailpour">Courriel visant à vous notifier </label>
                <input type="text" class="form-control" id="emailpour" name="emailpour" placeholder="Email">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script>
        const pageTitle = document.getElementById('pageTitle');
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const nextYear = currentYear + 1;
        pageTitle.innerText = `Formulaire PFE ${currentYear}/${nextYear}`;
    </script>