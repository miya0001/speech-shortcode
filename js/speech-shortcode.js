var voices = speechSynthesis.getVoices();

document.addEventListener( "DOMContentLoaded", function( event ) {
	var speeches = document.querySelectorAll('.speech-shortcode');
	for ( var i = 0; i < speeches.length; i++ ) {
		speeches[ i ].addEventListener( 'click', read_text, false );
	}
} );

var read_text = function( event ) {
	var self = this;
	speechSynthesis.cancel();

	var voice = this.getAttribute( 'data-voice' );
	var synthes = new SpeechSynthesisUtterance( this.textContent );
	synthes.lang = this.getAttribute( 'data-lang' );
	var voices = speechSynthesis.getVoices();
	voices.forEach( function( v, i ) {
		if ( v.name == voice ) {
			synthes.voice = v;
		}
	} );
	speechSynthesis.speak( synthes );

	synthes.addEventListener( 'start', function() {
		self.classList.add( 'rumble' );
	}, false );

	synthes.addEventListener( 'end', function() {
		self.classList.remove( 'rumble' );
	}, false );
}
