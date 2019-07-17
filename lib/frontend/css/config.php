<?php
	$icon		= $script->get_parent()->get_setting( 'icon' )->run_type()->get_data();
	$icon_color	= $script->get_parent()->get_setting( 'icon_color' )->run_type()->get_data();
	$bg_color	= $script->get_parent()->get_setting( 'bg_color' )->run_type()->get_data();
?>

.sv100_sv_scroll_to_top {
	background-color: <?php echo $bg_color; ?>;
}

.sv100_sv_scroll_to_top > i {
	background-color: <?php echo $icon_color;  ?>;
	-webkit-mask-image: url( 'data:image/svg+xml;utf8, <?php echo $icon; ?> ');
}
