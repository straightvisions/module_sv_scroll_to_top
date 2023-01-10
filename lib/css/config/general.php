<?php
	$properties					                                 = array();
	$properties[$module->get_setting('position')->get_data()]	 = '5%';

	$active = array_map(function ($val) {
		if($val === '1'){
			return 'block';
		}

		return 'none';
	}, $module->get_setting('activate')->get_data());

	$properties['display']	= $active;

	echo $_s->build_css(
		'#sv100_companion_sv_scroll_to_top',
		array_merge(
			$properties,
			$module->get_setting('bg_color')->get_css_data('background-color'),
			$module->get_setting('icon_size')->get_css_data('width', '', 'px'),
			$module->get_setting('icon_size')->get_css_data('height', '', 'px')
		)
	);

	echo $_s->build_css(
		'#sv100_companion_sv_scroll_to_top:hover, #sv100_companion_sv_scroll_to_top:focus',
		array_merge(
			$module->get_setting('bg_color_hover')->get_css_data('background-color'),
			$module->get_setting('icon_size_hover')->get_css_data('width', '', 'px'),
			$module->get_setting('icon_size_hover')->get_css_data('height', '', 'px')
		)
	);

	$properties						= array();
	$icon = array_map(function ($val) {
		if(strlen($val) > 0){
			return 'url(\'data:image/svg+xml;utf8;base64,'.base64_encode($val).'\')';
		}
		return '';
	}, $module->get_setting('icon')->get_data());

	$properties['-webkit-mask-image']	= $icon;

	echo $_s->build_css(
		'#sv100_companion_sv_scroll_to_top > i',
		array_merge(
			$properties,
			$module->get_setting('icon_color')->get_css_data('background-color')
		)
	);

	echo $_s->build_css(
		'#sv100_companion_sv_scroll_to_top:hover > i, #sv100_companion_sv_scroll_to_top:focus > i ',
		array_merge(
			$module->get_setting('icon_color_hover')->get_css_data('background-color')
		)
	);