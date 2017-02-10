document.addEventListener( "DOMContentLoaded", function( event ) {
	var speeches = document.querySelectorAll('.speech-shortcode');
	for ( var i = 0; i < speeches.length; i++ ) {
		speeches[ i ].addEventListener( 'click', function() {
			var voice = this.getAttribute( 'data-voice' );
			var lang = this.getAttribute( 'data-lang' );
			var text = this.innerText;

			var synthes = new SpeechSynthesisUtterance( text );
			synthes.lang = 'lang';
			var voices = speechSynthesis.getVoices();
			voices.forEach( function( v, i ) {
				if ( v.name == voice ) synthes.voice = v;
			} );
			speechSynthesis.speak( synthes );
		}, false );
	}
} );