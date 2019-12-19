<?php
require('model.php');

class ControllerAdmin {

   private $comments_model; 
   private $billets_model;

    function __construct() {
        $this->comments_model = new Comments();
        $this->billets_model = new Billets();
    }

    function listeBillets($message=NULL)
    {
        $billets = $this->billets_model->getAll();

        require('views/billets_admin.php');
    }

    function deleteBillet($billet_id)
    {
        $this->billets_model->delete($billet_id);
        $message = "Votre chapitre a bien été supprimé";
        $this->listeBillets($message);
    }

    function editBillet($nouveau_contenu, $billet_id, $titre)
    {
        $edit = $this->billets_model->edit($nouveau_contenu, $billet_id, $titre);
        $message = "Votre chapitre a bien été modifié";
        $this->listeBillet($billet_id, $message);
    }

    function listeBillet($billet_id, $message=NULL)
    {
        $billet = $this->billets_model->get($billet_id);
        $comments = $this->comments_model->getComments($billet_id);

        require('views/billet_admin.php');
    }

    function createBillet($titre, $contenu)
    {
        $this->billets_model->create($titre, $contenu);
        $message = "Votre chapitre a bien été ajouté";
        $this->listeBillets($message);
    }

    function createBilletPage()
    {
        require('views/create_billet.php');
    }

    function validateComment($validate, $commentaire_id, $billet_id)
    {
        $this->comments_model->validateComment($validate, $commentaire_id);
        $this->listeBillet($billet_id);
    }

    function reportComment($report_comment, $commentaire_id)
    {
        $this->comments_model->reportComment($report_comment, $commentaire_id);
        $this->listeBillet($billet_id);
    }
}