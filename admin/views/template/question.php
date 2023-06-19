<form class="add-more-question border border-secondary m-4 p-4 position-relative" accept-charset="UTF-8">
    <?php if(isset($data['id'])) { ?><span class="btn btn-light delete" onclick="deleteQuestion(<?php echo $data['id']; ?>)">❌</span><?php } ?>
    <input type="hidden" name="id_qcm" value="<?php echo $data['id_qcm']; ?>" />
    <?php if(isset($data['id'])) { ?><input type="hidden" name="id" value="<?php echo $data['id']; ?>" /><?php } ?>
    <h4>Question</h4>
    <div class="form-group">
        <label>Texte</label>
        <input type="text" class="form-control" name="texte" placeholder="Texte..." value="<?php if(isset($data['texte'])) { echo $data['texte']; } ?>" required />
    </div>
    <div class="info-options-<?php echo $data['indexQuestion']; ?>">
        <?php
            if(isset($data['options'])) {
                $data['options'] = json_decode($data['options'], true);
                foreach($data['options'] as $d) {
                    include('options.php');
                }
            } else {
                include('options.php');
            }
        ?>
    </div>
    <div class="form-group">
        <label for="reponse<?php echo $data['indexQuestion']; ?>">Entrer la bonne réponse</label>
        <input type="text" class="form-control" name="reponse" id="reponse<?php echo $data['indexQuestion']; ?>" placeholder="Bonne réponse" value="<?php if(isset($data['reponse'])) { echo $data['reponse']; } ?>" required />
    </div>
    <div><span class="btn btn-success" onclick="addOption(<?php echo $data['indexQuestion']; ?>)">Ajouter option</span> <button class="btn btn-primary">Mettre à jour</button></div>
</form>