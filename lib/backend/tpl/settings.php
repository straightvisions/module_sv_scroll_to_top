<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
		
		<h3 class="divider"><?php _e( 'General', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'activate' )->run_type()->form();
				echo $module->get_setting( 'bg_color' )->run_type()->form();
				echo $module->get_setting( 'bg_color_hover' )->run_type()->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'icon' )->run_type()->form();
				echo $module->get_setting( 'icon_color' )->run_type()->form();
				echo $module->get_setting( 'icon_color_hover' )->run_type()->form();
			?>
		</div>
		<?php
	}