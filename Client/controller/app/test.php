<?php
session_start();
?>
<style>
    body {
        background: #000;
        min-height: 100vh;
        display: grid;
        place-items: center;
        color: white;
        font-family: sans-serif;
        overflow: hidden;
    }

    .glitch {
        position: absolute;
        top: 25%;
        font-size: 5rem;
        font-weight: 700;
        text-transform: uppercase;
        text-shadow:
            0.05em 0 0 rgba(255, 0, 0, 0.75),
            -0.025em 0 0 rgba(32, 211, 32, 0.75),
            0.025em 0 0 rgba(0, 0, 255, 0.75);
        animation: glitch 700ms infinite;
    }

    .glitch span {
        position: absolute;
        top: 0;
        left: 0;

    }

    .glitch span:first-child {
        animation: glitch 700ms infinite;
        z-index: 1;
        clip-path: polygon(0 50%, 100% 0, 100% 30%, 0 30%);
        transform: translate(-0.05em, -0.025em);
    }

    .glitch span:last-child {
        animation: glitch 350ms infinite;

        clip-path: polygon(0 60%, 100% 60%, 100% 100%, 0 100%);
        transform: translate(-0.05em, -0.025em);
    }

    @keyframes glitch {
        0% {
            text-shadow:
                0.05em 0 0 rgba(255, 0, 0, 0.75),
                -0.05em -0.025em 0 rgba(0, 255, 0, 0.75),
                -0.025em 0.05em 0 rgba(0, 0, 255, 0.75);
        }

        14% {
            text-shadow:
                0.05em 0 0 rgba(255, 0, 0, 0.75),
                -0.05em -0.025em 0 rgba(0, 255, 0, 0.75),
                -0.025em 0.05em 0 rgba(0, 0, 255, 0.75);
        }

        15% {
            text-shadow:
                0.05em -0.025em 0 rgba(255, 0, 0, 0.75),
                0.025em 0.025em 0 rgba(0, 255, 0, 0.75),
                -0.05em -0.05em 0 rgba(0, 0, 255, 0.75);
        }

        49% {
            text-shadow:
                -0.05em -0.025em 0 rgba(255, 0, 0, 0.75),
                0.025em 0.025em 0 rgba(0, 255, 0, 0.75),
                -0.05em -0.05em 0 rgba(0, 0, 255, 0.75);
        }

        50% {
            text-shadow:
                0.025em 0.05em 0 rgba(255, 0, 0, 0.75),
                0.05em 0 0 rgba(0, 255, 0, 0.75),
                -0.05em -0.05em 0 rgba(0, 0, 255, 0.75);
        }

        99% {
            text-shadow:
                0.025em 0.05em 0 rgba(255, 0, 0, 0.75),
                0.05em 0 0 rgba(0, 255, 0, 0.75),
                0 -0.05em 0 rgba(0, 0, 255, 0.75);
        }

        100% {
            text-shadow:
                -0.025em 0 0 rgba(255, 0, 0, 0.75),
                -0.025em -0.025em 0 rgba(0, 255, 0, 0.75),
                0.025em 0.05em 0 rgba(0, 0, 255, 0.75);
        }
    }

    a {
        position: absolute;
        top: 70%;
        border-radius: 5px;
        padding: 10px 20px;
        color: black;
        text-decoration: none;
        font-size: 1.5rem;
        display: block;
        margin-top: 20px;
        text-align: center;
        text-transform: uppercase;
        font-weight: 700;
        letter-spacing: 0.1em;
        transition: 0.3s;
        background-color: #00bf8e;
        box-shadow: 0px 0px 10px 1px rgba(255, 255, 255, 0.75);
    }

    a:hover {
        transform: scale(1.05);

        transition: transform 0.3s ease-in-out;
    }
</style>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['code_utilisateur'])) {
        $codeUtilisateur = $_POST['code_utilisateur'];

        if ($codeUtilisateur == $_SESSION['code_verification']) {

?>

            <body>
                <p class="glitch">
                    <span aria-hidden="true">Code Correct </span>
                    Code Correct
                    <span aria-hidden="true">Code Correct </span>
                </p>
                <a href="../login.php">Login</a>
            </body>

        <?php
        } else {
        ?>

            <body>
                <p class="glitch">
                    <span aria-hidden="true">Code Incorrect </span>
                    Code Incorrect
                    <span aria-hidden="true">Code Incorrect </span>
                </p>
                <a href="index.php">Reessayer</a>
            </body>
<?php
        }
    }
}
?>