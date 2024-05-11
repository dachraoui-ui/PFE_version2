
<?php
session_start();
$navbar = '';

include "add.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pass = isset($_POST['password']) ? $_POST['password'] : "";
    $error = "";

    if (!empty($email) && !empty($pass)) {
        $sql = "SELECT * FROM user WHERE email=? AND password=? AND groupID = '2'";
        $req = $cnx->prepare($sql);
        $req->execute(array($email, $pass));
        $row = $req->fetch();
        $count = $req->rowCount();

        if ($count == 0) {
            echo '
            <br/><div class="container"><div class="col-md-6 mx-auto"><div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Email address or Password invalid !    
            </div></div></div>';
        } else {
            $_SESSION['id'] = $row['idUser'];
            $_SESSION['nom'] = $row['Nom'];
            $_SESSION['prenom'] = $row['Prenom'];

            header("Location: page.php");
            exit();
        }
    }
}

include "../Include/template/footer.php";
include "../view/login.php";
?>
