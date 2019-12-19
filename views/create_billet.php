<?php
require('header.php');
?>

<div class="card">
    <div class="card-content">
        <form action="admin.php" method="POST">
            <label for="titre">Titre :</label>
            <input type="text" name="titre" id="titre" /><br />
            <label for="billet">Billet :</label>
            <textarea type="text" name="contenu" id="billet"></textarea><br/>
            <input type="hidden" name="action" value="createBillet" />
            <button class="button" type="submit" value="Créer">Créer</button>
        </form>
    </div>
</div>

<?php
require('footer.php');
?>