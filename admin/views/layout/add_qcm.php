<div class="col-12 col-md-7 m-auto">
    <form class="admin-add-qcm mt-4 rounded bg-dark text-white p-4" accept-charset="UTF-8">
        <h3 class="text-center badge-secondary">Ajout QCM</h3>
        <div class="form-group">
            <label for="titre">Titre*</label>
            <input type="text" class="form-control" name="titre" id="titre" placeholder="Titre..." required />
        </div>
        <div class="form-group">
            <label for="descriptions">Descriptions</label>
            <textarea class="form-control" name="descriptions" id="descriptions" placeholder="Descriptions..." rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="sujet">Sujet</label>
            <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet..." />
        </div>
        <div class="form-group">
            <label for="niveau">Niveau*</label>
            <select class="form-control" name="niveau" id="niveau" required>
                <option value="Facile">Facile</option>
                <option value="Intermédiaire">Intermédiaire</option>
                <option value="Difficile">Difficile</option>
                <option value="Très difficile">Très difficile</option>
            </select>
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-success" value="Ajouter" />
        </div>
        <div class="mt-4 text-danger">*Champs obligatoires</div>
    </form>
</div>