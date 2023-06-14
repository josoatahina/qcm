<div class="col-12 mt-4 item-qcm" onclick="showQcm(<?php echo $q['id']; ?>)">
    <div class="border border-primary">
        <div class="p-2 text-primary"><a href="?c=Questionnaire&m=answer&id=<?php echo $q['id']; ?>"><b><?php echo $q['titre']; ?></b></a></div>
        <div class="p-2">
            <div class="text-justify limit"><?php echo $q['descriptions']; ?></div>
            <div class="mt-2">
                Difficulté : <?php echo $q['niveau']; ?><br>
                Nombre de question : <?php echo $nb_qcm; ?>
            </div>
            <div class="text-right mt-2"><a href="?c=Questionnaire&m=answer&id=<?php echo $q['id']; ?>">Appliquer ➠</a></div>
        </div>
    </div>
</div>