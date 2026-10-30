<?php

/**
 * Title: Contact Location
 * Slug: luxe-hair-salon/contact-map-001
 * Categories: content
 */
?>

<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|superbspacing-xlarge","bottom":"var:preset|spacing|superbspacing-xlarge","left":"var:preset|spacing|superbspacing-small","right":"var:preset|spacing|superbspacing-small"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--superbspacing-xlarge);padding-right:var(--wp--preset--spacing--superbspacing-small);padding-bottom:var(--wp--preset--spacing--superbspacing-xlarge);padding-left:var(--wp--preset--spacing--superbspacing-small)"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|superbspacing-medium","left":"var:preset|spacing|superbspacing-large"}}}} -->
  <div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
    <div class="wp-block-column" style="flex-basis:50%"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":"8px"}}} -->
      <figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url(get_stylesheet_directory_uri() . "/assets/images/salon-google-maps.jpg"); ?>" alt="<?php esc_attr_e('Luxe Hair Studio location', 'luxe-hair-salon'); ?>" style="border-radius:8px" /></figure>
      <!-- /wp:image -->
    </div>
    <!-- /wp:column -->

    <!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
    <div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:paragraph {"style":{"typography":{"fontSize":"14px","letterSpacing":"3px","textTransform":"uppercase"}},"textColor":"primary"} -->
      <p class="has-primary-color has-text-color" style="font-size:14px;letter-spacing:3px;text-transform:uppercase"><?php esc_html_e('Find Us', 'luxe-hair-salon'); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"style":{"spacing":{"margin":{"top":"16px","bottom":"24px"}}},"fontSize":"superbfont-xlarge"} -->
      <h2 class="wp-block-heading has-superbfont-xlarge-font-size" style="margin-top:16px;margin-bottom:24px"><?php esc_html_e('Visit Our', 'luxe-hair-salon'); ?> <em><?php esc_html_e('Studio', 'luxe-hair-salon'); ?></em></h2>
      <!-- /wp:heading -->

      <!-- wp:paragraph {"style":{"typography":{"fontSize":"16px"}},"textColor":"mono-2"} -->
      <p class="has-mono-2-color has-text-color" style="font-size:16px"><?php esc_html_e('Located in the heart of Beverly Hills, our elegant studio offers a serene escape from the everyday. Step through our doors and experience the Luxe difference.', 'luxe-hair-salon'); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:group {"style":{"spacing":{"margin":{"top":"32px"},"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
      <div class="wp-block-group" style="margin-top:32px"><!-- wp:group {"style":{"spacing":{"blockGap":"16px"},"border":{"left":{"color":"var:preset|color|primary","width":"3px"},"top":{},"right":{},"bottom":{}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:3px"><!-- wp:group {"style":{"spacing":{"padding":{"left":"20px"},"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
          <div class="wp-block-group" style="padding-left:20px"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"}}} -->
            <h4 class="wp-block-heading" style="font-size:18px;font-style:normal;font-weight:600"><?php esc_html_e('Address', 'luxe-hair-salon'); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"mono-2","fontSize":"superbfont-xsmall"} -->
            <p class="has-mono-2-color has-text-color has-superbfont-xsmall-font-size"><?php esc_html_e('123 Elegance Avenue, Suite 200', 'luxe-hair-salon'); ?><br><?php esc_html_e('Beverly Hills, CA 90210', 'luxe-hair-salon'); ?></p>
            <!-- /wp:paragraph -->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->

        <!-- wp:group {"style":{"spacing":{"blockGap":"16px"},"border":{"left":{"color":"var:preset|color|primary","width":"3px"},"top":{},"right":{},"bottom":{}}},"layout":{"type":"constrained"}} -->
        <div class="wp-block-group" style="border-left-color:var(--wp--preset--color--primary);border-left-width:3px"><!-- wp:group {"style":{"spacing":{"padding":{"left":"20px"},"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
          <div class="wp-block-group" style="padding-left:20px"><!-- wp:heading {"level":4,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"}}} -->
            <h4 class="wp-block-heading" style="font-size:18px;font-style:normal;font-weight:600"><?php esc_html_e('Parking', 'luxe-hair-salon'); ?></h4>
            <!-- /wp:heading -->

            <!-- wp:paragraph {"textColor":"mono-2","fontSize":"superbfont-xsmall"} -->
            <p class="has-mono-2-color has-text-color has-superbfont-xsmall-font-size"><?php esc_html_e('Complimentary valet parking available', 'luxe-hair-salon'); ?><br><?php esc_html_e('5 minutes from Rodeo Drive', 'luxe-hair-salon'); ?></p>
            <!-- /wp:paragraph -->
          </div>
          <!-- /wp:group -->
        </div>
        <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

      <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"32px"}}},"layout":{"type":"flex","justifyContent":"left"}} -->
      <div class="wp-block-buttons" style="margin-top:32px"><!-- wp:button {"style":{"typography":{"letterSpacing":"2px","textTransform":"uppercase"},"spacing":{"padding":{"top":"18px","bottom":"18px","left":"32px","right":"32px"}},"border":{"radius":"4px"}},"fontSize":"superbfont-xsmall"} -->
        <div class="wp-block-button"><a class="wp-block-button__link has-superbfont-xsmall-font-size has-custom-font-size wp-element-button" href="https://maps.google.com" style="border-radius:4px;padding-top:18px;padding-right:32px;padding-bottom:18px;padding-left:32px;letter-spacing:2px;text-transform:uppercase"><?php esc_html_e('Get Directions', 'luxe-hair-salon'); ?></a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:column -->
  </div>
  <!-- /wp:columns -->
</div>
<!-- /wp:group -->
