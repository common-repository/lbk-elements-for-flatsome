<?php
/**
 * LBK Elements for Flatsome
 * 
 * @package LBK Elements for Flatsome
 * @author Dương Quang Phong
 * @copyright 2021 LBK
 * @license GPL-2.0-or-later
 * @category plugin
 * @version 1.1.2
 * 
 * @wordpress-plugin
 * Plugin Name:       LBK Elements for Flatsome
 * Plugin URI:        https://lbk.vn/
 * Description:       This plugin will create new elements for flatsome
 * Version:           1.1.2
 * Requires at least: 1.0.0
 * Requires PHP:      7.4
 * Author:            LBK
 * Author URI:        https://www.facebook.com/profile.php?id=100008413214141
 * Text Domain:       lbk-elements
 * License:           GPLv2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain path:       /languages/
 * 
 * LBK Elements for Flatsome is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *  
 * LBK Elements for Flatsome is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *  
 * You should have received a copy of the GNU General Public License
 * along with LBK Elements for Flatsome. If not, see <http://www.gnu.org/licenses/>.
*/

// Die if accessed directly
if ( !defined('ABSPATH') ) die( 'What are you doing here? You silly human!' );

if ( !class_exists('LBK_Elements') ) {
    /**
     * class LBK_Elements
     */
    final class LBK_Elements {
        /**
         * Current version
         * 
         * @since 1.0
         * @var string
         */
        const VERSION = '1.1.2';

        /**
         * Stores the instance of this class
         * 
         * @access private
         * @since 1.0
         * @static
         * 
         * @var LBK_Elements
         */
        private static $instance;

        /**
         * A dummny contructor to prevent the class from being loaded more than once
         * 
         * @access public
         * @since 1.0
         */
        public function __construct() { 
            /** Do nothing here */
        }

        /**
         * @access private
         * @since 1.0
         * @static
         * 
         * @return LBK_Elements
         */
        public static function instance() {
            if ( !isset( self::$instance ) && !( self::$instance instanceof LBK_Elements ) ) {
                self::$instance = new LBK_Elements();

                self::defineConstants();
                self::includes();
                self::hooks();

                // self::loadTextdomain();
            }

            return self::$instance;
        }

        /**
         * Define the plugin constants.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        private static function defineConstants() {
            define( 'LBK_ELEMENTS_DIR_NAME', plugin_basename( dirname( __FILE__ ) ) );
            define( 'LBK_ELEMENTS_BASE_NAME', plugin_basename( __FILE__ ) );
            define( 'LBK_ELEMENTS_PATH', plugin_dir_path( __FILE__ ) );
            define( 'LBK_ELEMENTS_URL', plugin_dir_url( __FILE__ ) );
        }

        /**
         * Includes the plugin dependency files.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        private static function includes() {
            if ( is_admin() ) {
                require_once( LBK_ELEMENTS_PATH . 'includes/class.admin.php' );
            }
            require_once( LBK_ELEMENTS_PATH . 'includes/add-templates.php' );
            
        }

        /**
         * Add the core action filter hook.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        private static function hooks() {
			// wp_enqueue_style('lbk-elements-style', LBK_ELEMENTS_URL . '/assets/lbk-elements-style.css', array());	
        }

        /**
         * Call back for the `wp_enqueue_scripts` action.
         * 
         * Register add enqueue CSS and javascript files for frontend
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public static function enqueueScripts() {
            // If SCRIPT_DEBUG is set and TRUE load the non-minifed JS files, otherwise, load the minifed files.
            // $min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
        }

        /**
         * Prints out inline CSS after the core CSS file to allow overriding core styles via options.
         * 
         * @access private
         * @since 1.0
         * @static
         */
        public static function inlineCSS() {

        }

        /**
         * Add script Elements.
         * 
         * @access private
         * @since 1.0
         * @static
         */
    } // end class
    
    /**
     * The main function reponsible for returning the LBK Fixed Contact instance to function everywhere.
     * 
     * Use this function like you would a global variable, except without needing to declare the global.
     * 
     * Example: <?php $instance = LBK_Elements(); ?>
     * 
     * @access public
     * @since 1.0
     * 
     * @return LBK_Elements
     */
    function LBK_Elements() {
        return LBK_Elements::instance();
    }

    // Start LBK Fixed Contact
    add_action( 'plugins_loaded', 'LBK_Elements' );
}