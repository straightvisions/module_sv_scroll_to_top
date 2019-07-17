<?php
	namespace sv100;
	
	/**
	 * @version         4.000
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_scroll_to_top extends init {
		public function init() {
			// Module Info
			$this->set_module_title( 'SV Scroll To Top' );
			$this->set_module_desc( __( 'This module gives the ability to manage & display a scroll to top button.', 'sv100' ) );
	
			// Section Info
			$this->set_section_title( __( 'Scroll To Top - Button', 'sv100' ) )
				 ->set_section_desc( __( 'Settings', 'sv100' ) )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) );
			
			$this->get_root()->add_section( $this );
	
			$this->load_settings()->register_scripts();
		}
	
		protected function load_settings(): sv_scroll_to_top {
			$this->s['activate'] =
				$this->get_setting()
					 ->set_ID( 'activate' )
					 ->set_title( __( 'Activate Scroll To Top Button', 'sv100' ) )
					 ->set_default_value( 0 )
					 ->load_type( 'checkbox' );
			
			$this->s['icon'] =
				$this->get_setting()
					->set_ID( 'icon' )
					->set_title( __( 'Icon Embed Code', 'sv100' ) )
					->set_description( __( 'Here you can post the SVG embed code.', 'sv100' ) )
					->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z"/></svg>' )
					->load_type( 'textarea' );
			
			$this->s['icon_color'] =
				$this->get_setting()
					 ->set_ID( 'icon_color' )
					 ->set_title( __( 'Icon Color', 'sv100' ) )
					 ->set_default_value( '#ffffff' )
					 ->load_type( 'color' );
			
			$this->get_settings_component( 'bg_color','background_color', '#1e1f22' );
	
			return $this;
		}
	
		protected function register_scripts(): sv_scroll_to_top {
			// Register Styles
			$this->scripts_queue['default'] =
				static::$scripts->create( $this )
								->set_ID( 'default' )
								->set_path( 'lib/frontend/css/default.css' );
	
			// Register Scripts
			$this->scripts_queue['default_js'] =
				static::$scripts->create( $this )
								->set_ID( 'default_js' )
								->set_path( 'lib/frontend/js/default.js' )
								->set_type( 'js' )
								->set_deps( array( 'jquery' ) );
			
			$this->scripts_queue['inline_config'] =
				static::$scripts->create( $this )
								->set_ID( 'inline_config' )
								->set_path( 'lib/frontend/css/config.php' )
								->set_inline( true );
	
			return $this;
		}
	
		public function load( $settings = array() ): string {
			$settings								= shortcode_atts(
				array(
					'inline'						=> false,
				),
				$settings,
				$this->get_module_name()
			);
			
			return $this->router( $settings );
		}
	
		protected function router( array $settings ): string {
			$output = '';
			
			if ( $this->get_setting( 'activate' )->run_type()->get_data() === '1' ) {
				ob_start();
				$this->scripts_queue['default']->set_inline( $settings['inline'] )->set_is_enqueued();
				$this->scripts_queue['default_js']->set_is_enqueued();
				$this->scripts_queue['inline_config']->set_is_enqueued();
				
				echo '<div class="' . $this->get_prefix() . '"><i></i></div>';
				
				$output	= ob_get_contents();
				ob_end_clean();
			}
	
			return $output;
		}
	}