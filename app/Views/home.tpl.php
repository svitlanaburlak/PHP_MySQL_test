<?php
/** @var \App\Models\Card[] $cards */
?>

<a href="<?= $router->generate('card-create') ?>">Ajouter</a>

<h2 class="main-title">Les fiches</h2>
   <table class="main-list">
   <tr class="main-item">
      <th>Id</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Email</th>
      <th>Actions</th>
   </tr>
   <tr class="main-item">
      <td>1</td>
      <td>Nom1</td>
      <td>Prénom1</td>
      <td>Email1</td>
      <td>
         <a href="<?= $router->generate('card-read') ?>">Voir</a>
         <a href="<?= $router->generate('card-update') ?>">Modifier</a> 
      </td>
   </tr>
   <tr class="main-item">
      <td>2</td>
      <td>Nom2</td>
      <td>Prénom2</td>
      <td>Email2</td>
      <td>
         <a href="<?= $router->generate('card-read') ?>">Voir</a>
         <a href="<?= $router->generate('card-update') ?>">Modifier</a>   
      </td>
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
            <a href="<?= $router->generate('card-update', ['id' => $card->getId()]) ?>">Modifier</a>   
         </td>
      </tr>
   <?php
      }
   ?>
</table>
