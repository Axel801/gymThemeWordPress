<?php get_header( 'front' ) ?>
<section class='bienvenida text-center seccion' >
	<h2 class='texto-primario' ><?php the_field( 'encabezado_bienvenida' ) ?></h2 >
	<p ><?php the_field( 'texto_bienvenida' ) ?></p >
</section >

<div class='seccion-areas' >
	<ul class='contenedor-areas' >
		<?php for ( $i = 1; $i <= 4; ++$i ): ?>
			<li class='area' >
				<?php
					$area = get_field( 'area_' . $i );

					$imagen = wp_get_attachment_image_src( $area['imagen'], 'mediano' )[0];
				?>
				<img src='<?= esc_attr( $imagen ) ?>' alt='' >
				<p ><?= esc_html( $area['texto'] ) ?></p >
			</li >
		<?php endfor; ?>
	</ul >
</div >

<section class='clases' >
	<div class='contenedor seccion' >
		<h2 class='text-center texto-primario' >Nuestras Clases</h2 >
		<?php gymfitness_lista_clases( 4 ) ?>
		<div class='contenedor-boton' >
			<a href='<?= esc_url( get_permalink( get_page_by_title( 'Nuestras Clases' ) ) ) ?>' class='boton boton-primario' >
				Ver todas las clases
			</a >
		</div >
	</div >
</section >

<section class='instructores' >
	<div class='contenedor seccion' >
		<h2 class='text-center texto-primario' >
			Nuestros instructores
		</h2 >
		<p class='text-center'>Instructores profesionales que te ayudarán a logar tus objetivos</p >
		<ul class='listado-instructores' >
			<?php
				$args = array(
					'post_type' => 'instructores',
					'posts_per_page' => 30
				);
				$instructores = new WP_Query( $args );
				while ( $instructores->have_posts() ): $instructores->the_post(); ?>
					<li class='instructor' >
						<?php the_post_thumbnail( 'mediano' ) ?>
						<div class='contenido text-center' >
							<h3 ><?php the_title() ?></h3 >
							<?php the_content() ?>
							<div class='especialidad' >
								<?php
									$esp = get_field( 'especialidad' );
									foreach ( $esp as $e ): ?>
										<span class='etiqueta' >
											<?= esc_html( $e ) ?>
										</span >
									<?php endforeach; ?>
							</div >
						</div >
					</li >
				<?php endwhile;
				wp_reset_postdata() ?>
		</ul >
	</div >
</section >

<section class='testimoniales' >
	<h2 class='text-center texto-blanco' >Testimoniales</h2 >
	<div class='contenedor-testimoniales' >
		<ul class='listado-testimoniales' >
			<?php
				$args = array(
					'post_type' => 'testimoniales',
					'posts_per_page' => 10
				);
				$testimoniales = new WP_Query( $args );
				while ( $testimoniales->have_posts() ): $testimoniales->the_post(); ?>

					<li class='testimonial text-center' >
						<blockquote >
							<?php the_content() ?>
						</blockquote >
						<div class='testimonial-footer' >
							<?php the_post_thumbnail( 'thumbnail' ); ?>
							<p ><?php the_title() ?></p >
						</div >
					</li >
				<?php endwhile;
				wp_reset_postdata() ?>
		</ul >
	</div >
</section >

<section class='blog contenedor section' >
	<h2 class='text-center texto-primario' >
		Nuestro Blog
	</h2 >
	<p class='text-center' >Aprende tips de nuestros instructores expertos</p >
	<ul class='listado-blog' >
		<?php
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 4
			);
			$blog = new WP_Query( $args );
			while ( $blog->have_posts() ):$blog->the_post();
				get_template_part( 'template_parts/loop', 'blog' );
			endwhile;
			wp_reset_postdata() ?>
	</ul >
</section >
<?php get_footer() ?>
