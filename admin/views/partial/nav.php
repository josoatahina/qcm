<div class="col-2 bg-dark text-white admin-menu p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 d-block">
        <div class="collapse d-block" id="navbarSupportedContent">
            <ul class="navbar-nav flex-column">
                <li class="nav-item <?php if(!isset($_REQUEST['c'])) { echo 'active'; } ?>">
                    <a class="nav-link" href="/qcm/admin/">Tableau de bord</a>
                </li>
                <li class="nav-item dropdown <?php if(isset($_REQUEST['c']) && ($_REQUEST['c'] == 'Qcm' || $_REQUEST['c'] == 'Questionnaire')) { echo 'active'; } ?> <?php if(isset($_REQUEST['c']) && ($_REQUEST['c'] == 'Qcm' || $_REQUEST['c'] == 'Questionnaire')) { echo 'show'; } ?>">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">QCM</a>
                    <div class="dropdown-menu bg-dark <?php if(isset($_REQUEST['c']) && ($_REQUEST['c'] == 'Qcm' || $_REQUEST['c'] == 'Questionnaire')) { echo 'show'; } ?>">
                        <a class="dropdown-item text-white <?php if(isset($_REQUEST['c']) && $_REQUEST['c'] == 'Questionnaire') { echo 'active'; } ?>" href="?c=Questionnaire">Tous les QCM</a>
                        <a class="dropdown-item text-white <?php if(isset($_REQUEST['c']) && $_REQUEST['c'] == 'Qcm') { echo 'active'; } ?>" href="?c=Qcm&m=add">Ajouter un QCM</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?c=Admin&m=logout">Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
</div>