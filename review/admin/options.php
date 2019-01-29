<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

add_action( 'admin_init', 'vppfr_options' );

function vppfr_options() {

  add_settings_section(
    'vppfa_reviews_section',
    'VP+ Freelancehunt Reviews',
    'vppfr_section_description',
    'vpp-freelancehunt.php'
  );

}

function vppfr_section_description() {
  echo '<p>This settings section added from plugin - VP+ Freelancehunt Reviews</p>';
  echo '<p>In the next update there will be a lot of settings. If you like this plugin - I will be glad to reviews!</p>';
};
