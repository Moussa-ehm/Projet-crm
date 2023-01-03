<?php $this->nettoyer($this->titre = "Connexion") ?>
<section class="w-100 p-4 d-flex justify-content-center pb-4">
    <form method="post" action="user/connecter">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="email" id="form2Example1" name="email" class="form-control" placeholder="Email" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="form2Example2" name="password" class="form-control" placeholder="Mot de passe" />
        </div>

        <!-- 2 column grid layout for inline styling -->
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Se souvenir de moi </label>
                </div>
            </div>

            <div class="col">
                <!-- Simple link -->
                <a href="#!">Forgot password?</a>
            </div>
        </div>
        <button type="submit" name="valider" class="btn btn-primary btn-block mb-4">Se connecter</button>
        </div>
    </form>
</section>
<?php if (isset($msgErreur)) : ?>
    <p><?= $this->nettoyer($msgErreur) ?></p>
<?php endif; ?>