<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="login.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <style>
      .container input[type="submit"]{
   padding:10px 20px;
}
   </style>
</head>

<body>

   <div class="container" id="container">
      <div class="form-container sign-up">
         <form class="ins" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
            <h1>Inscription</h1>
            <div class="social-icons">
               <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
               <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
               <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
               <a href="#" class="icon"><i class="fab fa-github"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="text" placeholder="NCE" id="nom" name="nom">
            <input type="email" placeholder="Email" id="email" name="email">
            <input type="password" placeholder="Mot de passe" id="pass1" name="pass1">
            <input type="password" placeholder="Répéter le mot de passe" id="pass2" name="pass2">
            <input type="submit" class="btn btn-success btn-block" value="Inscription" name="ins">
         </form>
      </div>
      <div class="form-container sign-in">
         <form class="ins" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <h1>connexion</h1>
            <div class="social-icons">
               <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
               <a href="#" class="icon"><i class="fab fa-google-plus-g"></i></a>
               <a href="#" class="icon"><i class="fab fa-linkedin-in"></i></a>
               <a href="#" class="icon"><i class="fab fa-github"></i></a>
            </div>
            <span>or use your email for registration</span>
            <input type="email" placeholder="Email" name="mail" id="mail">
            <input type="password" placeholder="Mot de passe" required name="pass" id="pass">
            <a href="#">Forgot your password?</a>
            <input type="submit" name="cnx" value="Connexion" class="btn btn-primary btn-block">
         </form>
      </div>
      <div class="toggle-container">
         <div class="toggle">
            <div class="toggle-panel toggle-left">
               <h1>Welcome Back!</h1>
               <p>Enter your personal details to use all of site features</p>
               <button class="hidden" id="login">Sign In</button>
            </div>
            <div class="toggle-panel toggle-right">
               <h1>Hello, Friend!</h1>
               <p>Register with your personal details to use all of site features</p>
               <button class="hidden" id="register">Sign Up</button>
            </div>
         </div>
      </div>
   </div>
   <script src="login.js"></script>
</body>

</html>