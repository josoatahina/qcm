<?php $optionId = isset($data['indexOption']) ? $data['indexOption'] : 1; ?>
<div class="add-more-option border border-secondary m-4 p-4" accept-charset="UTF-8">
    <p>Option <?php echo $optionId; ?></p>
    <div class="form-group">
        <label>Texte</label>
        <input type="text" class="form-control" name="options[<?php echo $optionId; ?>]" placeholder="Texte..." value="<?php if(isset($d)) { echo $d; } ?>" required />
    </div>
</div>