<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

$query = "SELECT * FROM formulaire ORDER BY id DESC LIMIT 1";
$result = $cnx->query($query);
$donneesFormulaire = $result->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['modifier'])) {
    $id = $_POST['id'];
    $etudiant2 = $_POST['etudiant2'];
    $classe2 = $_POST['classe2'];
    $encadreurIset = $_POST['encadreurIset'];
    $nomEntreprise = $_POST['nomEntreprise'];
    $encadreurEntreprise = $_POST['encadreurEntreprise'];
    $query = "UPDATE formulaire SET 
    etudiant2 = :etudiant2,
    classe2 = :classe2,
    encadreurIset = :encadreurIset,
    nomEntreprise = :nomEntreprise,
    encadreurEntreprise = :encadreurEntreprise
    WHERE user = " . $_SESSION['id'];


    $stmt = $cnx->prepare($query);
   
    $stmt->bindParam(':etudiant2', $etudiant2, PDO::PARAM_STR);
    $stmt->bindParam(':classe2', $classe2, PDO::PARAM_STR);
    $stmt->bindParam(':encadreurIset', $encadreurIset, PDO::PARAM_STR);
    $stmt->bindParam(':nomEntreprise', $nomEntreprise, PDO::PARAM_STR);
    $stmt->bindParam(':encadreurEntreprise', $encadreurEntreprise, PDO::PARAM_STR);

    if($stmt->execute()) {
        header("Location: formvalid.php");
        exit();
    } else {
        echo "Erreur lors de la mise à jour des données.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
<style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            max-width: 1000px; /* Ajusté à 800px */
            margin-top: 50px;
            background-color: #fff;
            padding: 50px; /* Ajusté à 30px */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 15px; /* Ajusté à 10px */
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px; /* Ajusté à 12px de hauteur et 24px de largeur */
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Formulaire PFE</title>
    
    <!-- Liens vers les fichiers Bootstrap (ajustez les chemins selon votre structure de fichiers) -->
    <link rel="stylesheet" href="chemin/vers/bootstrap.min.css">
    <script src="chemin/vers/bootstrap.bundle.min.js"></script>

    <!-- Ajout d'une police Google Fonts (par exemple, Roboto) -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

    <style>
        /* Ajoutez votre CSS personnalisé ici si nécessaire */
    </style>
</head>
<body>
    <div class="container">
        <h2>Modifier le Formulaire PFE</h2>
        <form action="modifier_formulaire.php" method="post">
            <input type="hidden" name="id" value="<?php echo $donneesFormulaire['id']; ?>">

            <label for="etudiant2">Étudiant 2:</label>
            <input type="text" name="etudiant2" value="<?php echo $donneesFormulaire['etudiant2']; ?>"><br>

            <label for="classe2">Classe 2:</label>
            <div class="form-group">
    <label for="classe2">Choisissez la classe :</label>
    <select class="form-control" name="classe2" id="classe2">
        <option value="L2DSI1" <?php if ($donneesFormulaire['classe2'] == 'L2DSI1') echo 'selected'; ?>>L2DSI1</option>
        <option value="L2DSI2" <?php if ($donneesFormulaire['classe2'] == 'L2DSI2') echo 'selected'; ?>>L2DSI2</option>
        <option value="L2DSI3" <?php if ($donneesFormulaire['classe2'] == 'L2DSI3') echo 'selected'; ?>>L2DSI3</option>
    </select>
</div>
<br>


     

            <label for="encadreurIset">Encadreur Iset:</label>
            <input type="text" name="encadreurIset" value="<?php echo $donneesFormulaire['encadreurIset']; ?>"><br>

            <label for="nomEntreprise">Nom de l'Entreprise:</label>
            <input type="text" name="nomEntreprise" value="<?php echo $donneesFormulaire['nomEntreprise']; ?>"><br>

            <label for="encadreurEntreprise">Encadreur de l'Entreprise:</label>
            <input type="text" name="encadreurEntreprise" value="<?php echo $donneesFormulaire['encadreurEntreprise']; ?>"><br>

            <button type="submit" name="modifier">Modifier</button>
        </form>
    </div>
</body>
</html>
