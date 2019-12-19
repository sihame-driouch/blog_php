<?php

class Model
{
    protected $bdd;
    
    function __construct() {
        try
        {
            // Connexion a la bdd de alwaysdata.
            $this->bdd = new PDO('mysql:host=mysql-sihame.alwaysdata.net;dbname=sihame_blog;charset=utf8', 'sihame', 'Noisett3A!');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}

class Billets extends Model
{

    function getAll() {
        return $this->bdd->query('SELECT *, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%i") AS date FROM billets');
    }

    function get($billet_id) {
        $req = $this->bdd->prepare(
            'SELECT id, titre, contenu, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%i") AS date FROM billets WHERE id= ?');
        $req->execute(array($billet_id));
        return $req;
    }

    function edit($nouveau_contenu, $billet_id, $titre)
    {
        $req = $this->bdd->prepare('UPDATE billets SET contenu = ?, titre = ?  WHERE id = ?');
        $req->execute(array($nouveau_contenu, $titre, $billet_id));
    }

    function delete($billet_id)
    {
        $req = $this->bdd->prepare('DELETE FROM billets WHERE id = ?');
        $req->execute(array($billet_id));
    }

    function create($titre, $contenu)
    {
        $req = $this->bdd->prepare('INSERT INTO billets (titre, contenu) VALUES (?,?)');
        $req->execute(array($titre, $contenu));
    }

}

class Comments extends Model
{

    function getComments($billet_id) {
        $req = $this->bdd->prepare('SELECT pseudo, message, id_billet, id, valide, signale, DATE_FORMAT(date, "%d/%m/%Y à %Hh%i") AS date FROM commentaires WHERE id_billet= ? ORDER BY signale DESC, date');
        $req->execute(array($billet_id));
        return $req;
    }

    function addComment($pseudo, $message, $billet_id) {
        $req = $this->bdd->prepare('INSERT INTO commentaires (pseudo, message, id_billet) VALUES(?, ?, ?)');
        $req->execute(array($pseudo, $message, $billet_id));
    }

    function validateComment($validate, $commentaire_id)
    {
        $req = $this->bdd->prepare('UPDATE commentaires SET valide = ? WHERE id = ?');
        $req->execute(array($validate, $commentaire_id));
    }

    function reportComment($report_comment, $commentaire_id)
    {
        $req = $this->bdd->prepare('UPDATE commentaires SET signale = ? WHERE id = ?');
        $req->execute(array($report_comment, $commentaire_id));
    }
}