<?php $title = 'Panneau de contrôle'; ?>

<?php ob_start(); ?>

<h1>les Articles</h1>
<div id="exemple-card">
	<?php
	while ($data = $posts->fetch())
	{
	?>
		
		<div class="card" style="width: 18rem;">
			<img src="../../images/exemple.jpg" class="card-img-top" alt="image d'illustration">
			<div class="card-body">
				<h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
				<em>le <?= $data['creation_date_fr'] ?></em>
				<p class="card-text"><?= nl2br(substr(strip_tags($data['content']),0,150)) ?>...
				<div>	<a href="../../View/backend/router.php?action=viewEditPost&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Modifier</a>
						<a href="../../View/backend/router.php?action=deletePost&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Supprimer</a>
				</div>
			</div>
		</div>
		
		<?php
	}
	$posts->closeCursor();
	?>

</div>


<h1>Les Commentaires signalés</h1>

<?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
			<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p> <a href="../../View/backend/router.php?action=restoreComment&amp;id=<?= $comment['id'] ?>" >Rétablir</a>
			<a href="../../View/backend/router.php?action=deleteComment&amp;id=<?= $comment['id'] ?>" >Supprimer</a>
			
    
        <?php
        }
        ?>

<?php $content = ob_get_clean(); ?>

<?php require('TemplateB.php'); ?>