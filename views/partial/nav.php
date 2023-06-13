<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if(!isset($_REQUEST['c'])) { echo 'active'; } ?>">
                <a class="nav-link" href="/qcm/">Accueil</a>
            </li>
        <li class="nav-item <?php if(isset($_REQUEST['c']) && $_REQUEST['c'] == 'Qcm') { echo 'active'; } ?>">
            <a class="nav-link" href="?c=Qcm">Questionnaire</a>
        </li>
        <li class="nav-item <?php if(isset($_REQUEST['c']) && $_REQUEST['c'] == 'User') { echo 'active'; } ?>">
            <a class="nav-link" href="?c=User">Mon compte</a>
        </li>
        </ul>
        <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="?c=User&m=logout">Déconnexion</a>
            </li>
        </ul>
    </div>
</nav>