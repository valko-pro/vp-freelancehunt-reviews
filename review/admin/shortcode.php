<?php
if ( ! defined( 'ABSPATH' ) ) exit; 

add_action('wp_enqueue_scripts', 'vppfr_enqueue_scripts');

function vppfr_enqueue_scripts() {
  wp_enqueue_style( 'vppfr_style', plugins_url('vpp-freelancehunt-reviews/assets/css/style.css'));
  wp_enqueue_script( 'vppfr_js', plugins_url('vpp-freelancehunt-reviews/assets/js/scripts.js'), '', '', true );
};

add_shortcode('freelancehunt_reviews', 'vppfr_shortcode');

function vppfr_shortcode() {
  $reviews = VPPFHAPI;
  ob_start();
    ?>
    <div class="vppfr_reviews">
      <div class="vppfr_reviews_wrapper">
        <?php foreach ($reviews['reviews'] as $review) { ?>
        <div class="vppfr_review">
          <div class="vppfr_text">
            <?php echo $review['review_comment'] ?>
          </div>
          <div class="vppfr_customer">
            <img src="<?php echo $review['from']['avatar'] ?>" alt="" class="vppfr_customer_photo">
            <div class="vppfr_customer_name">
              <span class="vppfr_fname"><?php echo $review['from']['fname'] ?></span>
              <span class="vppfr_sname"><?php echo $review['from']['sname'] ?></span>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="vppfr_navigation">
        <button class="controls" id="previous"><?php _e('Previous', 'vppfr'); ?></button>
        <button class="controls" id="pause"><?php _e('Pause', 'vppfr'); ?></button>
        <button class="controls" id="next"><?php _e('Next', 'vppfr'); ?></button>
      </div>
    </div>
    <?php 
    return ob_get_clean();
    }; ?>