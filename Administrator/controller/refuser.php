<?php
session_start();
include "../../config/connexion.php";
include "../fct/fonction.php";

// Vérifie si l'action est "valider"
if(isset($_GET['action']) && $_GET['action'] === 'valider') {
    // Vérifie si l'email est spécifié
    if(isset($_GET['email'])) {
        $email = $_GET['email'];

        // Mettez à jour le statut dans la base de données
        $query = "UPDATE formulaire SET Status = 'accepté' WHERE email = :email";

        // Préparez la requête
        $stmt = $cnx->prepare($query);

        // Liez les paramètres
        $stmt->bindParam(':email', $email);

        // Exécutez la requête
        if($stmt->execute()) {
            echo ".";
        } else {
            echo "Erreur lors de la mise à jour du statut : " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Email non spécifié.";
    }
} else
if(isset($_GET['action']) && $_GET['action'] === 'refuser') {
    // Vérifie si l'email est spécifié
    if(isset($_GET['email'])) {
        $email = $_GET['email'];

        // Mettez à jour le statut dans la base de données
        $query = "UPDATE formulaire SET Status = 'refuser' WHERE email = :email";

        // Préparez la requête
        $stmt = $cnx->prepare($query);

        // Liez les paramètres
        $stmt->bindParam(':email', $email);

        // Exécutez la requête
        if($stmt->execute()) {
            echo ".";
        } else {
            echo "Erreur lors de la mise à jour du statut : " . $stmt->errorInfo()[2];
        }
    } else {
        echo "Email non spécifié.";
    }
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        #emailDisplay {
            font-weight: bold;
        }
        #reasonInput {
            margin-top: 10px;
        }
        #emailContainer {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">

<?php
if (isset($_GET['email'])) {
    $email = urldecode($_GET['email']);
}
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="app/mail.php" method="post">
                <div class="form-group">
                    <label for="reasonInput">Message :</label>
                    <textarea class="form-control" id="reasonInput" name="reasonInput" rows="4"></textarea>
                </div>
                <input type="hidden" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>">
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
