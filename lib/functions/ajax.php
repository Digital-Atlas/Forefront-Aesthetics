<?php 
/** 
* Ajax Init and Queries
**/


add_action( 'wp_enqueue_scripts', 'fa_enqueue_scripts' );

function fa_enqueue_scripts() {


	
	wp_enqueue_script( 'royalslider', THEME_JS . '/concat/jquery.royalslider.custom.min.js', array('jquery'), '1.0', false );
	wp_enqueue_script( 'category_loader', THEME_JS . '/ajax.js', array('jquery'), '1.0', true );
}

add_action('wp_ajax_nopriv_fa_category_posts', 'fa_category_posts');
add_action('wp_ajax_fa_category_posts', 'fa_category_posts');
 
function fa_category_posts() {
 
	if ( isset($_POST['cat']) && $_POST['cat'] !== 0):
		$cat = $_POST['cat'];
	endif;

	$args = array (
		'post_type' => 'service',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'service_category',
				'field'    => 'term_id',
				'terms'    =>  array($cat),
			),
		),					
	);


	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post(); ?>
			
			<div class="treatment-info animated fadeInDown">
				<h4><?php the_title(); ?></h4>
				<p><?php the_content(); ?></p>
				<small><?php the_field('availability'); ?></small>
			</div>


		<?php }
		wp_reset_postdata();
		wp_die();
	} 
}
