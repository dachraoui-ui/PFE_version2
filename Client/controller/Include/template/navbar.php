<nav class="navbar navbar-expand-sm navbar-dark bg-primary navbar-custom">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            
            <li class="nav-item">
                <a class="nav-link" href="product.php"><h5>Accueil</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contract.php"><h5>Mes contrats</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="comments.php"><h5>Commentaires</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controller/offre.php"><h5>Demande Offre</h5></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controller/off.php"><h5>Mes Offre</h5></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <?php
                if (isset($_SESSION['id'])) {
                    echo '<a class="nav-link" href="users.php?dir=setting&id=' . $_SESSION['id'] . '">';
                    echo '<i class="fa fa-cogs" aria-hidden="true"></i> Paramètres';
                    echo '</a>';
                }
                ?>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">
                    <i class="fa fa-sign-out" aria-hidden="true"></i> Quitter
                </a>
            </li>
        </ul>
    </div>
</nav>
