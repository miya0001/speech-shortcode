speechSynthesis.getVoices(); // Pre-load voices.

document.addEventListener( "DOMContentLoaded", function( event ) {
	var speeches = document.querySelectorAll('.speech-shortcode');
	for ( var i = 0; i < speeches.length; i++ ) {
		speeches[ i ].addEventListener( 'click', read_text, false );
	}
} );

var read_text = function( event ) {
	speechSynthesis.cancel();
	document.querySelectorAll('.rumble').forEach( function( currentValue ) {
		currentValue.classList.remove( 'rumble' );
	} );

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

	synthes.addEventListener( 'boundary', start_rumble( this ), false );
	synthes.addEventListener( 'end', end_rumble( this ), false );
}

var start_rumble = function( element ) {
	return function( event ) {
		element.classList.add( 'rumble' );
	}
}

var end_rumble = function( element ) {
	return function( event ) {
		element.classList.remove( 'rumble' );
	}
}
