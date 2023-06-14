<div class="col-12 border border-secondary rounded mt-4">
    <form class="admin-update-qcm mt-4 rounded bg-dark text-white p-4" accept-charset="UTF-8">
        <input type="hidden" name="id" value="<?php echo $qcm['id']; ?>" />
        <div class="form-group">
            <label for="titre">Titre*</label>
            <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre..." value="<?php echo $qcm['titre']; ?>" required />
        </div>
        <div class="form-group">
            <label for="descriptions">Descriptions</label>
            <textarea class="form-control" name="descriptions" id="descriptions" placeholder="Descriptions..." rows="5"><?php echo $qcm['descriptions']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="sujet">Sujet</label>
            <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet..." value="<?php echo $qcm['sujet']; ?>" />
        </div>
        <div class="form-group">
            <label for="niveau">Niveau*</label>
            <select class="form-control" name="niveau" id="niveau" required>
                <option value="Facile">Facile</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Difficile">Difficile</option>
                <option value="Très difficile">Très difficile</option>
            </select>
        </div>
        <div class="text-center">
            <button class="btn btn-warning">Mettre à jour QCM</button> <span class="btn btn-danger" onclick="deleteQcm(<?php echo $qcm['id']; ?>)">Supprimer QCM</span>
        </div>
    </form>
</div>

<div class="col-12 border border-secondary rounded mt-4 mb-4">
    <div class="info-questionnaire">
        <?php
            $i = 1;
            foreach($questionnaire as $data) {
                $data['indexQuestion'] = $i;
                include('views/template/question.php');
                $i++;
            }
        ?>
    </div>
    <div class="mb-3 mt-3"><button class="btn btn-success" onclick="addQuestion(<?php echo $qcm['id']; ?>);">Ajouter des questions</button></div>
</div>