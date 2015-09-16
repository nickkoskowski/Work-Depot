<!DOCTYPE html>
<html>
<head>
	<title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>
<body>
	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<h1>Work Depot</h1>
				</div>
				<div class="col-md-8 text-right">
					<nav>
						<?php wp_nav_menu( array( 'theme_location' => 'right-header-menu' ) ); ?>
					</nav>
				</div>
			</div>
		</div>
	</header>