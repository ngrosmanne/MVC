<?php

// Chargement des classes
require_once('model/DbConnectManager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ChangeCommentManager.php');


function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function changeComment($id, $idComment)
{
    $commentManager = new CommentManager();
    $CommentChangeManager = new ChangeCommentManager();
    
    $comments = $commentManager->getCommentId($_GET['idComment']);
    // $changedComment = $changeCommentManager->changeComment($_GET['id'],$_GET['idComment']);

    require('view\frontend\changePostView.php');
}