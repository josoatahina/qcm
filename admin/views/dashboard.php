<div class="col-12 mt-4">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4"><h3>Bienvenu dans le tableau de bord</h3></div>
            <div class="col-3 text-center">
                <div class="border border-primary">
                    <div class="badge-primary">Nombre de QCM</div>
                    <div class="info"><?php echo $nb_qcm; ?></div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="border border-secondary">
                    <div class="badge-secondary">Nombre d'utilisateur</div>
                    <div class="info"><?php echo $nb_users; ?></div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="border border-danger">
                    <div class="badge-danger">Utilisateur ayant participé</div>
                    <div class="info"><?php echo $participant; ?></div>
                </div>
            </div>
            <div class="col-3 text-center">
                <div class="border border-success">
                    <div class="badge-success">Taux de réussites</div>
                    <div class="info"><?php echo $taux_reussite; ?> %</div>
                </div>
            </div>
        </div>
    </div> 
</div>