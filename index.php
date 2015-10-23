	<?php get_header(); ?>
	<?php get_template_part('helpers/map', 'include'); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<?php get_template_part('parts/login', 'form'); ?>
			</div>
			<div class="col-md-7">
				<div class="acf-map">
					<?php 
					$mapposts = new WP_Query( array( 
						'post_status' => 'publish', 
						'post_type' => 'jobs' 
						) );
						?>
						<?php while ( $mapposts->have_posts() ) : $mapposts->the_post(); ?>
						<?php
						$location = get_field('job_location');
						$gtemp = explode (',',  implode($location));
						$coord = explode (',', implode($gtemp));
						$lat = (float) $coord[0];
						$lng = (float) $coord[1];
						?>
						<div class="marker" data-lat="<?php echo $location[lat]; ?>" data-lng="<?php echo $location[lng]; ?>">
							<p class="address"><?php echo $gtemp[0]; ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"> <?php the_title(); ?></a></p>		
						</div>
					<?php endwhile; ?>
				</div>
				<h2>There are <?php echo get_total_jobcount(); ?> job's on Work Depot. <small>(not your area?)</small></h2>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>