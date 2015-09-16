	<?php get_header(); ?>
	<div class="container">
		<div class="row">
			<div class="col-md-5">
				<?php get_template_part('parts/login', 'form'); ?>
			</div>
			<div class="col-md-7">
				<div id="map"></div>
				<h2>There are [JobCount]'s in your area. <small>(not your area?)</small></h2>
			</div>
		</div>
	</div>
	<?php get_footer(); ?>