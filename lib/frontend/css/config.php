<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->get_data();

		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}
?>

.sv100_companion_sv_scroll_to_top {
	background-color: rgba(<?php echo $bg_color; ?>);
	<?php echo $position; ?>: 5%;
}

.sv100_companion_sv_scroll_to_top:hover,
.sv100_companion_sv_scroll_to_top:focus {
	background-color: rgba(<?php echo $bg_color_hover; ?>);
}


.sv100_companion_sv_scroll_to_top > i {
	background-color: rgba(<?php echo $icon_color;  ?>);
	-webkit-mask-image: url( 'data:image/svg+xml;utf8, <?php echo $icon; ?> ');
}

.sv100_companion_sv_scroll_to_top:hover > i,
.sv100_companion_sv_scroll_to_top:focus > i {
	background-color: rgba(<?php echo $icon_color_hover;  ?>);
	-webkit-mask-image: url( 'data:image/svg+xml;utf8, <?php echo $icon; ?> ');
}

.sv100_companion_sv_scroll_to_top > i {
	-webkit-mask-size: <?php echo $icon_size; ?>%;
}

.sv100_companion_sv_scroll_to_top:hover > i,
.sv100_companion_sv_scroll_to_top:focus > i {
	-webkit-mask-size: <?php echo $icon_size_hover; ?>%;
}
