<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->run_type()->get_data();

		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}
?>

.sv100_sv_scroll_to_top {
	background-color: rgba(<?php echo $bg_color; ?>);
}

.sv100_sv_scroll_to_top > i {
	background-color: rgba(<?php echo $icon_color;  ?>);
	-webkit-mask-image: url( 'data:image/svg+xml;utf8, <?php echo $icon; ?> ');
}
