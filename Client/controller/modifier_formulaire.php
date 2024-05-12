<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

$query = "SELECT * FROM formulaire ORDER BY id DESC LIMIT 1";
$result = $cnx->query($query);
$donneesFormulaire = $result->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['modifier'])) {
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

    if ($stmt->execute()) {
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
            background-image: url('../../../../Upload/imgs/test.jpg');
            background-size: cover;
            background-position: center;
            
            
            font-family: 'Open Sans', sans-serif;
            background-color: #f8f9fa;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .cont {
            opacity:0.9 ;
            width: 600px;
            height: 650px;
            max-width: 1000px;
            /* Ajusté à 800px */
            margin-top: 50px;
            background-color: #fff;
            padding: 50px;
            /* Ajusté à 30px */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            position: relative;
            bottom: 30px;
            text-align: center;
            color: #007bff;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: 600;
        }

        

        button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px;
            /* Ajusté à 12px de hauteur et 24px de largeur */
            border: none;
            border-radius: 10px;
            cursor: pointer;

        }

        button:hover {
            border-radius: 5px;
            transform: scale(1.05);
            /* Increase the size of the button to 105% when hovered */
            transition: transform 0.3s ease-in-out;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Formulaire PFE</title>
    <link rel="stylesheet" href="../../Administrator/Design/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    
    

</head>

<body>
    <div class="cont">
        <h2>Modifier le Formulaire PFE</h2>
        <form action="modifier_formulaire.php" method="post">
            <input type="hidden" name="id" value="<?php echo $donneesFormulaire['id']; ?>">

            <label for="etudiant2">Étudiant 2:</label>
            <input type="text" name="etudiant2" class="form-control" value="<?php echo $donneesFormulaire['etudiant2']; ?>"><br>

            <label for="classe2">Classe 2:</label>
            <div>
            <label for="classe2">Choisissez la classe :</label>
                <select class="form-select" name="classe2" id="classe2">
                    <option value="L2DSI1" <?php if ($donneesFormulaire['classe2'] == 'L2DSI1') echo 'selected'; ?>>L2DSI1</option>
                    <option value="L2DSI2" <?php if ($donneesFormulaire['classe2'] == 'L2DSI2') echo 'selected'; ?>>L2DSI2</option>
                    <option value="L2DSI3" <?php if ($donneesFormulaire['classe2'] == 'L2DSI3') echo 'selected'; ?>>L2DSI3</option>
                </select>
            </div>
                
            
            <br>




            <label for="encadreurIset">Encadreur Iset:</label>
            <input class="form-control" type="text" name="encadreurIset" value="<?php echo $donneesFormulaire['encadreurIset']; ?>"><br>

            <label for="nomEntreprise">Nom de l'Entreprise:</label>
            <input class="form-control" type="text" name="nomEntreprise" value="<?php echo $donneesFormulaire['nomEntreprise']; ?>"><br>

            <label for="encadreurEntreprise">Encadreur de l'Entreprise:</label>
            <input class="form-control"type="text" name="encadreurEntreprise" value="<?php echo $donneesFormulaire['encadreurEntreprise']; ?>"><br>

            <button type="submit" name="modifier">Modifier</button>
        </form>
    </div>
</body>

</html>