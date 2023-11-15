<?php
require_once(__DIR__ . '/../Model/PostManager.php');
require_once(__DIR__ . '/../Model/CommentManager.php');


function viewAdminDashboard()
{
    $commentManager = new CommentManager();
    $comments = $commentManager->viewCommentReport();
    
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet
    require(__DIR__ .'/../View/backend/MenuB.php');
}

function restoreComment($commentId)
{
    $commentManager = new CommentManager();
    $commentManager->restoreComment($commentId);
    viewAdminDashboard();
}

function deleteComment($commentId){
    $commentManager = new CommentManager();
    $commentManager->deleteComment($commentId);
    viewAdminDashboard();
}

function viewNewPost()
{
    $postManager = new PostManager(); // Création d'un objet
    require(__DIR__ .'/../View/backend/NewPost.php');
}   

function addPost($title, $content)
{
    $postManager = new PostManager();

    $affectedLines = $postManager->createPost($title, $content);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter l\'article !');
    }
    else {
        header('Location: ../../View/backend/router.php?action=adminDashboard');
    }
}

function deletePost($Id){
    $PostManager = new PostManager();
    $PostManager->deletePost($Id);
    viewAdminDashboard();
}

function viewEditPost($postId){
    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    require(__DIR__ .'/../View/backend/ViewEditPost.php');
}

function editPost($title, $content, $id){
    $postManager = new PostManager();
    $affectedLines = $postManager->editPost($title, $content, $id);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier l\'article !');
    }
    else {
        header('Location: ../../View/backend/router.php?action=adminDashboard');
    }
    viewAdminDashboard();
}