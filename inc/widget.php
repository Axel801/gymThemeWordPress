<?php
	if ( !defined( 'ABSPATH' ) ) die();


	function gymfitness_register_foo_widget ()
	{
		register_widget( 'GymFitness_Clases_Widget' );
	}

	add_action( 'widgets_init', 'gymfitness_register_foo_widget' );

	/**
	 * Adds Foo_Widget widget.
	 */
	class GymFitness_Clases_Widget extends WP_Widget
	{

		/**
		 * Register widget with WordPress.
		 */
		function __construct ()
		{
			parent::__construct(
				'foo_widget', // Base ID
				esc_html__( 'GymFitness Clases', 'gymfitness' ), // Name
				array( 'description' => esc_html__( 'Widget con las clases', 'gymfitness' ), ) // Args
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget ( $args, $instance )
		{
			echo $args['before_widget'];
			$cantidad = $instance['cantidad'];
			if ( $cantidad == '' ) {
				$cantidad = 3;
			}
			?>
			<ul >
				<?php
					$args = array(
						'post_type' => 'gymfitness_clases',
						'posts_per_page' => $cantidad,
						'orderby' => 'rand'
					);
					$clases = new WP_Query( $args );
					while ( $clases->have_posts() ): $clases->the_post(); ?>
						<li class='clase-sidebar'>
							<div class='imagen' >
								<?php the_post_thumbnail( 'thumbnail' ) ?>
							</div >
							<div class='contenido-clase' >
								<a href='<?php the_permalink() ?>' >
									<h3 ><?php the_title() ?></h3 >
								</a >
								<?php
									$hora_inicio = get_field( 'start_time' );
									$hora_fin = get_field( 'end_time' );

								?>
								<p ><?= get_field( 'days_class' ) ?> - <?= $hora_inicio . ' - ' . $hora_fin ?></p >
							</div >
						</li >
					<?php endwhile;
					wp_reset_postdata(); ?>
			</ul >
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form ( $instance )
		{
			$cantidad = !empty( $instance['cantidad'] ) ? $instance['cantidad'] : esc_html__( '¿Cuantas clases desea mostrar?', GYMFITNESS_TEXTDOMAIN );
			?>
			<p >
				<label for='<?= esc_attr( $this->get_field_id( 'cantidad' ) ) ?>' >
					<?php esc_attr_e( '¿Cuantas clases desea mostrar?', GYMFITNESS_TEXTDOMAIN ) ?>
				</label >
				<input class='widefat' id='<?= esc_attr( $this->get_field_id( 'cantidad' ) ) ?>' type='number'
				       name='<?= esc_attr( $this->get_field_name( 'cantidad' ) ) ?>' value='<?= esc_attr( $cantidad ) ?>' >
			</p >
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update ( $new_instance, $old_instance )
		{
			$instance = array();
			$instance['cantidad'] = ( !empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';

			return $instance;
		}

	} // class Foo_Widget

