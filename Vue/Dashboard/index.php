Bienvenue,<?= $this->nettoyer($name) ?>

<form method="post" action="user/deconnecter">
    <button type="submit" name="deconnexion" class="btn btn-primary">Deconnexion</button>
</form>

<h2>Ajouter un service</h2>
<div class="open-btn">
    <button class="open-button" onclick="openForm()"><strong>Ouvrir la forme</strong></button>
</div>
<div class="login-popup">
    <div class="form-popup" id="popupForm">
        <form action="service/addService" class="form-container" method="post">
            <label for="service">
                <strong>Services</strong>
            </label>
            <input type="text" name="nameService" id="nameService" placeholder="Nom du service" required /><br />
            <button type="submit" class="btn">Ajouter</button>
            <button type="button" class="btn cancel" onclick="closeForm()">Fermer</button>
        </form>
    </div>
</div>