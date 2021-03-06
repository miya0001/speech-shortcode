<?php
/**
 * Class Speech_Shortcode_Test
 *
 * @package Speech_Shortcode
 */

class Speech_Shortcode_Test extends WP_UnitTestCase
{
	function test_shortcode()
	{
		$html = do_shortcode( '[speech]Hello[/speech]' );
		$this->assertSame(
			'<span class="speech-shortcode" data-lang="en-US" data-voice="" data-rate="1">Hello</span>',
			$html
		);
	}

	function test_shortcode_with_lang()
	{
		$html = do_shortcode( '[speech lang="ja"]Hello[/speech]' );
		$this->assertSame(
			'<span class="speech-shortcode" data-lang="ja" data-voice="" data-rate="1">Hello</span>',
			$html
		);
	}

	function test_shortcode_with_voice()
	{
		$html = do_shortcode( '[speech lang="ja" voice="Alex" rate=2]Hello[/speech]' );
		$this->assertSame(
			'<span class="speech-shortcode" data-lang="ja" data-voice="Alex" data-rate="2">Hello</span>',
			$html
		);
	}
}
