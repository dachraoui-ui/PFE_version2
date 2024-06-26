<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

// Récupérez les données du formulaire depuis la base de données
$query = "SELECT * FROM formulaire WHERE user = " . $_SESSION['id'];
$result = $cnx->query($query);
$donneesFormulaire = $result->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impression du Formulaire PFE</title>
    <link rel="stylesheet" href="../../Administrator/Design/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-image: url('../../../../Upload/imgs/test.jpg');
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            text-align: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            opacity: 0.9;
            max-width: 700px;
            margin: 0 auto;
            background-color: #f8f8f8;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            border-radius: 7px;
            margin-top: 50px;
        }

        h2 {
            color: #007bff;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            
        }
        button:hover{
            transform: scale(1.05);
            /* Increase the size of the button to 105% when hovered */
            transition: transform 0.3s ease-in-out;
        }
        

        @media print {
            button {
                display: none;
            }
        }
    </style>
    <script>
        function imprimerPage() {
            // Redirection vers la page de formulaire après un délai de 3 secondes
            setTimeout(function() {
                window.location.href = 'formvalid.php';
            }, 3000);

            // Déclencher l'impression
            window.print();
        }
    </script>
</head>

<body>
    <div class="container">
        <!-- Affichez les données du formulaire ici -->
        <h2>Données du Formulaire PFE</h2>
        <ul><br><br><br>
            <li><strong>Étudiant 1: </strong> <?php echo $donneesFormulaire['etudiant1']; ?></li><br>
            <li><strong>Classe 1: </strong> <?php echo $donneesFormulaire['classe1']; ?></li><br>
            <li><strong>Étudiant 2: </strong> <?php echo $donneesFormulaire['etudiant2']; ?></li><br>
            <li><strong>Classe 2: </strong> <?php echo $donneesFormulaire['classe2']; ?></li><br>
            <li><strong>Projet: </strong> <?php echo $donneesFormulaire['projet']; ?></li><br>
            <li><strong>Encadreur ISET: </strong> <?php echo $donneesFormulaire['encadreurIset']; ?></li><br>
            <li><strong>Nom de l'Entreprise: </strong> <?php echo $donneesFormulaire['nomEntreprise']; ?></li><br>
            <li><strong>Encadreur de l'Entreprise:</strong> <?php echo $donneesFormulaire['encadreurEntreprise']; ?></li>
        </ul><br>

        <button class="btn btn-success" type="button" onclick="imprimerPage()">Imprimer</button>
    </div>

</body>

</html>