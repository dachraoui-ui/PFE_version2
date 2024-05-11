<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    
    
    font-family: 'Open Sans', sans-serif;
    background-image: url('../../../../Upload/imgs/test.jpg');
    background-size: cover;
    background-position: center;
    color: #fff; 
    overflow: hidden; 
}

.body-page h1 {
    cursor: pointer;
}


body::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
    background: inherit;
    filter: blur(3px); 
}


#profile-img {
    height: 300px;
    width: 300px;
    border-radius: 50%;
    margin: auto;
}



.container {
    margin-top: 50px;
}


h1 {
    font-size: 2.5em;
    text-align: center;
    color: #007bff;
    margin-bottom: 30px;
}


.frm-cnx,
.frm-ins {
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 30px;
}

.form-group {
    margin-bottom: 25px;
}
.btn{
    margin-top: 10px;

}
.form-row{
    margin-bottom: 10px;

}
label {
    font-weight: bold;
    color: #495057;
    display: block;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 12px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-sizing: border-box;
}

.btn {
    padding: 12px;
    cursor: pointer;
    border: none;
    border-radius: 5px;
    text-align: center;
    font-size: large;
    position: relative;
    left: 110px; 
    top: -1px;  
}


.btn-primary {
    background-color: #007bff;
    color: #fff;
}

.btn-success {
    background-color: #28a745;
    color: #fff;
}

.alert {
    margin-top: 20px;
    padding: 15px;
    border-radius: 5px;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

@media (max-width: 768px) {
    .frm-cnx,
    .frm-ins {
        width: 100%;
    }
}

</style>
<?php
    session_start();
    $navbar='';
    $error="";

    include "add.php";

    if(isset($_SESSION['id'])){
        header("Location: formulaire.php");
    }

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(isset($_POST['cnx'])){
            $email  = $_POST['mail'];
            $pass   = $_POST['pass'];
            
            if(!empty($email) && !empty($pass)){
                $sql    = "SELECT * FROM user WHERE email=? AND password=? AND groupID= '0'";
                $req    = $cnx->prepare($sql);
                $req->execute(array($email, $pass));
                $row    = $req->fetch();
                $count  = $req->rowCount(); 
                
                if($count == 0){
                    $error= '
                        <br/><div class="container"><div class="col-md-6 mx-auto"><div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Email address or Password invalid !    
                        </div></div></div>';
                } else {
                    $_SESSION['id'] = $row['idUser'];
                    $_SESSION['nom'] = $row['Nom'];
                
              
                    header("Location: formulaire.php");
                    exit();
                }
            }
        } else {
            $nom   = $_POST['nom'];
       
            $email  = $_POST['email'];
            $pass1  = $_POST['pass1'];
            $pass2  = $_POST['pass2'];
            
            if (empty($pass1) || empty($pass2)) {
                $error = '<br/><div class="container"><div class="col-md-6 mx-auto"><div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Les mots de passes ne peuvent pas être vides !    
                        </div></div></div>';
            } elseif ($pass1 !== $pass2) {
                $error = '<br/><div class="container"><div class="col-md-6 mx-auto"><div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Les 2 mots de passes ne se conviennent pas !    
                        </div></div></div>';
            } else {
                $nom = filter_var($nom, FILTER_SANITIZE_STRING);
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
            
                if (empty($nom) || empty($email)) {
                    $error = '<br/><div class="container"><div class="col-md-6 mx-auto"><div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Aucun champ ne doit être vide !    
                            </div></div></div>';
                } else {
                    // Vérification si le nom existe dans la table cine
                    $checkSql = 'SELECT cin FROM cine WHERE cin = :cin';
                    $checkReq = $cnx->prepare($checkSql);
                    $checkReq->execute(array('cin' => $nom));
            
                    if ($checkReq->rowCount() > 0) {
                        // Le nom existe déjà dans la table cine, procéder à l'insertion dans la table email
                        $sql = 'INSERT INTO email (Nom, email, password, GroupId) VALUES (:nom, :ema, :pass, 0)';
                        $req = $cnx->prepare($sql);
                        $req->execute(array(
                            'nom'   => $nom,
                            'ema'   => $email,
                            'pass'  => $pass2
                        ));
                        header("Location: app/index.php");
                        exit();
                    } else {
                        // Le nom n'existe pas, afficher un message d'erreur
                        $error = '<br/><div class="container"><div class="col-md-6 mx-auto"><div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Le CIN Fausse !    
                                </div></div></div>';
                    }
                }
            }
            
            }
        }
    

    include "Include/template/footer.php";
    include "../view/login.php";
?>
