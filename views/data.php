<div class="col-12 mt-4 border border-secondary rounded p-2">
    <h4><?php echo $data['titre']; ?></h4>
    <div class="mt-3">
        Nombre de question : <?php echo count($data['questionnaire']); ?><br>
        Niveau : <?php echo $data['niveau']; ?>
    </div>
    <div class="mt-2">
        <a class="btn btn-primary" data-toggle="collapse" href="#info<?php echo $data['data_id']; ?>" role="button" aria-expanded="false" aria-controls="info<?php echo $data['id']; ?>">Voir mes réponses</a>
    </div>
    <div class="mt-2 collapse" id="info<?php echo $data['data_id']; ?>">
        <?php foreach($data['questionnaire'] as $q) { ?>
        <div class="p-2">
            <div class="mb-1">➱ <?php echo $q['texte']; ?></div>
            <?php
            $options = json_decode($q['options'], true);
            if(!in_array($data['data'][$q['id']], $options)) { ?>
            <div class="text-warning">Votre réponse ne fait plus partie des options.</div>
            <?php }
            foreach($options as $value) {
            ?>
            <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" <?php if($value == $data['data'][$q['id']]) { echo 'checked'; } ?> disabled /> <?php echo $value; ?>
                </label>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>