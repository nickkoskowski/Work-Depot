<?php
global $mango_layout_columns, $theme_settings;


if($mango_layout_columns=='left' || $mango_layout_columns=='both'){
    get_sidebar('left');
} ?>
<?php if($mango_layout_columns=='right' || $mango_layout_columns=='both'){
    get_sidebar('right');
} ?>