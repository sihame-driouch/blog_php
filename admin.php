<?php

require('controller_admin.php');

$controller_admin = new ControllerAdmin();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'billet') {
        $controller_admin->listeBillet($_GET['billet_id']);
    }
    elseif ($_GET['action'] == 'createBilletPage') {
        $controller_admin->createBilletPage();
    }
    else {
        echo 'Erreur : impossibilité de créer le billet ou commentaire non valide';
    }
} 
elseif (isset($_POST['action'])) {
    if ($_POST['action'] == 'editBillet') {
        $controller_admin->editBillet($_POST['billet'], $_POST['billet_id'], $_POST['titre']);
    } 
    elseif ($_POST['action'] == 'deleteBillet') {
        $controller_admin->deleteBillet($_POST['billet_id']);
    }
    elseif ($_POST['action'] == 'createBillet') {
        $controller_admin->createBillet($_POST['titre'], $_POST['contenu']);
    }
    elseif ($_POST['action'] == 'validateComment') {
        $controller_admin->validateComment($_POST['validate'], $_POST['commentaire_id'], $_POST['billet_id']);
    }
    elseif ($_POST['action'] == 'reportComment') {
        $controller_admin->reportComment($_POST['report_comment'], $_POST['commentaire_id'], $_POST['billet_id']);
    }
    
}
else {
    $controller_admin->listeBillets();
}

