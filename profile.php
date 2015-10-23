<?php /* Template Name: My Profile */
get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<?php $current_user = wp_get_current_user(); ?>
			<img src="<?php echo get_profile_image(); ?>">
			<h3><?php echo $current_user->user_firstname.' '.$current_user->user_lastname; ?></h3>
			<p><i><?php echo get_user_role(); ?></i></p>
			<p><?php echo get_profile_description(); ?></p>
		</div>
		<div class="col-md-8">
			<?php if ($current_user->ID != 0) { ?>
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
						<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
						<td><?php the_date(); ?></td>
						<td>Bricklaying, Woodworking, Tile</td>
						<td>$22.45</td>
					</tr>
				<?php endwhile; endif; ?>
			</tbody>
		</table>
		<h3>My Skills</h3>
		<table>
			<tbody>
				<tr>
					<td>
						<input type="checkbox">
						<label>Drywall</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Framing</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Plumbing</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Tile</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox">
						<label>Flooring</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Cabinetry</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Electrical</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Carpentry</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox">
						<label>Roofing</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Siding</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Stucco</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Masonry</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox">
						<label>Iron Work</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Landscaping</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Drafting</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Architecture</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox">
						<label>Concrete</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Insulation</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Excavation</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Windows &amp; Doors</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox">
						<label>Pools</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Lighting</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Scaffolding</label>
					</td>
					<td>
						<input type="checkbox">
						<label>Demolition</label>
					</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox">
						<label>General Maintinence</label>
					</td>
				</tr>
			</tbody>
		</table>
		<?php }
		else {
			echo '<p>You must be logged in to view this page.</p>';
		} ?>
	</div>
</div>
</div>
<?php get_footer(); ?>