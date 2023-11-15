<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                
                if (!empty($_POST['Author']) && !empty($_POST['Comment'])) {
                    addComment($_GET['id'], $_POST['Author'], $_POST['Comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action']== 'reportComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0){
                reportComment($_GET['id'], $_GET['postId']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        elseif ($_GET['action'] == 'adminDashboard'){
            viewAdminDashboard();
        }
   
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}