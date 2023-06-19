<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if(!isset($_REQUEST['c'])) { echo 'active'; } ?>">
                <a class="nav-link" href="/qcm/">Accueil</a>
            </li>
        <li class="nav-item <?php if(isset($_REQUEST['c']) && $_REQUEST['c'] == 'Questionnaire') { echo 'active'; } ?>">
            <a class="nav-link" href="?c=Questionnaire">Questionnaire</a>
        </li>
        <li class="nav-item <?php if(isset($_REQUEST['c']) && $_REQUEST['c'] == 'Data') { echo 'active'; } ?>">
            <a class="nav-link" href="?c=Data">Mes réponses</a>
        </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $_SESSION['user']; ?></a>
                <div class="dropdown-menu logout">
                    <a class="dropdown-item" href="?c=Index&m=logout">Déconnexion</a>
                </div>
            </li>
        </ul>
    </div>
</nav>