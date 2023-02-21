<?php
/** @var \App\Models\Card $card */
/** @var string[] $errors */
?>

<?php
if ($card->getId() > 0) {
    ?>
    <h2 class="main-title">Modifier la fiche #<?= $card->getId() ?></h2>
    <?php
}
else {
    ?>
    <h2 class="main-title">Ajouter une fiche</h2>
    <?php
}

?>

<form action="" method="POST" class="main-form">
    <?php   
        if (isset($errors) && is_array($errors)) {
            var_dump($error);
            foreach ($errors as $error) {
            ?>
                <div><?= $error ?></div>
                <?php
            }
        }
    ?>

    <div>
      <p>Civilité: &#42;</p>
      <input type="radio" id="civility1" name="civility" value="Mme" />
      <label for="civility1">Mme</label>

      <input type="radio" id="civility2" name="civility" value="Mr" />
      <label for="civility2">Mr</label>

      <input type="radio" id="civility2" name="civility" value="Autre" />
      <label for="civility3">Autre</label>
    </div>
    <div>
        <label for="lname" class="form-label">Nom</label>
        <input type="text"
                id="lname"
                name="lname"
                value="<?= $card->getLastname() ?>"
                placeholder="Nom">
    </div>
    <div>
        <label for="fname" class="form-label">Prénom</label>
        <input type="text"
                id="fname"
                name="fname"
                value="<?= $card->getFirstname() ?>"
                placeholder="Prénom">
    </div>
    <div>
        <label for="address" class="form-label">Adresse</label>
        <input type="text"
                id="address"
                name="address"
                value="<?= $card->getAddress() ?>"
                placeholder="Adresse">
    </div>
    <div>
        <label for="zipcode" class="form-label">Code postal:</label>
        <input type="text"
                id="zipcode"
                name="zipcode"
                pattern="[0-9]{5}"
                value="<?= $card->getZipcode() ?>"
                placeholder="Code postal">
        <small>Format: 12345</small>
    </div>
    <div>
        <label for="city" class="form-label">Ville:</label>
        <input type="text"
                id="city"
                name="city"
                value="<?= $card->getCity() ?>"
                placeholder="Ville">
    </div>
    <div>
        <label for="country" class="form-label">Pays:</label>
        <input type="text"
                id="country"
                name="country"
                value="<?= $card->getCountry() ?>"
                placeholder="Pays">
    </div>
    <div>
        <label for="birthdate">Date de naissance: &#42;</label>
        <input type="date" 
                id="birthdate" 
                name="birthdate"
                value="<?= $card->getBirthdate() ?>"
                min="1900-01-01">
    </div>
    <div>
        <label for="phone">Téléphone: &#42;</label>
        <input type="tel"
                id="phone"
                name="phone"
                value="<?= $card->getPhone() ?>"
                placeholder="Téléphone">
        <small>Format: 0123456789</small>
    </div>
    <div>
        <label for="fax">Fax: &#42;</label>
        <input type="tel"
                id="fax"
                name="fax"
                value="<?= $card->getFax() ?>"
                placeholder="Fax">
        <small>Format: 0123456789</small>
    </div>
    <div>
        <label for="email">Email: &#42;</label>
        <input type="text"
                id="email"
                name="email"
                value="<?= $card->getEmail() ?>"
                placeholder="Email@email.com">
    </div>
    <div>
        <label for="url" class="form-label">URL: &#42;</label>
        <input type="text"
                id="url"
                name="url"
                value="<?= $card->getUrl() ?>"
                placeholder="https://example.com">
    </div>

    <div>
        <button class="main-button" type="submit">Valider</button>
    </div>
</form>

<a class="main-link" href="<?= $router->generate('main-home') ?>">Retour</a>

