<div class="col-12 col-md-6 m-auto">
    <form class="user-login mt-4 rounded bg-dark text-white p-4">
        <?php if(isset($_REQUEST['registerSuccess']) && $_REQUEST['registerSuccess'] == 1) { ?>
        <div class="text-center alert alert-success">Inscription réussie. Veuillez vous connecter maintenant.</div>
        <?php } ?>
        <div class="form-group">
            <label for="username">Identifiant</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="Identifiant..." required />
        </div>
        <div class="form-group">
            <label for="psswd">Mot de passe</label>
            <input type="password" class="form-control" name="psswd" id="psswd" placeholder="********" required />
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-success" value="Se connecter" />
        </div>
        <div class="text-right">
            <a href="?c=Index&m=register" class="text-white">S'inscrire</a>
        </div>
    </form>
</div>