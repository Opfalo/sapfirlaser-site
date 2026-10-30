<?php
defined('ABSPATH') || exit;
$theme_url = $notice['data']['theme_url']."?su_source=notice";
$theme_name = wp_get_theme()->name;
?>
<div class="notice notice-info is-dismissible <?php echo esc_attr($notice['unique_id']); ?>">
    <h2 class="notice-title"><?php echo esc_html(sprintf(__("Unlock All Features with %s Premium – Limited Time Offer", 'elara-nails-and-beauty'), $theme_name)); ?></h2>
    <p>
        <?php echo esc_html__("Take advantage of the up to", 'elara-nails-and-beauty'); ?> <span style='font-weight:bold;'><?php echo esc_html__("40% discount", 'elara-nails-and-beauty'); ?></span> <?php echo esc_html(sprintf(__("and unlock all features with %s Premium.", 'elara-nails-and-beauty'), $theme_name)); ?>
        <?php echo esc_html__("The discount is only available for a limited time.", 'elara-nails-and-beauty'); ?>
    </p>
    <p>
        <a style='margin-bottom:15px;' class='button button-large button-secondary' target='_blank' href='<?php echo esc_url($theme_url); ?>'><?php echo esc_html__("Read More", 'elara-nails-and-beauty'); ?></a> <a style='margin-bottom:15px;' class='button button-large button-primary' target='_blank' href='<?php echo esc_url($theme_url); ?>'><?php echo esc_html__("Upgrade Now", 'elara-nails-and-beauty'); ?></a>
    </p>
</div>