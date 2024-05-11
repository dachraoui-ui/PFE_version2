<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

$query = "SELECT etudiant1, classe1, etudiant2, classe2, projet, encadreurIset, nomEntreprise,encadreurEntreprise,Email,Status FROM formulaire";
$stmt = $cnx->prepare($query);
$stmt->execute();

$donneesFormulaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Formulaire PFE</title>
    
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">

  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

 
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<style>
    body {
        font-family: 'Roboto', sans-serif; 
        background-color: #f8f9fa;
        margin-right: 10cm; 
    }

    .mb-4 {
        position: relative;
        top: 10px;
        color: #007bff;
        left: 550px;
        font-weight: bold;
    }


</style>


<script>
        function toggleEditMode(cell) {
         
            if (!cell.classList.contains('edit-mode')) {
                cell.contentEditable = true;
                cell.classList.add('edit-mode');
            } else {
                cell.contentEditable = false;
                cell.classList.remove('edit-mode');
            }
        }

        $(document).ready(function() {
            $('#formulairesTable').DataTable();
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Formulaires des étudiants</h2><br>
      
            <table id="formulairesTable" class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <?php
                        if (!empty($donneesFormulaires)) {
                           
                            foreach ($donneesFormulaires[0] as $colonne => $valeur) {
                                echo "<th>$colonne</th>";
                            }
                           
                            echo "<th>Valider</th>";
                            echo "<th>Refuser</th>";
                           
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                <?php
if (!empty($donneesFormulaires)) {
   
    foreach ($donneesFormulaires as $formulaire) {
        echo "<tr>";
        foreach ($formulaire as $colonne => $valeur) {
            echo "<td class='edit-mode' onclick='toggleEditMode(this)'>$valeur</td>";
        }

        echo "<td><a href='refuser.php?email=" . urlencode($formulaire['Email']) . "&action=valider'><button class='btn btn-success'>Valider</button></a></td>";


        echo "<td><a href='refuser.php?email=" . urlencode($formulaire['Email']) . "&action=refuser'><button class='btn btn-danger'>Refuser</button></a></td>";
        
      

        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>Aucune donnée disponible</td></tr>";
}
?>
                </tbody>
            </table>
      
    </div>
    <br>
    <div class="button-container">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
        <a href="export_excel.php" target="_blank"><button class="btn btn-primary">Exporter Excel</button></a>

<a href="logout.php"><button class="btn btn-primary">Se déconnecter</button></a>
</div>
</body>
</html>
