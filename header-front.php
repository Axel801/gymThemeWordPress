<!doctype html>
<html lang='en' >
<head >
	<meta charset='UTF-8' >
	<meta name='viewport' content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0' >
	<meta http-equiv='X-UA-Compatible' content='ie=edge' >
	<?php wp_head(); ?>
</head >
<body <?php body_class() ?> >
<?php
	$id_image = get_field( 'image_hero' );
	$imagen = wp_get_attachment_image_src( $id_image, 'full' )[0];
?>
<header class='site-header' style='background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.75)), url(<?= $imagen ?>)' >
	<div class='contenedor header-grid' >
		<div class='barra-navegacion' >
			<div class='logo' >
				<a href='<?= esc_url(site_url( '/' ) )?>' >
					<img src='<?= get_template_directory_uri() ?>/img/logo.svg' alt='Logo sitio' >
				</a >
			</div >

			<?php
				$args = array(
					'theme_location' => 'menu-principal',
					'container' => 'nav',
					'container_class' => 'menu-principal'
				);
				wp_nav_menu( $args );
			?>

		</div >
		<div class='tagline text-center' >
			<h1 ><?php the_field( 'encabezado_hero' ) ?></h1 >
			<p ><?php the_field( 'contenido_hero' ) ?></p >
		</div >
	</div >
</header >
