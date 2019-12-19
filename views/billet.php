<?php
require('header.php');
?>

<div class="card">
  <div class="card-content">
    <?php
    $donnees = $billet->fetch();
    ?>
    <h1 class="title is-4"><?=$donnees['titre'];?></h1>
    <p><?=$donnees['contenu'];?></p>
  </div>
</div>

<div class="card">
  <div class="card-header">
    <h2 class="card-header-title">Laissez un commentaire !</h2>
  </div>
  <div class="card-content">
    <form action="index.php" method="POST">
      <label class="label" for="pseudo">Pseudo :</label>
      <input class="input" type="text" name="pseudo" id="pseudo" /><br>
      <label class="label" for="message">Message :</label><textarea class="textarea" name="message" id="message" ></textarea><br />
      <input type="hidden" name="action" value="addComment" />
      <input type="hidden" name="billet_id" value="<?= htmlspecialchars($donnees['id']); ?>" />
      <button class="button is-outlined" type="submit" value="Envoyer">Envoyer</button>
    </form>
  </div>
</div>
<?php

while ($commentsBillet = $comments->fetch()) {
  if ($commentsBillet["valide"] == 1 ) {
?>
<div class="card">
  <div class="card-header">
    <p class="card-header-title"><?= htmlspecialchars($commentsBillet["pseudo"]); ?></p>
  </div>
  <div class="card-content">
    <div class="content">
      <p><?= htmlspecialchars($commentsBillet["message"]); ?></p>
    
      <p class="has-text-weight-light is-size-7"><?= htmlspecialchars($commentsBillet["date"]); ?></p>
        <form action="index.php" method="POST">
          <input type="hidden" name="action" value="reportComment" />
          <input type="hidden" name="billet_id" value="<?= $commentsBillet['id_billet'] ?>" />
          <input type="hidden" name="commentaire_id" value="<?= $commentsBillet['id'] ?>" />
          <input type="hidden" name="report_comment" value="1"/>
          <input class="button is-small is-danger is-light" type="submit" value="Signaler" />
        </form>
      </div>
    </div>
</div>
<?php
  }
}

require('footer.php');
?>