<?php    // MVC -> MODELE
function getPosts()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date_fr, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date FROM posts ORDER BY creation_date_fr DESC LIMIT 0, 5');
	
    return $req;
}

