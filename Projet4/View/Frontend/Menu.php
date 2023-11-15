<?php $title = 'Jean Forteroche'; ?>

<?php ob_start(); ?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
	
	<img src="images/write.jpg" class="d-block w-100" alt="image de fond du slider">
	<div id="textarea-carousel"><p>Bienvenue sur mon site internet</p></div>
		
    </div>
  </div>
</div>

<div id="articles"><h1>Les Articles</h1></div>
<div id="exemple-card">
	<?php
	while ($data = $posts->fetch())
	{
	?>
		
		<div class="card" style="width: 18rem;">
			<img src="images/exemple.jpg" class="card-img-top" alt="image d'illustration">
				<div class="card-body">
					<h5 class="card-title"><?= htmlspecialchars($data['title']) ?></h5>
					<em>le <?= $data['creation_date_fr'] ?></em>
					<p class="card-text"><?= nl2br(substr(strip_tags($data['content']),0,150)) ?>...
					<div><a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-primary">Lire l'article</a></div>
				</div>
		</div>
		
		<?php
	}
	$posts->closeCursor();
	?>

</div>


	

	

<?php $content = ob_get_clean(); ?>


<?php require('template.php'); ?>