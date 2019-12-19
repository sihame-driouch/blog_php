<?php 

require('header.php');
?>

<article class="message is-primary">
  <div class="message-body">
    Bienvenue  monsieur <strong>Jean Forteroche !</strong> 
    <br>
    Vous pouvez ajouter, modifier ou supprimer un chapitre de votre roman.
    <br>
  </div>
</article>

<div class="add-article-button has-text-centered">
  <a class="button has-text-weight-semibold is-info" href="admin.php?action=createBilletPage">Ajouter un article</a>
</div>

<?php
while ($donnees = $billets->fetch()) {
?>
<div class="card">
  <div class="card-header">
    <p class="card-header-title"><?= $donnees["titre"]; ?></p>
  </div>
  <div class="card-content">
      <div class="content summary"><?= $donnees["contenu"];?></div>
      <small class="has-text-weight-light is-size-7 has-text-right is-block">
        <time datetime="<?= $donnees["date_creation"]; ?>"><?= $donnees["date"]; ?></time>
      </small>
  </div>
  <div class="card-footer">
    <a class="card-footer-item" href="admin.php?action=billet&billet_id=<?= $donnees["id"];?>">Voir plus</a>
  </div>
</div>

<?php
} 
?>

<?php
require('footer.php');
?>