var voices = speechSynthesis.getVoices();

document.addEventListener( "DOMContentLoaded", function( event ) {
	var speeches = document.querySelectorAll('.speech-shortcode');
	for ( var i = 0; i < speeches.length; i++ ) {
		speeches[ i ].addEventListener( 'click', read_text, false );
	}
} );

var stop_rumble = function ( element ) {
	return function( event ) {
		element.classList.remove( 'rumble' );
		event.target.removeEventListener( 'end', arguments.callee, false );
	}
}

var read_text = function() {
	if ( document.querySelector('.rumble') ) {
		return;
	}
	this.classList.add( 'rumble' );
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

	synthes.addEventListener( 'end', stop_rumble( this ), false );
}
