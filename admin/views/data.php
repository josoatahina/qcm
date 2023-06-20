<div class="col-12 mt-4 border border-secondary rounded p-2">
    <h4><?php echo $data['titre']; ?></h4>
    <div class="mt-3">
        Nombre de question : <?php echo count($data['questionnaire']); ?><br>
        Niveau : <?php echo $data['niveau']; ?><br>
        Identifiant du participant : <?php echo $user['username']; ?>
    </div>
    <div class="mt-2">
        <a class="btn btn-primary" data-toggle="collapse" href="#info<?php echo $data['data_id']; ?>" role="button" aria-expanded="false" aria-controls="info<?php echo $data['id']; ?>">Voir les réponses</a>
    </div>
    <div class="mt-2 collapse" id="info<?php echo $data['data_id']; ?>">
        <?php if(count($data['questionnaire']) !== count($data['data'])) { ?>
        <div class="p-2 text-danger"><?php $nb = count($data['data']) - count($data['questionnaire']); echo $nb; ?> <?php if($nb > 1) { echo "questions ont été supprimées."; } else { echo "question a été supprimée."; } ?> </div>
        <?php } ?>
        <?php foreach($data['questionnaire'] as $q) { ?>
        <div class="p-2">
            <div class="mb-1">➱ <?php echo $q['texte']; ?></div>
            <?php
            $options = json_decode($q['options'], true);
            if(!in_array($data['data'][$q['id']], $options)) { ?>
            <div class="text-warning">Sa réponse ne fait plus partie des options.</div>
            <?php }
            foreach($options as $value) { ?>
            <div class="form-check">
                <label class="form-check-label <?php if($value == $data['data'][$q['id']] && $value == $q['reponse']) { echo 'text-success'; } elseif($value == $data['data'][$q['id']] && $value != $q['reponse']) { echo 'text-danger'; } elseif($value == $q['reponse']) { echo 'text-success'; } ?>">
                    <input type="radio" class="form-check-input" <?php if($value == $data['data'][$q['id']]) { echo 'checked'; } ?> disabled /> <?php echo $value; ?>
                </label>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>