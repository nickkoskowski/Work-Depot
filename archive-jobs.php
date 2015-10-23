	<?php get_header(); ?>
	<?php get_template_part('helpers/map', 'include'); ?>
	<div class="container">
		<?php $current_user = wp_get_current_user(); ?>
		<?php if ($current_user->ID != 0) { ?>
		<div class="row">
			<?php 
			$mapposts = new WP_Query( array( 
				'post_status' => 'publish', 
				'post_type' => 'jobs' 
				) );
				?>
				<div class="col-md-5">
					<?php while ( $mapposts->have_posts() ) : $mapposts->the_post(); ?>
					<div class="row job">
						<div class="col-md-8">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
						<div class="col-md-4">
							<h3><?php echo get_job_price(); ?></h3>
						</div>
						<div class="col-md-6">
							<p>Posted by: <?php the_author(); ?></p>
						</div>
						<div class="col-md-6">
							<p><?php 
							$location = get_field('job_location'); 
							$gtemp = explode (',',  implode($location));
							echo $gtemp[0];
							?></p>
						</div>
						<div class="col-md-12">
							<p><?php echo 'Starts: '.get_job_start() .' | Ends: '. get_job_end(); ?></p>
						</div>
						<div class="col-md-12">
							<p><?php the_excerpt(); ?></p>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="col-md-7">
				<div class="acf-map">

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

			</div><!-- .acf-map -->

			<?php wp_reset_query();  // Restore global post data stomped by the_post(). ?>
			<h2>There are <?php echo get_total_jobcount(); ?> jobs on work depot. <small>(not your area?)</small></h2>
		</div>
	</div>
	<?php } else {
		echo '<p>You must be logged in to view this page.</p>';
	} ?>
</div>
<?php get_footer(); ?>