<?php
require_once(__DIR__ ."/../Model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? AND report = 0 ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }
    
    public function reportComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET report = 1 WHERE id = ?');
        $comments->execute(array($commentId));
    }

    public function viewCommentReport()
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, report, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE report = 1 ORDER BY comment_date DESC');
        $comments->execute();

        return $comments;
    }

    public function restoreComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET report = 0 WHERE id = ?');
        $comments->execute(array($commentId));
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('DELETE FROM comments WHERE id = ?');
        $comments->execute(array($commentId));
    }
}