<div class="add-more-option border border-secondary m-4 p-4 position-relative" accept-charset="UTF-8">
    <span class="btn btn-light delete" onclick="deleteOption(this)">❌</span>
    <p>Option</p>
    <div class="form-group">
        <label>Texte</label>
        <input type="text" class="form-control" name="options[]" placeholder="Texte..." value="<?php if(isset($d)) { echo $d; } ?>" required />
    </div>
</div>