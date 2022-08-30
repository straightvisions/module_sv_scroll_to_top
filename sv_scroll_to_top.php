<?php
	namespace sv100_companion;

	class sv_scroll_to_top extends modules {
		public function init() {
			$this->set_section_title( __( 'Scroll To Top', 'sv100_companion' ) )
				 ->set_section_desc( __( 'Settings', 'sv100_companion' ) )
				 ->set_section_template_path( $this->get_path( 'lib/tpl/settings/init.php' ) )
				 ->load_settings()
			 	 ->register_scripts()
				 ->get_root()->add_section( $this );

			// Loads SV Scroll To Top
			if ( $this->get_setting( 'activate' )->get_data() === '1' ) {
				add_action( 'wp_footer', array($this, 'load') , 1);
			}
		}
	
		protected function load_settings(): sv_scroll_to_top {
			$this->get_setting( 'activate' )
				 ->set_title( __( 'Activate Scroll To Top Button', 'sv100_companion' ) )
				 ->load_type( 'checkbox' );

			$this->get_setting( 'position' )
				->set_title( __( 'Position', 'sv100_companion' ) )
				->set_default_value( 'right' )
				->set_options(array(
					'left'		=> 'left',
					'right'		=> 'right'
				))
				->load_type( 'select' );

			$this->get_setting( 'icon' )
				 ->set_title( __( 'Icon embed code', 'sv100_companion' ) )
				 ->set_description( __( 'Here you can post the SVG embed code.', 'sv100_companion' ) )
				 ->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 16.67l2.829 2.83 9.175-9.339 9.167 9.339 2.829-2.83-11.996-12.17z"/></svg>' )
				 ->set_is_responsive(true)
				 ->load_type( 'textarea' );

			$this->get_setting( 'bg_color' )
				->set_title( __( 'Background color', 'sv100_companion' ) )
				->set_default_value( '#000000' )
				->set_is_responsive(true)
				->load_type( 'color' );
			
			$this->get_setting( 'bg_color_hover' )
				 ->set_title( __( 'Background color (Hover/Focus)', 'sv100_companion' ) )
				 ->set_default_value( '#000000' )
				 ->set_is_responsive(true)
				 ->load_type( 'color' );
			
			$this->get_setting( 'icon_size' )
				 ->set_title( __( 'Icon size', 'sv100_companion' ) )
				 ->set_description( __( 'Size in %.' ) )
				 ->set_default_value( '100' )
				 ->set_min( 0 )
				 ->set_max( 100 )
				 ->set_is_responsive(true)
				 ->load_type( 'number' );
			
			$this->get_setting( 'icon_size_hover' )
				 ->set_title( __( 'Icon size (Hover/Focus)', 'sv100_companion' ) )
				 ->set_description( __( 'Size in %.' ) )
				 ->set_default_value( '100' )
				 ->set_min( 0 )
				 ->set_max( 100 )
				 ->set_is_responsive(true)
				 ->load_type( 'number' );
			
			$this->get_setting( 'icon_color' )
				 ->set_title( __( 'Icon color', 'sv100_companion' ) )
				 ->set_default_value( '#ffffff' )
				 ->set_is_responsive(true)
				 ->load_type( 'color' );
			
			$this->get_setting( 'icon_color_hover' )
				 ->set_title( __( 'Icon color (Hover/Focus)', 'sv100_companion' ) )
				 ->set_default_value( '#ffffff' )
				 ->set_is_responsive(true)
				 ->load_type( 'color' );
	
			return $this;
		}
	
		protected function register_scripts(): sv_scroll_to_top {
			// Register Styles
			$this->get_script( 'common' )
				 ->set_path( 'lib/css/common/common.css' );
	
			// Register Scripts
			$this->get_script( 'default_js' )
				 ->set_path( 'lib/js/frontend/default.js' )
				 ->set_type( 'js' );

			$this->get_script( 'config' )
			     ->set_path( 'lib/css/config/init.php' )
			     ->set_inline( true );
	
			return $this;
		}
		public function enqueue_scripts(): sv_scroll_to_top {
			foreach($this->get_scripts() as $script){
				$script->set_is_enqueued();
			}

			return $this;
		}
		public function load() {
			$this->enqueue_scripts();
			echo '<div id="' . $this->get_prefix() . '"><i></i></div>';
		}
	}