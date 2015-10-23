<!DOCTYPE html>
<html>
<head>
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
    <link href='https://fonts.googleapis.com/css?family=Fjalla+One|Average' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-md-4">
                    <h1><a href="<?php echo get_site_url(); ?>"><span>Work</span> Depot</a></h1>
                </div>
                <div class="col-xs-6 col-md-8 text-right">
                    <nav>
                        <?php wp_nav_menu( array( 'theme_location' => 'right-header-menu' ) ); ?>
                    </nav>
                    <nav id="resp-menu">
                        <ul>
                            <li>
                                <i class="fa fa-bars"></i>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main>