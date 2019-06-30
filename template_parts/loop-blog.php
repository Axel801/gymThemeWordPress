<li class='card gradient' >
	<?php the_post_thumbnail( 'mediano' ); ?>
	<?php the_category(); ?>
	<div class='contenido' >
		<a href='<?php the_permalink() ?>' >
			<h3 ><?php the_title() ?></h3 >
		</a >
		<p class='meta' >
			<span >Por:</span >
			<a href='<?= get_author_posts_url( get_the_author_meta( 'ID' ) ) ?>' >
				<?= get_the_author_meta( 'display_name' ) ?>
			</a >
			<?= the_time( get_option( 'date_format' ) ) ?>
		</p >
		<p class='meta' >
			<span >Fecha:</span >
			<?= the_time( get_option( 'date_format' ) ) ?>
		</p >
	</div >
</li >

