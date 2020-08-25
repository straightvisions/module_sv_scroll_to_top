<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
		
		<h3 class="divider"><?php _e( 'Icon & Sizes', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'activate' )->form();
				echo $module->get_setting( 'position' )->form();
				echo $module->get_setting( 'icon' )->form();
				echo $module->get_setting( 'icon_size' )->form();
				echo $module->get_setting( 'icon_size_hover' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'icon_color' )->form();
				echo $module->get_setting( 'icon_color_hover' )->form();
				echo $module->get_setting( 'bg_color' )->form();
				echo $module->get_setting( 'bg_color_hover' )->form();
			?>
		</div>
		<?php
	}