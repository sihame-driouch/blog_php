<?php

require('model.php');

class Controller {

    private $billets_model;
    private $comments_model;

    function __construct(){    
        $this->billets_model = new Billets();
        $this->comments_model = new Comments();
    }

    function listeBillet($billet_id, $message=NULL)
    {
        $billet = $this->billets_model->get($billet_id);
        $comments = $this->comments_model->getComments($billet_id);

        require('views/billet.php');
    }

    function listeBillets()
    {
        $billets = $this->billets_model->getAll();

        require('views/billets.php');
    }

    function addComment($pseudo, $message, $billet_id)
    {
        $this->comments_model->addComment($pseudo, $message, $billet_id);
        $message = "Votre commentaire a bien été ajouté";
        $this->listeBillet($billet_id, $message);
    }

    function reportComment($report_comment, $commentaire_id, $billet_id)
    {
        $this->comments_model->reportComment($report_comment, $commentaire_id);
        $message = "Le commentaire a bien été signalé";
        $this->listeBillet($billet_id, $message);
    }
}