<?php
require('controller\controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();                                    // switch to post list view
        }                                                   
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();                                     // switch to post view
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']); // switch to add comment
                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'changeComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_GET['idComment'])) {
                    //addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                    echo "OK";
                    changeComment($_GET['id'], $_GET['idComment']); 

                }
                else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }



        
    }
    else {
        listPosts();        // switch to post list view
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Error : ';
    print_r($e->getMessage());
}
