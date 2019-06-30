<?php get_header() ?>

<main class='pagina seccion no-sidebars contenedor' >
	<h2 class='text-center texto-primario'><?php the_archive_title()?></h2>
	<p class='text-center'><?php the_author_meta('description')?></p>
	<ul class='listado-blog' >
		<?php while ( have_posts() ):the_post() ?>
			<?php get_template_part( 'template_parts/loop', 'blog' ) ?>
		<?php endwhile; ?>
	</ul >
</main >


<?php get_footer() ?>
