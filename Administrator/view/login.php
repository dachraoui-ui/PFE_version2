<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-image: url('../../Upload/imgs/test.jpg');
            background-size: cover;
            background-position: center;
            color: #17202A;
            overflow: hidden;
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

        .card-body {
            background-color: #F8F9F9; 
            padding: 20px;
            border-radius: 8px;
        }

        .body-page h1 {
            cursor: pointer;
        }
    </style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* ... Votre CSS ici ... */
    </style>
</head>
<body>

<div class="container login">
    <div class="row mt-5">
        <div class="col-md-4 mt-5 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <h1 class="text-center">
                        <span class="text-primary">
                            <i class="fa fa-lock" aria-hidden="true"></i> Login
                        </span>
                    </h1>
                    <form method="POST" action="../controller/login.php">

                        <div class="form-group">
                            <label for="email">Adresse Email :</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="pass">Mot de passe :</label>
                            <input type="password" id="pass" name="password" class="form-control" required>
                        </div>
                        <input class="btn btn-primary btn-block" type="submit" value="Connexion">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>
