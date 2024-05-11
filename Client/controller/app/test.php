
<?php
session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['code_utilisateur'])) {
        $codeUtilisateur = $_POST['code_utilisateur'];

        if ($codeUtilisateur == $_SESSION['code_verification']) {
         
            echo 'correct';
        } else {
        
            echo 'incorrect';
        }
    }
}
?>
