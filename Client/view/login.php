<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
    <style>
      
    .custom-heading {
        text-align: center;
        margin: 4em auto;
        font-size: 1.5em;
        background-color: #f8f9fa;
        padding: 5px 10px;
        max-width: 400px; /* Adjusted max-width */
        border-radius: 10px;
    }

      

        .text-success {
            color: #28a745;
        }

        .custom-heading span {
            cursor: pointer;
            transition: color 0.3s ease-in-out;
        }

        .custom-heading span:hover {
            color: #dc3545;
        }
        
        .link-style {
            color: blue;
            cursor: pointer;
        }
        .frm-cnx, .frm-ins {
    max-width: 400px;
    margin: 0 auto;
}
    </style>
</head>
<body>

<div class="container">
    <div class="body-page">
        <h1 class="custom-heading">
         <strong>   <span class="text-primary" data-value="Connexion">Connexion</span> - <span class="text-success" data-value="Inscription">Inscription</span></strong>
        </h1>

        <div class="cnx my-5">
            <div class="frm-cnx col-md-6 mx-auto">
                <form class="cnx" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group row">
                        <label for="mail" class="col-sm-4 col-form-label">Email :</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" required name="mail" id="mail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pass" class="col-sm-4 col-form-label">Mot de passe :</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" required name="pass" id="pass">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-8">
                            <input type="submit" name="cnx" value="Connexion" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ins my-5">
            <div class="frm-ins col-md-6 mx-auto">
                <form class="ins" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nom">NCE :</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <label for="email">Email :</label>
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="pass1">Mot de passe :</label>
                            <input type="password" class="form-control" id="pass1" name="pass1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pass2">Répéter le mot de passe :</label>
                            <input type="password" class="form-control" id="pass2" name="pass2">
                        </div>
                    </div>
                    <div class="form-row">
                        <input type="submit" class="btn btn-success btn-block" value="Inscription" name="ins">
                    </div>
                </form>
            </div>
        </div>

        <?php echo isset($error) ? $error : ''; ?>
    </div>
</div>

<script>
    function redirectToProduct() {
        window.location.href = "formulaire.php";
    }

    document.getElementById("nosLink").addEventListener("click", redirectToProduct);
</script>
<script>

     // ! nice hacker effect 
     const letters = "abcdefghijklmnopqrstuvwxyz";
    const elements = document.getElementsByClassName("text-primary");

    for(let i = 0; i < elements.length; i++) {
        elements[i].onmouseover = event => {
            let iterations = 0;
            const interval = setInterval(() => {
                event.target.innerText = event.target.innerText.split("")
                .map((letter,index) => {
                    if(index < iterations){
                        return event.target.dataset.value[index];
                    }
                    return letters[Math.floor(Math.random() * 26)];
                })
                .join("");
                if(iterations >= 9) clearInterval(interval);
                iterations+= 1 / 2;
            }, 50);
        };
    }
</script>

</body>
</html>