<?php
/**
 * Plugin Name:     Speech Shortcode
 * Plugin URI:      https://github.com/miya0001/speech-shortcode
 * Description:     Implementation of HTML5 Text Speech API as a WordPress Shortcode.
 * Author:          Takayuki Miyauchi
 * Author URI:      https://miya.io/
 * Text Domain:     speech-shortcode
 * Domain Path:     /languages
 * Version:         nightly
 *
 * @package         Speech_Shortcode
 */

require_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

class Speech_Shortcode
{
	public function __construct()
	{
		add_action( 'init', array( $this, 'activate_autoupdate' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );

		add_shortcode( 'speech', array( $this, 'speech' ) );
	}

	public function activate_autoupdate() {
		$plugin_slug = plugin_basename( __FILE__ );
		$gh_user = 'miya0001';
		$gh_repo = 'speech-shortcode';

		new Miya\WP\GH_Auto_Updater( $plugin_slug, $gh_user, $gh_repo );
	}

	public function speech( $atts, $content )
	{
		$atts = shortcode_atts( array(
			'lang' => apply_filters( 'speech_shortcode_default_lang', 'en-US' ),
			'voice' => apply_filters( 'speech_shortcode_default_voice', '' ),
			'rate' => apply_filters( 'speech_shortcode_default_rate', '1' ),
		), $atts, 'speech' );

		return sprintf(
			'<span class="speech-shortcode" data-lang="%1$s" data-voice="%2$s" data-rate="%3$s">%4$s</span>',
			esc_attr( $atts['lang'] ),
			esc_attr( $atts['voice'] ),
			esc_attr( $atts['rate'] ),
			wp_strip_all_tags( $content )
		);
	}

	public function wp_enqueue_scripts()
	{
		wp_enqueue_script(
			'speech-shortcode',
			plugins_url( 'js/speech-shortcode.js', __FILE__ ),
			array(),
			filemtime( dirname( __FILE__ ) . '/js/speech-shortcode.js' ),
			true
		);

		wp_enqueue_style( 'dashicons' );

		wp_enqueue_style(
			'speech-shortcode',
			plugins_url( 'css/speech-shortcode.css', __FILE__ ),
			array(),
			filemtime( dirname( __FILE__ ) . '/css/speech-shortcode.css' )
		);
	}
}

$speech_shortcode = new Speech_Shortcode();
