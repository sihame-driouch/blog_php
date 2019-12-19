<?php
require('header.php');

$donnees = $billet->fetch();

?>

<div class="card">
  <div class="card-content">
        <form action="admin.php" method="POST">
            <label class="label" for="titre">Titre :</label>
            <input class="input" type="text" name="titre" id="titre" value="<?= $donnees['titre'];?>" /><br>
            <label class="label" for="billet">Billet :</label>
            <textarea name="billet" id="billet"><?= $donnees['contenu'];?></textarea><br>
            <input type="hidden" name="billet_id" value="<?= $donnees['id'] ?>" />
            <button class="button" type="submit" name="action" value="editBillet">Modifier</button>
            <button class="button" type="submit" name="action" value="deleteBillet">Supprimer</button>
        </form>
<br>
<hr>

<?php

while ($commentsBillet = $comments->fetch()) {
?>
        <div class="card">
          <div class="card-header">
            <p class="card-header-title"><?= $commentsBillet["pseudo"];?></p>
        </div>
        <div class="card-content">
          <div class="content">
            <p><?=$commentsBillet["message"];?></p>
            <p class="has-text-weight-light is-size-7"><?=$commentsBillet["date"]; ?></p>
            <form action="admin.php" method="POST"> 
                <input type="hidden" name="billet_id" value="<?= $commentsBillet['id_billet'] ?>" />
                <input type="hidden" name="commentaire_id" value="<?= $commentsBillet['id'] ?>" />
                <input type="hidden" name="validate" value="<?= $commentsBillet['valide'] == 1 ? 0 : 1 ?>"/>
                <input type="hidden" name="action" value="validateComment" />
                <input class="button is-small is-danger is-light" type="submit" value="<?= $commentsBillet['valide'] == 1 ? "annuler" : "valider" ?>"/>
            </form>
          </div>
        </div>
</div>

<?php
    if ($commentsBillet["signale"] == 1 ) {
?>
<p>Le message a été signalé.</p>
<hr>
<?php
    }
} ?>
    </div>
</div>

<?php
require('footer.php');
?>