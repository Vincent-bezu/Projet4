<?php
require('../../Controller/backend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'adminDashboard'){
            viewAdminDashboard();
        }
    
    
    elseif ($_GET['action'] == 'restoreComment'){
        if (isset($_GET['id']) && $_GET['id'] > 0 ){
            restoreComment($_GET['id']);
        }
        else {
            throw new Exception('Aucun identifiant de commentaire envoyé');
        }
        
    }
    elseif ($_GET['action'] == 'deleteComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0 ){
                deleteComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }

    elseif ($_GET['action'] == 'newPost'){
            viewNewPost();
        }
        
    elseif ($_GET['action'] == 'addPost') {
            
                
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    addPost($_POST['title'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                } 
        }
    elseif ($_GET['action'] == 'deletePost'){
            if (isset($_GET['id']) && $_GET['id'] > 0 ){
                deletePost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
    

    elseif ($_GET['action'] == 'viewEditPost'){
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            viewEditPost($_GET['id']);
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
    }
    
    elseif ($_GET['action'] == 'editPost') {
            
                
        if (!empty($_POST['title']) && !empty($_POST['content']) && isset($_GET['id']) && $_GET['id'] > 0) {
            editPost($_POST['title'], $_POST['content'], $_GET['id']);
        }
        else {
            throw new Exception('Tous les champs ne sont pas remplis !');
        } 
}
    }
    }
    catch(Exception $e) {
        echo 'Erreur : ' . $e->getMessage();
    }