<?php

// Exit if accessed directly
if ( !defined ( 'ABSPATH' ) ) exit;

if ( !class_exists( 'LBK_Elements_Admin' ) ) {
    /**
     * Class LBK_Elements
     */
    final class LBK_Elements_Admin {
        /**
         * Setup plugin for admin use
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function __construct() {
            $this->hooks();
        }

        /**
         * Add the core admin hooks.
         * 
         * @access private
         * @since 1.0
         * @static
         */
   		private function hooks() {
            add_action( 'admin_menu', array( $this, 'menu' ) );
            add_action( 'admin_init', array( $this, 'register_lbk_elements_settings') );
            add_action( 'admin_init', array( $this, 'add_elements_template') );
        }

        /**
         * Register settings.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function register_lbk_elements_settings() { 
            // Register all settings for general settings page 
            register_setting( 'lbk_elements_settings', 'add_lbk_progess_line'); 
            register_setting( 'lbk_elements_settings', 'add_lbk_inline_post'); 
			register_setting( 'lbk_elements_settings', 'add_lbk_slider_with_sub_imgs'); 
            register_setting( 'lbk_elements_settings', 'add_lbk_submenu_in_title'); 

        }

        /**
         * Callback to add the settings link to the plugin action links.
         * 
         * @access private
         * @since 1.0
         * @static
         * 
         * @param $links
         * @param $file
         * 
         * @return array
         */
        public function pluginActionLinks( $links, $file ) {}
        
        /**
         * Register the scripts used in the admin
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function registerScripts() {}

        /**
         * Callback to add plugin as a menu page of the Options page.
         * 
         * This also adds the action to enqueue the scripts to be loaded on plugin's admin page only.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function menu() {
			add_menu_page( 'LBK Elements', 'LBK Elements', 'manage_options', 'lbk-elements', array( $this, 'page' ), '', '2');			
        }
         /**
         * 
         * Add and use templates
         * @access private
         * @since 1.0
         * @static
         */
        public function add_elements_template() {
			if(get_option('add_lbk_inline_post')) require_once LBK_ELEMENTS_PATH .'/includes/templates/lbk_inline_posts.php';
        }

        /**
         * Enqueue the scripts.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function enqueueScripts() {
            // wp_enqueue_script( 'lbk_fc_admin_script' );
            // wp_enqueue_style( 'lbk_fc_admin_style' );
        }

        /**
         * Callback used to render the admin options page.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public function page() {
            include LBK_ELEMENTS_PATH . 'includes/inc.admin-options-page.php';
        }
    }
    new LBK_Elements_Admin();
}