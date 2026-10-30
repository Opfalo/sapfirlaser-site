<?php

/**
 * Title: Contact Hero
 * Slug: luxe-hair-salon/contact-hero-001
 * Categories: header
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/salon-header-image-contact.jpg'); ?>","id":4511,"dimRatio":70,"overlayColor":"black","isUserOverlayColor":true,"minHeight":50,"minHeightUnit":"px","contentPosition":"center center","align":"full","className":"contact-hero-section","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"var:preset|spacing|superbspacing-small"},"margin":{"top":"0","bottom":"0"}}}} -->
<div class="wp-block-cover alignfull contact-hero-section" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:var(--wp--preset--spacing--superbspacing-small);padding-left:0;min-height:50px"><img class="wp-block-cover__image-background wp-image-4511" alt="" src="<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/images/salon-header-image-contact.jpg'); ?>" data-object-fit="cover" /><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim"></span>
  <div class="wp-block-cover__inner-container"><!-- wp:template-part {"slug":"header","theme":"luxe-hair-salon","tagName":"header"} /-->

    <!-- wp:group {"style":{"spacing":{"blockGap":"20px","padding":{"right":"var:preset|spacing|superbspacing-small","left":"var:preset|spacing|superbspacing-small","top":"var:preset|spacing|superbspacing-xxlarge","bottom":"var:preset|spacing|superbspacing-xxlarge"}}},"layout":{"type":"constrained","contentSize":"700px"}} -->
    <div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--superbspacing-xxlarge);padding-right:var(--wp--preset--spacing--superbspacing-small);padding-bottom:var(--wp--preset--spacing--superbspacing-xxlarge);padding-left:var(--wp--preset--spacing--superbspacing-small)"><!-- wp:paragraph {"align":"center","style":{"typography":{"letterSpacing":"3px","textTransform":"uppercase"}},"textColor":"primary","fontSize":"superbfont-xsmall"} -->
      <p class="has-text-align-center has-primary-color has-text-color has-superbfont-xsmall-font-size" style="letter-spacing:3px;text-transform:uppercase"><?php esc_html_e('Get In Touch', 'luxe-hair-salon'); ?></p>
      <!-- /wp:paragraph -->

      <!-- wp:heading {"textAlign":"center","level":1,"style":{"spacing":{"margin":{"bottom":"15px"}}},"textColor":"white","fontSize":"superbfont-xxlarge"} -->
      <h1 class="wp-block-heading has-text-align-center has-white-color has-text-color has-superbfont-xxlarge-font-size" style="margin-bottom:15px"><?php esc_html_e('Contact', 'luxe-hair-salon'); ?> <em><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-primary-color"><?php esc_html_e('Us', 'luxe-hair-salon'); ?></mark></em></h1>
      <!-- /wp:heading -->

      <!-- wp:group {"layout":{"type":"constrained","contentSize":"550px"}} -->
      <div class="wp-block-group"><!-- wp:paragraph {"align":"center","style":{"spacing":{"margin":{"top":"0"}},"color":{"text":"rgba(255,255,255,0.7)"}},"fontSize":"superbfont-small"} -->
        <p class="has-text-align-center has-text-color has-superbfont-small-font-size" style="color:rgba(255,255,255,0.7);margin-top:0"><?php esc_html_e('We\'d love to hear from you. Reach out to book an appointment, ask questions, or simply say hello.', 'luxe-hair-salon'); ?></p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
  </div>
</div>
<!-- /wp:cover -->
