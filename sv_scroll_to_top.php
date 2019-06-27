<?php
namespace sv_100;

/**
 * @version         1.00
 * @author			straightvisions GmbH
 * @package			sv_100
 * @copyright		2019 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_scroll_to_top extends init {
	public function init() {
		// Module Info
		$this->set_module_title( 'SV Scroll To Top' );
		$this->set_module_desc( __( 'This module gives the ability to manage & display a scroll to top button.', 'straightvisions-100' ) );

		// Section Info
		$this->set_section_title( __( 'Scroll To Top - Button', 'straightvisions-100' ) );
		$this->set_section_desc( __( 'Settings', 'straightvisions-100' ) );
		$this->set_section_type( 'settings' );
		$this->get_root()->add_section( $this );

		$this->load_settings()->register_scripts();
	}

	protected function load_settings(): sv_scroll_to_top {
		$this->s['active'] =
			$this->get_setting()
				 ->set_ID( 'active' )
				 ->set_title( __( 'Active', 'straightvisions-100' ) )
				 ->set_description( __( 'Activate or deactivate the scroll to top button.', 'straightvisions-100' ) )
				 ->load_type( 'checkbox' );
		
		$this->s['icon'] =
			$this->get_setting()
				->set_ID( 'icon' )
				->set_title( __( 'Icon Embed Code', 'straightvisions-100' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'straightvisions-100' ) )
				->load_type( 'textarea' );

		return $this;
	}

	protected function register_scripts(): sv_scroll_to_top {
		// Register Styles
		$this->scripts_queue['default']   = static::$scripts
			->create( $this )
			->set_ID( 'default' )
			->set_path( 'lib/frontend/css/default.css' );

		// Register Scripts
		$this->scripts_queue['default_js'] = static::$scripts
			->create( $this )
			->set_ID( 'default_js' )
			->set_path( 'lib/frontend/js/default.js' )
			->set_type( 'js' )
			->set_deps( array( 'jquery' ) );

		return $this;
	}

	public function load( $settings = array() ): string {
		$settings								= shortcode_atts(
			array(
				'inline'						=> false,
				'icon'                          => false,
			),
			$settings,
			$this->get_module_name()
		);

		return $this->router( $settings );
	}

	protected function router( array $settings ): string {
		$output = '';
		
		if ( $this->get_setting( 'active' )->run_type()->get_data() === '1' ) {
			ob_start();
			$this->scripts_queue['default']->set_inline( $settings['inline'] )->set_is_enqueued();
			$this->scripts_queue['default_js']->set_is_enqueued();
			
			if ( ! $settings['icon'] && strlen( $this->get_setting( 'icon' )->run_type()->get_data() ) > 0 ) {
				$settings['icon']   = $this->get_setting( 'icon' )->run_type()->get_data();
			}
			
			echo '<style data-sv_100_module="'. $this->get_prefix() . '">';
			echo ':root {' . "\n";
			echo '--sv_scroll_to_top-icon' . ":  url('data:image/svg+xml;utf8," . $settings['icon'] . "');\n";
			echo '}</style>';
			
			echo '<div class="' . $this->get_prefix() . '"><i></i></div>';
			
			$output	= ob_get_contents();
			ob_end_clean();
		}

		return $output;
	}
}