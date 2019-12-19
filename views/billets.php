<?php 
require('header.php');
?>

<article class="message is-primary">
  <div class="message-body">
  Bienvenue ! Je vous laisse découvrir mon roman intitulé <strong>"Billet simple pour l'Alaska"</strong>. Je posterai un chapitre par semaine. j'espère que cela vous plaira et surtout n'hésitez pas a me donner votre avis en commentaire !
  </div>
</article>

<?php
while ($donnees = $billets->fetch()) {
?>
<div class="card">
  <div class="card-header">
    <p class="card-header-title"><?= $donnees["titre"];?></p>
  </div>
  <div class="card-content">
    <div class="content summary"><?=$donnees["contenu"];?></div>
    <small class="has-text-weight-light is-size-7 has-text-right is-block">
      <time datetime="<?=$donnees["date_creation"];?>"><?=$donnees["date"];?></time>
    </small>
  </div>
  <div class="card-footer">
    <a class="card-footer-item" href="index.php?action=billet&billet_id=<?=$donnees["id"];?>">Voir plus</a>
  </div>
</div>

<?php

}

require('footer.php');
?>