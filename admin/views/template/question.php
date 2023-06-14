<form class="add-more-question border border-secondary m-4 p-4" accept-charset="UTF-8">
    <input type="hidden" name="id_qcm" value="<?php echo $data['id_qcm']; ?>" />
    <h4>Question <?php echo $data['indexQuestion']; ?></h4>
    <div class="form-group">
        <label for="texte<?php echo $data['indexQuestion']; ?>">Texte</label>
        <input type="text" class="form-control" name="texte" id="texte<?php echo $data['indexQuestion']; ?>" placeholder="Texte..." value="<?php if(isset($data['texte'])) { echo $data['texte']; } ?>" required />
    </div>
    <div class="info-options-<?php echo $data['indexQuestion']; ?>">
        <?php
            if(isset($data['options'])) {
                $data['options'] = json_decode($data['options'], true);
                $i = 1;
                foreach($data['options'] as $d) {
                    $data['indexOption'] = $i;
                    include('options.php');
                    $i++;
                }
            } else {
                include('options.php');
            }
        ?>
    </div>
    <div class="form-group">
        <label for="reponse<?php echo $data['indexQuestion']; ?>">Réponse (entrez le numéro de l'option)</label>
        <input type="number" class="form-control" name="reponse" id="reponse<?php echo $data['indexQuestion']; ?>" placeholder="3" value="<?php if(isset($data['reponse'])) { echo $data['reponse']; } ?>" required />
    </div>
    <div><span class="btn btn-success" onclick="addOption(<?php echo $data['indexQuestion']; ?>)">Ajouter option</span> <button class="btn btn-primary">Mettre à jour</button></div>
</form>