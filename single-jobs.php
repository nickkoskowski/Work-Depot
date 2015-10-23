	<?php get_header(); ?>
	<?php get_template_part('helpers/map', 'include'); ?>
	<div id="job" class="container">
		<div class="row">
			<?php while ( have_posts() ) : the_post(); ?>
			<div class="col-md-7">
				<div class="row">
					<div class="col-md-12">
						<h1><?php the_title(); ?></h1>
					</div>
					<div class="col-md-4">
						<p>Offered by: <?php the_author(); ?></p>
					</div>
					<div class="col-md-5">
						<p><?php echo 'Starts: '.get_job_start() .' | Ends: '. get_job_end(); ?></p>
					</div>
					<div class="col-md-3">
						<p><?php echo get_job_price(); ?></p>
					</div>
					<div class="col-md-12">
						<p><?php the_content(); ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Skills Required:</h2>
					</div>
					<?php foreach(get_job_specializations() as $specialization => $value) {
						if ($value == 1) {
							echo '<div class="col-md-4">';
							echo '<label>'.$specialization.'</label>';
							echo '</div>';
						}
					} ?>
				</div>
				<div class="row text-center">
					<div class="col-md-12">
						<?php if (check_specializations() == true) {
							echo '<button>Apply for this Job</button>';
						}
						else {
							echo '<p style="margin-top:25px;">Your profile is missing one or more skills required for this job.</p>';
						} ?>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="acf-map">
					<?php
					$location = get_field('job_location');
					$gtemp = explode (',',  implode($location));
					$coord = explode (',', implode($gtemp));
					$lat = (float) $coord[0];
					$lng = (float) $coord[1];
					?>
					<div class="marker" data-lat="<?php echo $location[lat]; ?>" data-lng="<?php echo $location[lng]; ?>">
						<p class="address"><?php  echo $gtemp[0]; ?><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>		
					</div>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>