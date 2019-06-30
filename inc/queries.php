<?php
	function gymfitness_lista_clases ($cantidad = 9999)
	{
		?>
		<ul class='lista-clases' >
			<?php
				$args = array(
					'post_type' => 'gymfitness_clases',
					'posts_per_page' => $cantidad,

				);
				$clases = new WP_Query( $args );
				while ( $clases->have_posts() ): $clases->the_post(); ?>
					<li class='clase card gradient' >
						<?php the_post_thumbnail( 'mediano' ) ?>
						<div class='contenido' >
							<a href='<?= get_the_permalink() ?>' >
								<h3 ><?= get_the_title() ?></h3 >
							</a >

							<?php
								 $hora_inicio = get_field('start_time');
								$hora_fin = get_field('end_time');

							?>
							<p><?= get_field('days_class') ?> - <?= $hora_inicio. ' - '.$hora_fin?></p>
						</div >
					</li >
				<?php endwhile;
				wp_reset_postdata() ?>
		</ul >
		<?php
	}
