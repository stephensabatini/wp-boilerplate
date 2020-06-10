'use strict';
const stickyClass = 'sticky';
const nav = document.getElementById( 'main-navigation-wrapper' );
const header = document.getElementById( 'site-header' );
let scrollpos = window.scrollY;

window.addEventListener( 'scroll', function() {
	scrollpos = window.scrollY;

	if ( scrollpos > header.offsetHeight - nav.offsetHeight ) {
		nav.classList.add( stickyClass );
	} else {
		nav.classList.remove( stickyClass );
	}
} );
