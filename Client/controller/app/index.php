<?php
require_once 'mail.php';
require_once 'email.php';

error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_ERROR);

session_start(); 

$nombreAleatoire = str_pad(rand(10000, 99999), 5, '0', STR_PAD_LEFT);
$_SESSION['code_verification'] = $nombreAleatoire;

$mail->setFrom('yassine.meddeb2015@gmail.com', 'PFE ISET RADES');
$mail->addAddress($var);
$mail->Subject = 'Verification email';
$mail->Body = '<h2>votre code de vérification : <strong>' . $nombreAleatoire . '</strong></h2>';

$mail->SMTPDebug = 0;

$mail->send();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Verification</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap">
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
            margin: 0;
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

        h2 {
            font-size: 2.5em;
            text-align: center;
            color: black;
            margin-bottom: 30px;
            margin-top: 50px; 
        }

        form {
            max-width: 400px;
            margin: auto;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 30px;
        }

        label {
            font-weight: bold;
            color: #495057;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        button {
            padding: 12px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
        }
        button:hover {
            
            transform: scale(1.05);
            /* Increase the size of the button to 105% when hovered */
            transition: transform 0.3s ease-in-out;
        }
        a{
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>                                  
   <br><br><br><br><br><br><br><br><br><br>
    <form id="verificationForm" method="post" action="test.php">
        <label for="code_utilisateur">Code de verification :</label><br>
        
        <input type="text" id="code_utilisateur" name="code_utilisateur" required>
        <div id="error-message" style="color: red;"></div>
        <a href="#" onclick="location.reload();">renvoyer le code</a><br><br>
        <button type="button" onclick="verifyCode()">Verify Code</button><br>
       
    </form>

   

    <script>
        function verifyCode() {
            var enteredCode = document.getElementById('code_utilisateur').value;
            var errorMessage = document.getElementById('error-message');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'test.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText.trim() === 'correct') {
                        window.location.href = 'inserer.php';
                    } else {
                        errorMessage.innerHTML = 'Code incorrect. Veuillez réessayer.';
                    }
                }
            };
            xhr.send('code_utilisateur=' + enteredCode);
        }
    </script>
</body>
</html>

