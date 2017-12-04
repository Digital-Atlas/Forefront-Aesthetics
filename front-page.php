<?php
/**
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy

 *
 * @package _s
 */

get_header(); ?>

		<div id="primary" class="content-area">

			<main id="main" class="site-main" role="main">
	

			<section class="promotions row">

				<div class="brand inverse" style="background-image:url('<?php echo get_field('hero_image'); ?>');">
					
					<div class="overlay">
						<div class="brand-copy">
							<h1><?php echo get_field('hero_title'); ?></h1>
							<p><?php echo get_field('hero_summary'); ?></p>
						</div>
					</div>

				</div>

				<div id="block-promos">

				<script>
					jQuery(document).ready(function($) {
					  // Please note that autoHeight option has some conflicts with options like imageScaleMode, imageAlignCenter and autoScaleSlider
					  // it's recommended to disable them when using autoHeight module
					  $('.royalSlider').css('display', 'block');
					  $('#content-slider-1').royalSlider({
					  	 	arrowsNav: false,
							arrowsNavAutoHide: false,
						    fadeinLoadedSlide: false,
						    controlNavigationSpacing: 0,
						    controlNavigation: 'bullets',
						    autoScaleSliderHeight: 320,
						    imageAlignCenter:false,
						    loop: true,
						    numImagesToPreload: 6,
						    transitionType: 'move',
						    keyboardNavEnabled: true,		
						   	autoPlay: {
						    		// autoplay options go here
						    		enabled: true,
						    		pauseOnHover: true,
						    		delay: 3000
						    	}						    		    
					  });
					});
				</script>


					<div id="content-slider-1" class="royalSlider rsWithBullets">

						<?php

						// Date now
						$date_now =  date('Ymd');

						// Promotions repeater 
						if( have_rows('add_promotion') ):


						 	// loop through the rows of data
						    while ( have_rows('add_promotion') ) : the_row(); 							

							// Upload Image artwork
							if ( get_sub_field('promotion_block_1') == 'upload'): ?>
										
								<?php 
									$start_date = get_sub_field('start_date');
									$end_date  = get_sub_field('end_date');
								
								if (
									// Both end and start dates are not defined
									empty($start_date) == true && empty($end_date) == true
									||			
									// If has started but has no end date
									$start_date < $date_now	&& empty($end_date) == true
									||
									// If hasn't started yet and hasn't ended yet
									$start_date < $date_now && $end_date >= $date_now 
									||
									// If start date is empty and hasn't ended yet
									empty($start_date) == true && $end_date >= $date_now
									):
								?>

									<div class="slide upload-artwork" style="background-image: url('<?php echo get_sub_field('upload_artwork'); ?>')"></div>

								<?php
									endif;
								?>	


							<?php endif; ?>

						<?php if ( get_sub_field('promotion_block_1') == 'custom'): ?>
							<div class="slide custom-artwork inverse column medium-12">

									<div class="column small-7 medium-8">
										<h3><?php the_sub_field('promo_title');?></h3>
										<p><?php the_sub_field('promo_description');?></p>
										<?php if(get_sub_field('promo_expiry')): ?>
												<small>Expires <?php echo get_sub_field('promo_expiry'); ?></small>
										<?php endif; ?>										
									</div>

									<?php if(get_sub_field('promo_ribbon_copy')): ?>
										<div class="ribbon column medium-4 small-3">
											<h2><?php echo get_sub_field('promo_ribbon_copy'); ?></h2>
										</div>
									<?php endif; ?>



								</div>

						<?php endif; ?>

						<?php 

						endwhile; // end while have_rows loop

					endif; // End if have_rows conditional
					?>

					</div>

				</div>


			</section>



			<section class="our-team medium-12 columns">

			<h3>Our Team</h3>

				<div class="members-wrapper">

				<?php
				// check if the repeater field has rows of data
				if( have_rows('our_team') ):

					$i = 1;

				 	// loop through the rows of data
				    while ( have_rows('our_team') ) : the_row(); ?>

						<div class="member column" id="member-<?php echo $i; ?>">
							<div class="overlay" style="background-image:url('<?php the_sub_field("bio_image"); ?>');">
						        <a href="#"  data-member="<?php echo $i; ?>" data-protitle="<strong><?php the_sub_field('professional_title'); ?></strong>" data-bio="<?php the_sub_field('biography'); ?>"></a>
							</div>
							<h5><?php the_sub_field('provider_name'); ?></h5>
					    </div>

				    <?php 
				    $i++;
				    endwhile;
				endif;
				?>
				</div>

				<div id="our-team-target" class="animated fadeInDown"></div>


			</section>

			<section class="products-services inverse medium-12 columns">
				<h3><?php the_field('products_services_header'); ?></h3>

				<div class="summary">
					<?php the_field('products_services_summary'); ?>
				</div>
			</section>


			


			<section class="services-listing">

				<div id="target"></div>

				<?php

				// @ See Ajax handlers in /lib/functions/ajax.php and /assets/scripts/ajax.js

				if( have_rows('services') ):

					$index = 1; // Index service items
					$row = 1; // Index number of rows

				 	// loop through the rows of data
				    while ( have_rows('services') ) : the_row(); 

				    	if ($index == 1 || $index == 4 || $index == 8): 
				    		echo '<div class="row" id="row-' . $row . '">';
				    	endif;
					?>

					<div class="service" id="item-<?php echo $index; ?>">
						<div class="overlay" style="background-image:url('<?php the_sub_field("services_background_image"); ?>');">
							<a href="#" class="load-category-posts" data-item="<?php echo $index; ?>" data-row="<?php echo $row;?>" data-cat="<?php the_sub_field('category_id');?>">
								<strong><?php the_sub_field('services_header'); ?></strong>
								<img src="<?php echo get_template_directory_uri();?>/assets/images/arrow-down.svg" alt="Arrow Down" />				
							</a>
						</div>							
					</div>

				    <?php 
				    	if ($index == 3 || $index == 7 || $index == 10): 
				    		echo '</div>'; // end .row
				    		echo '<div class="ajax-target" id="target-' . $row . '"></div>'; // ajax target
				    		$row++;
				    	endif;

				   		$index++;
				    endwhile;

				endif;
				?>

			</section>


			<section class="great-brands">

			<h3>Great Brands We Work With</h3>

				<div class="brands-wrapper">
				<?php
					if( have_rows('brand_logos') ):
					    while ( have_rows('brand_logos') ) : the_row(); 
						?>
							<div class="partner">
						        <img src="<?php the_sub_field('logo_image'); ?>" alt="Great Brands"/>
						    </div>
					    <?php 
					    endwhile;

					endif;
					?>
				</div>

			</section>



			<section class="newsletter inverse medium-12 columns">

				<div class="newsletter-wrapper">

					<div id="newsletter-copy">
						<h3>Join Our Newsletter</h3>
						<p>Get the latest Forefront Aesthetics updates on services, promotions, and events.</p>
					</div>

					<div class="form" id="newsletter-form">

					<?php gravity_form(1,false,false,false,'',true); ?>



					</div>

				</div>


			</section>



			</main>

		</div>



<?php
get_footer();
