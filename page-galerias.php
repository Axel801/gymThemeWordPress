<?php
	/*
	 * Template Name: Template para galeria
	 */

?>
<?php get_header() ?>

<main class='contenedor pagina seccion ' >
	<div class='contenido-principal' >
		<?php while ( have_posts() ):the_post() ?>
			<h1 class='text-center texto-primario' ><?php the_title() ?></h1 >

			<?php
			$galeria = get_post_gallery( get_the_ID(), false );
			$galerias_id = explode( ',', $galeria['ids'] );
			?>

			<ul class='galeria-imagenes' >

				<?php $i = 1; ?>
				<?php foreach ( $galerias_id as $id ): ?>

					<?php
					$size = ( $i == 4 || $i == 6 ) ? 'portrait' : 'square';
					$imgthumb = wp_get_attachment_image_src( $id, $size )[0];
					$imagen = wp_get_attachment_image_src( $id, 'full' )[0];
					?>
					<li >
						<a href='<?= $imagen ?>' data-lightbox="galeria" >
							<img src='<?= $imgthumb ?>' alt='' >
						</a >
					</li >

					<?php ++$i; ?>
				<?php endforeach; ?>

			</ul >
		<?php endwhile; ?>


	</div >

</main >
<?php get_footer(); ?>
