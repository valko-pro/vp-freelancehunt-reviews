<?php
/**
 *
 * @wordpress-plugin
 * Plugin Name:       VP+ Freelancehunt Reviews
 * Plugin URI:        http://valko.pro/plugins/vpp-freelancehunt-reviews
 * Description:       This plugin displayed your reviews from freelancehunt.com
 * Version:           1.0
 * Author:            Oleg Valko
 * Author URI:        http://valko.pro/
 * License:           GPLv3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       vppfr
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; 

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );

if( is_plugin_active( 'vp-freelancehunt-api/vpp-freelancehunt-api.php' ) ){

  add_action( 'plugins_loaded', 'vppfr_load_plugin_textdomain' );

  function vppfr_load_plugin_textdomain() {
    load_plugin_textdomain( 'vppfr', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
  }

  // Require files
  require_once plugin_dir_path( __FILE__ ) . 'admin/shortcode.php';
  require_once plugin_dir_path( __FILE__ ) . 'admin/options.php';

} else {

  add_action( 'admin_notices', 'vppfr_deactivate_notice' );
  function vppfr_deactivate_notice() {
    $url = admin_url( 'plugin-install.php?s=VP%2B+Freelancehunt+API&tab=search' );
    ?>
    <div class="notice notice-error">
      <p><?php _e('This plugin work only with ', 'vppfr') ?><a href="<?php echo esc_url( $url ); ?>">VP+ Freelancehunt API</a></p>
    </div>
    <?php
  };

};

