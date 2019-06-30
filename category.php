<?php get_header() ?>

<main class='pagina seccion no-sidebars contenedor' >
	<?php
	$categoria = get_queried_object();
	$categoria = $categoria->name;
//	var_dump($categoria);//Otra manera de obtener el title de la categoria
		//single_cat_title() -> Otra manera de obtener la categoria sin el tipo de taxonomia delante

	?>
	<h2 class='text-center texto-primario'><?php the_archive_title()?></h2>
	<ul class='listado-blog' >
		<?php while ( have_posts() ):the_post() ?>
			<?php get_template_part( 'template_parts/loop', 'blog' ) ?>
		<?php endwhile; ?>
	</ul >
</main >


<?php get_footer() ?>
