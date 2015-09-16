<?php /* Template Name: My Profile */
get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php $current_user = wp_get_current_user(); ?>
			<h3><?php echo $current_user->user_firstname.' '.$current_user->user_lastname; ?></h3>
			<p><?php echo get_the_author_meta( 'description', $current_user->ID ); ?></p>
		</div>
		<div class="col-md-8">
			<h3>My Jobs</h3>
			<table class="job-table">
				<thead>
					<th>Job Title</th>
					<th>Job Date</th>
					<th>Skills</th>
					<th>Hourly Rate</th>
				</thead>
				<tbody>
					<?php 
					query_posts(array( 'post_type' => array('Jobs'), 'order'   => 'DESC', 'author' => $current_user->ID  ) );
					if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					?>
					<tr>
						<td><?php the_title(); ?></td>
						<td><?php the_date(); ?></td>
						<td>Bricklaying, Woodworking, Tile</td>
						<td>$22.45</td>
					</tr>
				<?php endwhile; endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php get_footer(); ?>