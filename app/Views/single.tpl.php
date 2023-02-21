<?php
/** @var \App\Models\Card $card */
?>

<h2 class="main-title">Fiche <?= $card->getId() ?></h2>

<table class="main-list">
  <tr>
    <th>Civilité:</th>
    <td><?= $card->getCivility() ?></td>
  </tr>
  <tr>
    <th>Nom:</th>
    <td><?= $card->getLastname() ?></td>
  </tr>
  <tr>
    <th>Prénom:</th>
    <td><?= $card->getFirstname() ?></td>
  </tr>
  
  <tr>
    <th>Adresse:</th>
    <td><?= $card->getAddress() ?></td>
  </tr>
  <tr>
    <th>Code postal:</th>
    <td><?= $card->getZipcode() ?></td>
  </tr>
  <tr>
    <th>Ville:</th>
    <td><?= $card->getCity() ?></td>
  </tr>
  <tr>
    <th>Pays:</th>
    <td><?= $card->getCountry() ?></td>
  </tr>
  <tr>
    <th>Date de naissance:</th>
    <td><?= $card->getBirthdate() ?></td>
  </tr>
  <tr>
    <th>Téléphone:</th>
    <td><?= $card->getPhone() ?></td>
  </tr>
  <tr>
    <th>Fax:</th>
    <td><?= $card->getFax() ?></td>
  </tr>
  <tr>
    <th>Email:</th>
    <td><?= $card->getEmail() ?></td>
  </tr>
  <tr>
    <th>URL:</th>
    <td><?= $card->getUrl() ?></td>
  </tr>

</table>

<a class="main-link" alt="Retour à l'accueil" href="<?= $router->generate('main-home') ?>">Retour</a>
