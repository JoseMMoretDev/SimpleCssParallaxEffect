<?php if(!defined('INCLUDE_CHECK'))	require_once('/IBN/404.php'); 
$servicio = getServicio($tag);
?>

<div id="banner" class="parallax-container" data-parallax="scroll" data-image-src='<?= $servicio["imagename"]?>'>
</div>

<section>
		<h1 class="red-grad seccion"><?= $servicio['titulo'] ?></h1>
		<div class="container servicio">
			<p class="parrafo"> <?= nl2br($servicio['texto']) ?></p>
		</div>
</section>