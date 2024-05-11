<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

$query = "SELECT etudiant1, classe1, etudiant2, classe2, projet, encadreurIset, nomEntreprise, encadreurEntreprise FROM formulaire";
$stmt = $cnx->prepare($query);
$stmt->execute();

$donneesFormulaires = $stmt->fetchAll(PDO::FETCH_ASSOC);


$filename = "export_excel_" . date('Ymd') . ".xls";
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename=' . $filename);

echo '<table border="1">';
echo '<tr>';
foreach ($donneesFormulaires[0] as $colonne => $valeur) {
    echo '<th>' . $colonne . '</th>';
}
echo '</tr>';

foreach ($donneesFormulaires as $formulaire) {
    echo '<tr>';
    foreach ($formulaire as $colonne => $valeur) {
        echo '<td>' . $valeur . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>
