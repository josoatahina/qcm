<form class="add-more-question border border-secondary m-4 p-4" accept-charset="UTF-8">
    <h4>Question <?php echo $data['index']; ?></h4>
    <div class="form-group">
        <label for="texte">Texte</label>
        <input type="text" class="form-control" name="texte" id="texte" placeholder="Texte..." required />
    </div>
    <div class="info-options-<?php echo $data['index']; ?>"></div>
    <div><span class="btn btn-success" onclick="addOption(<?php echo $data['index']; ?>)">Ajouter option</span></div>
</form>