<?php
/**
 * Widget Name: Bean Portfolio Menu
 */

// Register widget.
add_action(
	'widgets_init', function() {
		return register_widget( 'Bean_Portfolio_Menu_Widget' );
	}
);

class Bean_Portfolio_Menu_Widget extends WP_Widget {

	// Constructor
	function __construct() {
		parent::__construct(
			'bean_portfolio_menu', // Base ID
			__( 'Portfolio Menu', 'grille' ), // Name
			array( 'description' => esc_html__( 'A custom loop of portfolio posts.', 'grille' ) ) // Args
		);
	}

	// Display widget
	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters( 'widget_title', $instance['title'] );

		$desc      = $instance['desc'];
		$postcount = $instance['postcount'];
		$loop      = $instance['loop'];

		// Before widget
		echo $before_widget;

		if ( $title ) {
			echo balanceTags( $before_title ) . esc_html( $title ) . balanceTags( $after_title );
		}

		if ( $desc != '' ) {
			echo '<p>' . balanceTags( $desc ) . '</p>';
		} ?>

		<ul>

		<?php
		// Variable
		if ( $loop != '' ) {
			switch ( $loop ) {
				case 'Most Recent':
					$orderby  = 'date';
					$meta_key = '';
					break;
				case 'Random':
					$orderby  = 'rand';
					$meta_key = '';
					break;
				case 'Most Views':
					$orderby  = 'meta_value_num';
					$meta_key = 'post_views_count';
					break;
			}
		}

		$args = array(
			'post_type'      => 'portfolio',
			'order'          => 'DSC',
			'orderby'        => $orderby,
			'meta_key'       => $meta_key,
			'posts_per_page' => $postcount,
		);
		query_posts( $args );
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>

					<li>
				<a title="<?php printf( esc_html__( 'Permanent Link to %s', 'grille' ), get_the_title() ); ?>" href="<?php the_permalink(); ?>">
					<?php echo get_the_title(); ?>
					<?php if ( $loop == 'Most Views' ) { ?>
						<span class="subtext right"><?php echo grille_get_post_views( get_the_ID() ); ?><?php esc_html_e( ' Views', 'grille' ); ?></span>
					<?php } ?>
					<?php if ( $loop == 'Most Recent' ) { ?>
						<span class="right"><?php echo the_time( 'j M Y' ); ?></span>
					<?php } ?>
				</a>
				</li>

				<?php
			endwhile;
endif;
		wp_reset_query();
?>

		</ul>

		<?php
		// After widget
		echo $after_widget;
	}

	// Update widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		// Strip tags
		$instance['title']     = strip_tags( $new_instance['title'] );
		$instance['desc']      = stripslashes( $new_instance['desc'] );
		$instance['loop']      = $new_instance['loop'];
		$instance['postcount'] = $new_instance['postcount'];

		return $instance;
	}

	// Display widget
	function form( $instance ) {
		$defaults = array(
			'title'     => 'Projects',
			'desc'      => 'Display your portfolio posts by most recent, most popular or randomly.',
			'postcount' => '-1',
			'loop'      => 'Most Views',
		);

		$instance = wp_parse_args( (array) $instance, $defaults );
		?>

		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'grille' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p style="margin-top: -8px;">
		<textarea class="widefat" rows="5" cols="15" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo $instance['desc']; ?></textarea>
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php esc_html_e( 'Number of Posts: (-1 for Infinite)', 'grille' ); ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>

		<p>
		<label for="<?php echo $this->get_field_id( 'loop' ); ?>"><?php esc_html_e( 'Portfolio Loop:', 'grille' ); ?></label>
		<select id="<?php echo $this->get_field_id( 'loop' ); ?>" name="<?php echo $this->get_field_name( 'loop' ); ?>" class="widefat">
			<option
			<?php
			if ( 'Most Recent' == $instance['loop'] ) {
				echo 'selected="selected"';}
?>
>Most Recent</option>
			<option
			<?php
			if ( 'Most Views' == $instance['loop'] ) {
				echo 'selected="selected"';}
?>
>Most Views</option>
			<option
			<?php
			if ( 'Random' == $instance['loop'] ) {
				echo 'selected="selected"';}
?>
>Random</option>
		</select>
		</p>
	<?php
	} //END form
} //END class
