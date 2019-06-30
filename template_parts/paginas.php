<?php while ( have_posts() ):the_post() ?>
	<h1 class='text-center texto-primario' ><?php the_title() ?></h1 >
	<?php the_post_thumbnail( 'blog', array( 'class' => 'imagen-destacada' ) ) ?>

	<?php
	if ( get_post_type() == 'gymfitness_clases' ) {

		$hora_inicio = get_field( 'start_time' );
		$hora_fin = get_field( 'end_time' );

		?>
		<p class='informacion-clase'><?= get_field( 'days_class' ) ?> - <?= $hora_inicio . ' - ' . $hora_fin ?></p >
	<?php } ?>
	<?php the_content() ?>
<?php endwhile; ?>

