<?php

/**
 * Title: header-001
 * Slug: elara-nails-and-beauty/header-001
 * Categories: header
 */
?>


<!-- wp:cover {"url":"<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/salon-header-image.jpg'); ?>","id":4576,"dimRatio":60,"overlayColor":"black","isUserOverlayColor":true,"minHeightUnit":"px","contentPosition":"center center","sizeSlug":"full","align":"full","className":"hero-section","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"var:preset|spacing|superbspacing-xxlarge"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignfull hero-section" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--superbspacing-xxlarge);padding-left:0"><img class="wp-block-cover__image-background wp-image-4576 size-full" alt="" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/salon-header-image.jpg'); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-60 has-background-dim"></span>
  <div class="wp-block-cover__inner-container"><!-- wp:template-part {"slug":"header","theme":"elara-nails-and-beauty","tagName":"header"} /-->

    <!-- wp:group {"style":{"spacing":{"blockGap":"24px","padding":{"top":"var:preset|spacing|superbspacing-xxlarge","bottom":"var:preset|spacing|superbspacing-small","left":"var:preset|spacing|superbspacing-small","right":"var:preset|spacing|superbspacing-small"}}},"layout":{"type":"constrained","contentSize":"620px"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--superbspacing-xxlarge);padding-right:var(--wp--preset--spacing--superbspacing-small);padding-bottom:var(--wp--preset--spacing--superbspacing-small);padding-left:var(--wp--preset--spacing--superbspacing-small)"><!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"50px"}}},"textColor":"white","fontSize":"superbfont-xxlarge"} -->
      <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-superbfont-xxlarge-font-size" style="margin-bottom:50px"><?php esc_html_e('Because Every Detail Truly Matters', 'elara-nails-and-beauty'); ?> </h1>
      <!-- /wp:heading -->

      <!-- wp:buttons {"style":{"spacing":{"margin":{"top":"40px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
      <div class="wp-block-buttons" style="margin-top:40px"><!-- wp:button {"style":{"border":{"radius":"4px"},"typography":{"textTransform":"uppercase"},"spacing":{"padding":{"left":"var:preset|spacing|superbspacing-small","right":"var:preset|spacing|superbspacing-small"}}}} -->
        <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="#" style="border-radius:4px;padding-right:var(--wp--preset--spacing--superbspacing-small);padding-left:var(--wp--preset--spacing--superbspacing-small);text-transform:uppercase"><?php esc_html_e('Book Now', 'elara-nails-and-beauty'); ?></a></div>
        <!-- /wp:button -->

        <!-- wp:button {"textColor":"contrast-light","className":"is-style-outline","style":{"border":{"radius":"4px","width":"1px"},"typography":{"textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|contrast-light"}}},"spacing":{"padding":{"left":"var:preset|spacing|superbspacing-small","right":"var:preset|spacing|superbspacing-small"}}},"borderColor":"contrast-light"} -->
        <div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-contrast-light-color has-text-color has-link-color has-border-color has-contrast-light-border-color wp-element-button" href="#" style="border-width:1px;border-radius:4px;padding-right:var(--wp--preset--spacing--superbspacing-small);padding-left:var(--wp--preset--spacing--superbspacing-small);text-transform:uppercase"><?php esc_html_e('Find Us →', 'elara-nails-and-beauty'); ?></a></div>
        <!-- /wp:button -->
      </div>
      <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
  </div>
</div>
<!-- /wp:cover -->
