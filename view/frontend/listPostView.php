<?php $title = 'wood4s'; ?>

<?php ob_start(); ?>
<h1><?= $title; ?></h1>
<p>Derniers billets du blog :</p>


<?php
while ($post = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($post['content'])) ?>
            <br />
            <em><a href="?action=post&id=<?= $post['id']?>">Commentaires</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>