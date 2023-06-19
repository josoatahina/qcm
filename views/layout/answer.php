<div class="col-12 mt-4">
    <h1 class="title position-relative"><?php echo $qcm['titre']; ?></h1>
    <p class="mt-5 text-justify"><?php echo $qcm['descriptions']; ?></p>
    <p class="mt-2"><u>Niveau</u> : <?php echo $qcm['niveau']; ?><?php if(isset($qcm['sujet'])) { ?>, <u>Sujet</u> : <?php echo $qcm['sujet']; ?><?php } ?></p>
</div>

<form class="col-12 mt-2 user-answer">
    <input type="hidden" name="id_qcm" value="<?php echo $qcm['id']; ?>" />
    <?php foreach($questionnaire as $q) { ?>
    <div class="border border-dark rounded p-3 item-questionnaire mt-2 mb-2">
        <div class="mb-1">➱ <?php echo $q['texte']; ?></div>
        <?php $options = json_decode($q['options'], true); ?>
        <?php foreach($options as $option) { ?>
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="reponse_choisi[<?php echo $q['id']; ?>]" value="<?php echo $option; ?>" required> <?php echo $option; ?>
            </label>
        </div>
        <?php } ?>
    </div>
    <?php } ?>
    <button class="btn btn-primary">Valider</button>
</form>