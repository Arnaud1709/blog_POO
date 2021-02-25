<?php

namespace Models;

abstract class Model
{
    protected $pdo; 
    protected $table;

    // Fonction de connexion
    public function __construct()
    {
        $this->pdo = \Database::getPdo();
    }

    //Fonction "find"
    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        $item = $query->fetch();

        return $item;
    }

    //Fonction "delete"
    public function delete(int $id) : void
    {
        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
    }

    //Fonction "findAll"
    public function findAll(?string $order = "") : array
    {   
        $sql= "SELECT * FROM {$this->table}";

        if ($order) {
            $sql .= " ORDER BY " . $order;
        }

        $resultats = $this->pdo->query($sql);
        $articles = $resultats->fetchAll();

        return $articles;
    }
    
}