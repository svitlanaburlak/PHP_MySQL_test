<?php
/** @var \App\Models\Card[] $cards */
?>

<h2 class="main-title">Les fiches</h2>
   <table class="main-list">
   <tr class="main-item">
      <th>Id</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Email</th>
      <th>Actions</th>
   </tr>

   <?php
      foreach ($cards as $card) {
   ?>
      <tr class="main-item">
         <td><?= $card->getId() ?></td>
         <td><?= $card->getLastname() ?></td>
         <td><?= $card->getFirstname() ?></td>
         <td><?= $card->getEmail() ?></td>
         <td>
            <a class="main-item--link" alt="Voir les details" href="<?= $router->generate('card-read', ['id' => $card->getId()]) ?>">&#9757;</a>
            <a class="main-item--link" alt="Modifier la fiche" href="<?= $router->generate('card-edit', ['id' => $card->getId()] ) ?>">&#9998;</a>   
         </td>
      </tr>
   <?php
      }
   ?>
</table>

<a class="main-link" href="<?= $router->generate('card-add', ['id' => null]) ?>">Ajouter</a>
