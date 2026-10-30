<?php
/**
 * Social Media Widget
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Social Media Widget Class
 */
class Graceful_Omni_Social_Media_Widget extends WP_Widget {

	/**
	 * Constructor
	 */
	public function __construct() {
		$graceful_omni_widget_ops = array(
			'classname'                   => 'graceful-omni-social-media-widget',
			'description'                 => esc_html__( 'Display social media links with icons.', 'graceful-omni-blog' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct(
			'graceful_omni_social_media',
			esc_html__( 'Graceful Omni: Social Media', 'graceful-omni-blog' ),
			$graceful_omni_widget_ops
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Widget instance.
	 */
	public function widget( $args, $instance ) {
		$graceful_omni_title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$graceful_omni_title = apply_filters( 'widget_title', $graceful_omni_title, $instance, $this->id_base );

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		if ( $graceful_omni_title ) {
			echo $args['before_title'] . esc_html( $graceful_omni_title ) . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		$graceful_omni_social_links = array(
			'facebook'  => ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '',
			'twitter'   => ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '',
			'instagram' => ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '',
			'linkedin'  => ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '',
			'pinterest' => ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '',
			'youtube'   => ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '',
		);

		$graceful_omni_has_links = false;
		foreach ( $graceful_omni_social_links as $graceful_omni_link ) {
			if ( ! empty( $graceful_omni_link ) ) {
				$graceful_omni_has_links = true;
				break;
			}
		}

		if ( $graceful_omni_has_links ) {
			echo '<div class="graceful-omni-social-media-links">';

			foreach ( $graceful_omni_social_links as $graceful_omni_platform => $graceful_omni_url ) {
				if ( ! empty( $graceful_omni_url ) ) {
					$graceful_omni_label = ucfirst( $graceful_omni_platform );

					// Use custom X icon for Twitter.
					if ( 'twitter' === $graceful_omni_platform ) {
						printf(
							'<a href="%1$s" class="graceful-omni-social-link graceful-omni-social-%2$s" target="_blank" rel="noopener noreferrer" aria-label="%3$s"><svg class="graceful-omni-x-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>',
							esc_url( $graceful_omni_url ),
							esc_attr( $graceful_omni_platform ),
							/* translators: %s: Social media platform name */
							esc_attr( sprintf( __( 'Follow us on %s', 'graceful-omni-blog' ), $graceful_omni_label ) )
						);
					} else {
						$graceful_omni_icon_class = 'fa-' . esc_attr( $graceful_omni_platform );

						printf(
							'<a href="%1$s" class="graceful-omni-social-link graceful-omni-social-%2$s" target="_blank" rel="noopener noreferrer" aria-label="%3$s"><i class="fa %4$s" aria-hidden="true"></i></a>',
							esc_url( $graceful_omni_url ),
							esc_attr( $graceful_omni_platform ),
							/* translators: %s: Social media platform name */
							esc_attr( sprintf( __( 'Follow us on %s', 'graceful-omni-blog' ), $graceful_omni_label ) ),
							esc_attr( $graceful_omni_icon_class )
						);
					}
				}
			}

			echo '</div>';
		}

		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance Widget instance.
	 */
	public function form( $instance ) {
		$graceful_omni_title     = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$graceful_omni_facebook  = ! empty( $instance['facebook'] ) ? $instance['facebook'] : '';
		$graceful_omni_twitter   = ! empty( $instance['twitter'] ) ? $instance['twitter'] : '';
		$graceful_omni_instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : '';
		$graceful_omni_linkedin  = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : '';
		$graceful_omni_pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : '';
		$graceful_omni_youtube   = ! empty( $instance['youtube'] ) ? $instance['youtube'] : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
				<?php esc_html_e( 'Title:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $graceful_omni_title ); ?>">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>">
				<?php esc_html_e( 'Facebook URL:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'facebook' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" type="url" value="<?php echo esc_url( $graceful_omni_facebook ); ?>" placeholder="https://facebook.com/yourpage">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>">
				<?php esc_html_e( 'X (Twitter) URL:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'twitter' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" type="url" value="<?php echo esc_url( $graceful_omni_twitter ); ?>" placeholder="https://x.com/yourhandle">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>">
				<?php esc_html_e( 'Instagram URL:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'instagram' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" type="url" value="<?php echo esc_url( $graceful_omni_instagram ); ?>" placeholder="https://instagram.com/yourhandle">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>">
				<?php esc_html_e( 'LinkedIn URL:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'linkedin' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" type="url" value="<?php echo esc_url( $graceful_omni_linkedin ); ?>" placeholder="https://linkedin.com/in/yourprofile">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>">
				<?php esc_html_e( 'Pinterest URL:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'pinterest' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" type="url" value="<?php echo esc_url( $graceful_omni_pinterest ); ?>" placeholder="https://pinterest.com/yourprofile">
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>">
				<?php esc_html_e( 'YouTube URL:', 'graceful-omni-blog' ); ?>
			</label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'youtube' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" type="url" value="<?php echo esc_url( $graceful_omni_youtube ); ?>" placeholder="https://youtube.com/c/yourchannel">
		</p>
		<?php
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance New widget instance.
	 * @param array $old_instance Old widget instance.
	 * @return array Updated widget instance.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']     = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['facebook']  = ! empty( $new_instance['facebook'] ) ? esc_url_raw( $new_instance['facebook'] ) : '';
		$instance['twitter']   = ! empty( $new_instance['twitter'] ) ? esc_url_raw( $new_instance['twitter'] ) : '';
		$instance['instagram'] = ! empty( $new_instance['instagram'] ) ? esc_url_raw( $new_instance['instagram'] ) : '';
		$instance['linkedin']  = ! empty( $new_instance['linkedin'] ) ? esc_url_raw( $new_instance['linkedin'] ) : '';
		$instance['pinterest'] = ! empty( $new_instance['pinterest'] ) ? esc_url_raw( $new_instance['pinterest'] ) : '';
		$instance['youtube']   = ! empty( $new_instance['youtube'] ) ? esc_url_raw( $new_instance['youtube'] ) : '';

		return $instance;
	}
}

/**
 * Register Social Media Widget
 */
function graceful_omni_register_social_media_widget() {
	register_widget( 'Graceful_Omni_Social_Media_Widget' );
}
add_action( 'widgets_init', 'graceful_omni_register_social_media_widget' );
