<?php
/**
 * Plugin Name:     Speech Shortcode
 * Plugin URI:      https://github.com/miya0001/speech-shortcode
 * Description:     Implementation of HTML5 Text Speech API as a WordPress Shortcode.
 * Author:          Takayuki Miyauchi
 * Author URI:      https://miya.io/
 * Text Domain:     speech-shortcode
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Speech_Shortcode
 */

class Speech_Shortcode
{
	public function __construct()
	{
		add_shortcode( 'speech', array( $this, 'speech' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	public function speech( $atts, $content )
	{
		$atts = shortcode_atts( array(
			'lang' => 'en-US',
			'voice' => 'Google US English'
		), $atts, 'speech' );

		return sprintf(
			'<span class="speech-shortcode" data-lang="%1$s" data-voice="%2$s">%3$s</span>',
			esc_attr( $atts['lang'] ),
			esc_attr( $atts['voice'] ),
				esc_html( $content )
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
