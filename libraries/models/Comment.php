<?php

namespace Models;

class Comment extends Model
{
    protected $table = "comments";

    // Fonction de selection des commentaires d'articles
    public function findAllWithID(int $article_id) : array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE article_id = :article_id");
        $query->execute(['article_id' => $article_id]);
        $commentaires = $query->fetchAll();

        return $commentaires;
    }

    // Fonction d'insertion d'un commentaire
    public function insert(string $author, string $content, string $article_id) : void
    {
        $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
        $query->execute(compact('author', 'content', 'article_id'));
    }

}