<?php
require_once(__DIR__ ."/../Model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date ASC');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function createPost($title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $affectedLines = $posts->execute(array($title, $content));

        return $affectedLines;
    }

    public function deletePost($Id)
    {
        $db = $this->dbConnect();
        $Posts = $db->prepare('DELETE FROM Posts WHERE id = ?');
        $Posts->execute(array($Id));
    }

    public function editPost($title, $content, $id)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('UPDATE posts SET title = ?, content = ?  WHERE id = ?');
        $affectedLines = $posts->execute(array($title, $content, $id));

        return $affectedLines;
    }
}