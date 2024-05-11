<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

$query = "SELECT etudiant1, classe1, etudiant2, classe2, projet, encadreurIset, nomEntreprise, encadreurEntreprise FROM formulaire WHERE user = :id";
$stmt = $cnx->prepare($query);
$stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
$stmt->execute();

$donneesFormulaire = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Formulaire PFE</title>
    
   
    <link rel="stylesheet" href="chemin/vers/bootstrap.min.css">
    <script src="chemin/vers/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">

    <style>
        body {
            font-family: 'Roboto', sans-serif; 
            background-color: #f8f9fa; 
        }

        .container {
            max-width: 1000px; /* Largeur maximale du conteneur pour le centrage */
            margin: 50px auto; /* Centrage du conteneur */
            background-color: #fff; /* Couleur de fond du conteneur */
            padding: 20px;
            border-radius: 10px; /* Coins arrondis du conteneur */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        h2 {
            color: #007bff; /* Couleur du titre */
            text-align: center;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px; /* Marge au-dessus du tableau */
        }

        th, td {
            border: 1px solid #dee2e6; /* Couleur des bordures du tableau */
            padding: 12px;
            text-align: left;
        }

        .edit-mode {
            border: 2px solid #007bff;
            transition: border-color 0.3s; 
        }

        .edit-mode:hover {
            border-color: #0056b3; 
        }
        button {
    background-color: #007bff;
    color: #fff;
    padding: 12px 24px;
    border: none;
    border-radius: 4px;
    cursor: pointer;

    position: relative;
    left: 600px; 
}

button:hover {
    background-color: #0056b3;
}

    </style>
   
</head>
<body>
    <div class="container">
        <h2>Détails du votre Formulaire</h2><br><br>
        <form action="modifier_formulaire.php" method="post">
            <table>
                <?php
                // Vérifiez si $donneesFormulaire est défini et n'est pas nul
                if (isset($donneesFormulaire) && is_array($donneesFormulaire)) {
                    // Afficher les en-têtes du tableau avec le nom des colonnes
                    echo "<tr>";
                    foreach ($donneesFormulaire as $colonne => $valeur) {
                        echo "<th>$colonne</th>";
                    }
               
                    echo "</tr>";

                    // Afficher les valeurs du dernier formulaire
                    echo "<tr>";
                    foreach ($donneesFormulaire as $colonne => $valeur) {
                        echo "<td class='edit-mode' onclick='toggleEditMode(this)'>$valeur</td>";
                    }
                
                    echo "</tr>";
                } else {
                    // Si $donneesFormulaire n'est pas défini ou est nul, afficher un message d'erreur par exemple
                    echo "<tr><td colspan='2'>Aucune donnée disponible</td></tr>";
                }
                ?>
            </table>
        </form>
    </div>
    <a href="modifier_formulaire.php"><button>Modifier le formulaire</button></a>
    <a href="imprimer.php"><button>Imprimer</button></a>
    <a href="logout.php"><button>Se déconnecter</button></a>
</body>
</html>