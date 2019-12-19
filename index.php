<?php
require('controller.php');

$controller = new Controller();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'billets') {
        $controller->listeBillets();
    } 
    elseif ($_GET['action'] == 'billet') {
        if (isset($_GET['billet_id']) && $_GET['billet_id'] > 0) {
            $controller->listeBillet($_GET['billet_id']);
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
elseif (isset($_POST['action'])) {
    if ($_POST['action'] == 'addComment') {
        $controller->addComment($_POST['pseudo'], $_POST['message'], $_POST['billet_id']);
    }
    elseif ($_POST['action'] == 'reportComment') {
        $controller->reportComment($_POST['report_comment'], $_POST['commentaire_id'], $_POST['billet_id']);
    } 
}
else {
    $controller->listeBillets();
}