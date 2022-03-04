<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Détail post</title>
        <link href="style.css" rel="stylesheet" /> 
    </head>
        
    <body>

        <h2>Commentaire</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
        </br>
        <h2>Modifier le comentaire</h2>

        <form action='index.php?action=changeComment&id=<?=$post['id'];?>&idComment=<?=$post['id'];?>' method="post">
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>

    </body>
</html>