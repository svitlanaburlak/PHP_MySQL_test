<?php
/** @var \App\Models\Card[] $cards */
?>

<a href="<?= $router->generate('card-add', ['id' => null]) ?>">Ajouter</a>

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
         <td><?= $card->getFirstname() ?></td>
         <td><?= $card->getLastname() ?></td>
         <td><?= $card->getEmail() ?></td>
         <td>
            <a href="<?= $router->generate('card-read', ['id' => $card->getId()]) ?>">Voir</a>
            <a href="<?= $router->generate('card-edit', ['id' => $card->getId()] ) ?>">Modifier</a>   
         </td>
      </tr>
   <?php
      }
   ?>
</table>
