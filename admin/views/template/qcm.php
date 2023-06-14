<div class="col-3 mt-4 item-qcm" onclick="showQcm(<?php echo $q['id']; ?>)">
    <div class="border border-primary">
        <div class="border border-primary text-center text-primary"><?php echo $q['titre']; ?></div>
        <div class="p-2 border border-primary">
            <div class="text-justify limit"><?php echo $q['descriptions']; ?></div>
            <div class="mt-2">Nombre de question : <?php echo $nb_qcm; ?></div>
        </div>
    </div>
</div>